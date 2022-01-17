<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random = $this->faker->randomElement([Course::factory() , Lesson::factory()]);
        $nameSpace = $this->faker->randomElement([Course::class , Lesson::class]);
        return [
            'user_id'=>User::factory(),
            'comment'=>$this->faker->text(20),
            'commentable_id'=>$random,
            'commentable_type'=>$nameSpace
        ];
    }
}
