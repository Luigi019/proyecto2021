<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Experience;


use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index(){

        $experience = Course::getType('experience')->orderBy('created_at' , 'desc')->get();
        return view('experience.index', compact('experience'));

    }
}
