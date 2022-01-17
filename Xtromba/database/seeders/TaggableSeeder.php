<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Course;
use Illuminate\Database\Seeder;

class TaggableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=1 ; $i< 10 ; $i++)
       {
        \DB::table('taggables')->insert(
            [
                'taggable_id' => $i,
                'tag_id' => $i,
                'taggable_type' => 'App\Models\Course',
            ]
        );
       }
    }
}
