<?php

namespace Database\Factories\factories;

use App\Models\factories\CourseLessons;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lesson;
use App\Models\Course;
//use App\Models\Experience;

class CourseLessonsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseLessons::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id'=>Course::factory(),
            'lesson_id'=>Lesson::factory()
        ];
    }                                                                                                                                  
}
