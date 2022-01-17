<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;

use Illuminate\Http\Request;
use File;

class CourseController extends Controller
{

    public function index()
    {
        \Meta::set('description', 'Cursos');
        \Meta::set('description', 'Courses');
        \Meta::set('og:type', 'articles');
        \Meta::set('og:type', 'articulos');
        $courses = Course::getType('course')->orderBy('created_at', 'desc')->get();
        return view('courses.index', compact('courses'));
    }

    public function details(Course $course, Lesson $lesson)
    {
        \Meta::set('description', 'Cursos');
        \Meta::set('description', 'Courses');
        \Meta::set('og:type', 'articles');
        \Meta::set('og:type', 'articulos');
        return view('courses.details', compact('course', 'lesson'));
    }

    public function lessons_courses(Course $course)
    {
        return $course->lessons;
    }


}
