<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;
    protected $stripe;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-5 month' , \Carbon\Carbon::now());
        $title = $this->faker->sentence(20);
        $price = 6787;
        $stripeKey = env('STRIPE_SECRET');
        $this->stripe= new \Stripe\StripeClient(
            $stripeKey
        );
        $title = $this->faker->sentence(10);
        $price = 5010;

        $product = $this->stripe->products->create([
            'name' =>$title,
            'type' => 'service',
        ]);

        $dataApi =  [
            'unit_amount' =>$price,
            'currency' => 'eur',
            'product' => $product->id,
        ];
        $stripe_price =  $this->stripe->prices->create($dataApi);

        return [
             'instructor_id'=>User::factory(),
            'title'=>$title,
            'content'=>$this->faker->text(200),
            'slug'=>Str::slug($title),
            'description' => $this->faker->sentence(50),
            'start' => $date->format('Y-m-d'),
            'price'=>$price,
            'stripe_id'=>$stripe_price->id

        ];
    }
}
