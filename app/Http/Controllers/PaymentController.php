<?php

namespace App\Http\Controllers;

use App\Http\Traits\LessonOrCourse;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\MyProduct;
use App\Notifications\PaymentNotification;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Http\Traits\Stripe as StripeTrait;
use Stripe\StripeClient;

class PaymentController extends Controller
{
    use StripeTrait , LessonOrCourse;

    protected $data = [];
    protected $transaction;
    protected $stripe;

    public function __construct()
    {
        $stripeKey = env('STRIPE_SECRET');

        $this->stripe = new StripeClient($stripeKey);

    }

    /**
     * @param $request
     */
    public function courseOrLesson($request): void
    {
        if ($request->isCourse === 'lessons') {
            $this->data['object'] = Lesson::find($request->collect);
            $this->data['route'] = route('public.payment.checkout.lesson', [
                'lesson' => $this->data['object']
            ]);
        } else {
            $this->data['object'] = Course::find($request->collect);
            $this->data['route'] = route('public.payment.checkout.course', [
                'course' => $this->data['object']
            ]);
        }

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function index(Request $request)
    {
        try {

            $this->courseOrLesson($request);

            $options = [
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price' => $this->data['object']->stripe_id,
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => $this->data['route'],
                'cancel_url' => route('public.home.page'),
            ];
            if (!($this->data['object']->getTable() === 'lessons')) {

                $options['mode'] = 'subscription';

                $this->transaction = $this->stripe->checkout->sessions->create($options);
                session()->push('stripeSession', $this->transaction->id);

            } else {
                $this->transaction = $this->stripe->checkout->sessions->create($options);
                session()->push('stripeSession', $this->transaction->id);
            }


            return redirect()->away($this->transaction->url);
        } catch (Exception $e) {
            flash($e->getMessage(), 'danger');
            return back();
        }


    }

    public function paymentCourse(Course $course)
    {
        $session = $this->stripe->checkout->sessions->retrieve(session('stripeSession')[0]);
        $setupIntent = Auth::user()->createSetupIntent();
        $confirm = $this->stripe->setupIntents->confirm(
            $setupIntent->id,
            ['payment_method' => 'pm_card_visa']
        );

        Auth::user()->newSubscription($course->title , $course->stripe_id)->create($confirm->payment_method);

        $transaction = [
            'user_id' => Auth::id(),
            'reference' => $session->subscription,
            'price' => $course->price,
            'description' => $course->title,
            'quantity' => 1,
            'total'=>$course->price
        ];

        $this->register($transaction, $course);

        session()->forget('stripeSession');
        return redirect()->route('public.courses.details', [
            'course' => $course,
            'lesson' => $course->lessons->first()
        ]);
    }

    public function paymentLesson(Lesson $lesson)
    {
        $session = $this->stripe->checkout->sessions->retrieve(session('stripeSession')[0]);
        $transaction = [
            'user_id' => Auth::id(),
            'reference' => $session->payment_intent,
            'price' => $lesson->price,
            'description' => $lesson->title,
            'quantity' => 1,
            'total'=>$lesson->price
        ];

        $this->register($transaction, $lesson);
        session()->forget('stripeSession');
        return redirect()->route('public.streaming.stream.show', [
            'lesson' => $lesson
        ]);

    }

    /**
     * @throws Exception
     */
    public function register(array $transaction, object $collect)
    {
          $collect->products()->attach(['user_id'=>Auth::id()]);

          ['id' => $id] =   $collect->transaction()->create($transaction);

        Auth::user()->notify(new PaymentNotification($collect , $id));
            return true;
    }


}
