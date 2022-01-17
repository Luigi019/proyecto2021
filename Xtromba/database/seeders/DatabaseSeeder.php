<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Course;
use App\Models\factories\CourseLessons;
use App\Models\Files;
use App\Models\Lesson;
use App\Models\Tag;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RoleAndPermissionSeeder::class);
        $this->call(UserSeeder::class);
//       Course::factory(50)->create();
//       Lesson::factory(50)->create();
//       Comment::factory(50)->create();
//       Files::factory(50)->create();
        // CourseLessons::factory(100)->create();
        $this->call(TagSeeder::class);
//    $this->call(TaggableSeeder::class);
//    $this->call(CourseLessonSeeder::class);
    }
}
