<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Lesson;

class Stream extends Controller
{
    public function show(Lesson $lesson)
    {
    
       return view('lessons.show' , compact('lesson'));
    }
}
