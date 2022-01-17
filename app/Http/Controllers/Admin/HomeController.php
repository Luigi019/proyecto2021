<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\Course;
use App\Models\City;
use App\Models\Role;
class HomeController extends BaseController
{
    public function index()
    {
        $lesson = Lesson::all();

        $tag = Tag::all();

        $user = User::all();

        $course = Course::all();

        $city = City::all();

        $role = Role::all();
       
        return view('panel.index', compact('user', 'tag', 'lesson', 'role', 'city', 'course'));
    }
}
