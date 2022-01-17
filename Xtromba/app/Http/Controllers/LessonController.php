<?php

namespace App\Http\Controllers;

use App\Http\Traits\Event;
use App\Models\Tag;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Course;
use App\Http\Traits\LessonOrCourse;

class LessonController extends Controller
{
    use LessonOrCourse , Event;

    public function index()
    {
        $lessons=Lesson::all();

        return view('lessons.index', compact('lessons'));
    }


    public function create()
    {
        $data =[
            'lesson'=>new Lesson,
            'user'=>User::all(),
            'tag'=>Tag::all()
        ];
        return view('panel.lessons.create', $data);
    }

    public function show(Course $course , Lesson $lesson){

        return view('lessons.show', compact('course' , 'lesson'));
    }

    public function download(Lesson $lesson)
    {

        $path = \Str::replace('storage/' , '' , $lesson->getFile('video' , 'first'));
        
        if(\Storage::disk('public')->exists($path)) return  \Storage::disk('public')->download($path);

        flash('ha sucedido un error al descargar la clase, por favor comuniquese con soporte' , 'error');
        return back();
    

    }

}
