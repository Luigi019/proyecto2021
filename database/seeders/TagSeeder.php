<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::Create([
            'tag' => 'Afro Dance',
            'active' => '1',
            'slug'=>\Str::slug('Afro Dance'),
        ]);

        Tag::Create([
            'tag' => 'Bollywood',
            'active' => '1',
            'slug' => \Str::slug('Bollywood'),
        ]);

        Tag::Create([
            'tag' => 'DanceHall',
            'active' => '1',
            'slug'=>\Str::slug('DanceHall'),
        ]);

        Tag::Create([
            'tag' => 'Electro Dance',
            'active' => '1',
            'slug'=>\Str::slug('Electro Dance'),
        ]);

        Tag::Create([
            'tag' => 'Funky',
            'active' => '1',
            'slug'=>\Str::slug('Funky'),
        ]);

        Tag::Create([
            'tag' => 'HipHop',
            'active' => '1',
            'slug'=>\Str::slug('HipHop'),
        ]);

        Tag::Create([
            'tag' => 'Indi Dance',
            'active' => '1',
            'slug'=>\Str::slug('Indi Dance'),
        ]);

        Tag::Create([
            'tag' => 'Merengue',
            'active' => '1',
            'slug'=>\Str::slug('Merengue'),
        ]);
        Tag::Create([
            'tag' => 'Reggaeton',
            'active' => '1',
            'slug'=>\Str::slug('Reggaeton'),
        ]);

        Tag::Create([
            'tag' => 'Salsa',
            'active' => '1',
            'slug'=>\Str::slug('Salsa'),
        ]);
    }
}
