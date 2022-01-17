<?php

namespace Database\Factories;

use App\Models\Files;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Files::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $random = $this->faker->randomElement([Course::factory() , Lesson::factory()]);
        $type = $this->faker->randomElement(['video' , 'trailer' , 'photo']);
        return [
            'files_id'=>$random,
            'files_type'=>$this->faker->randomElement(['App\Models\Course' , 'App\Models\Lesson']),
            'type'=>$type,
            'file'=> $type === 'trailer' || $type === 'video' ? 'video/default.mp4' : 'img/default.jpg'
        ];
    }
}
