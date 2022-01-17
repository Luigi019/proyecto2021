<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Tag;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaggableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        \DB::table('taggables')->insert(
            [
                'taggable_id' => Course::factory(),
                'tag_id' => Tag::factory(),
                'taggable_type' => 'App\Models\Course',
            ]
        );
    }
}
