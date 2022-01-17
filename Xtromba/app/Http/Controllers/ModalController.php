<?php

namespace App\Http\Controllers;

use App\Http\Traits\LessonOrCourse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    use LessonOrCourse;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getData(Request $request): JsonResponse
    {
       if($request->type === 'courses' || $request->type === 'lessons'){
           $request->collect = $request->id;
           $request->isCourse = $request->type;
           $collect  = $this->courseOrLesson($request);
            $collect = $collect['object'];
            $view = view('courses.inc.modal-trailer' , compact('collect'))->render();
       }
        return response()->json($view);
    }
}
