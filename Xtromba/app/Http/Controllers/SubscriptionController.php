<?php

namespace App\Http\Controllers;


use App\Http\Traits\LessonOrCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    use LessonOrCourse;

    public function cancelOrResume( string $type ,  $data)
    {
        request()->collect = $data;
        request()->isCourse = 'course';
        $data = $this->courseOrLesson(request())['object'];

        (Auth::user()->subscription($data->title)->$type());

        return back();

    }
}
