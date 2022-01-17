<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;
    protected $stripe;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
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
            'recurring' => ['interval' => 'month']
        ];
        $stripe_price =  $this->stripe->prices->create($dataApi);

        return [
            'instructor_id'=>User::factory(),
            'title'=>$title,
            'content'=>$this->faker->text(200),
            'slug'=>Str::slug($title),
            'type'=>$this->faker->randomElement(['course' , 'experience']),
            'description' => $this->faker->sentence(50),
            'price'=>$price,
            'stripe_id'=>$stripe_price->id
        ];
    }
}
