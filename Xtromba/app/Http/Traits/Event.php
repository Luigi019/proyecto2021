<?php

namespace App\Http\Traits;

use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait Event {

    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
//    public function myLessons()
//    {
//        try{
//            $lesson=Lesson::all();
//            return response()->json($lesson);
//        }catch(\Throwable $th){
//            return response()->json($th->getMessage());
//        }
//
//    }
    /**
     * Store new lesson in the panel
     * @param LessonRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
//    public function store(LessonRequest $request)
//    {
//        $newLesson = new Lesson;
//        $request->instructor_id = 1;
//        $request->type = 'lesson';
//        $lesson = LessonOrCourse::createOrUpdate($request , $newLesson);
//
//        return response()->json($lesson);
//    }


    public function storeNewLessonInstructorCalendar(Request $request){
        $lesson = new Lesson;
        $request->instructor_id = Auth::id();
        $request->type = 'lesson';
        LessonOrCourse::createOrUpdate($request , $lesson);
        return back();

    }

    /**
     * Edit lesson in the panel
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $data = [
            'user'=> User::all(),
            'tag'=> Tag::all(),
            'lesson'=>$id
        ];
        return response()->json($id);
    }


    /**
     * @param LessonRequest $request
     * @param Lesson $lesson
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {
        LessonOrCourse::createOrUpdate($request , $lesson);

        return back();
    }

    public function editmyLessons(Request $request)
    {

        $lesson = Lesson::find($request->id);
        $request->instructor_id = Auth::id();
        $request->type = 'lesson';
        LessonOrCourse::createOrUpdate($request , $lesson);
        return response()->json(['status => 200']);
    }



    public function destroy()
    {
        $lesson = Lesson::find(request()->only('id')['id']);
        try {
            $lesson->delete();
            return response()->json([
                'status' => 200,
                'message' => 'eliminado exitosamente'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 400,
                'message' => 'Error al eliminar'
            ]);
        }
    }

    /**
     * @param Lesson $lesson
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllLesson(Lesson $lesson){

        $lesson=Lesson::all();
        return response()->json($lesson);

    }

    public function getLessonById($id){
        $lesson = Lesson::find($id);

        $hasLesson = null;
        if(Auth::check())
            $hasLesson = Auth::user()->hasProduct($lesson , 'Lesson')->count();
        $class = ['lesson' => $lesson, 'img' =>$lesson->getFile('photo', 'first') , 'teacher' => $lesson->teacher , 'hasLesson' =>$hasLesson];
        return $class;
    }

    public function getLessonByUser(Lesson $lesson){


        $lesson=Lesson::where('instructor_id' , 1)->get();
        return response()->json($lesson);

    }


    public function deleteMyLesson(Request $request){
        $lesson = Lesson::where('id', $request->id)->get();
        $lesson->each->delete();
        return response()->json(['status => 200']);
    }


    public function lessonPurchased(){
        $user = Auth::user();
        $products = $user->products('Lesson')->get();

        return response()->json($products);
    }

}
