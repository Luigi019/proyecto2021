<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\Stripe;
use App\Models\Tag;
use App\Models\City;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Helpers\Storage;
use Illuminate\Http\Request;
use App\Http\Traits\LessonOrCourse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;

class LessonController extends BaseController
{
    use LessonOrCourse , Stripe;

    public function index()
    {
        //  create array to pass the view
        $this->data = [
            'model'=>'Lesson',
            'page' => [
                'headerTitle' => 'Todos las clases',
                'titlePage' => 'Clases',
                'createText' => 'clase',
            ],
            'datatable' => [
                'route' => [
                    'deleteData' => 'delete.resource',
                    'createData' => 'panel.lessons.create',
                    'editData' => 'panel.lessons.edit'
                ],
            ]
        ];

        $this->builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'title', 'name' => 'title', 'title' => 'title'],
            ['data' => 'description', 'name' => 'description', 'title' => 'description'],
            ['data' => 'price', 'name' => 'price', 'title' => 'precio'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'opciones'],
        ]);

        if(request()->ajax())
        {
            $query = Lesson::orderBy('id' , 'desc');

            return $this->datatable($query)
            ->addColumn('actions' ,function($field){
                $this->data['field']= $field;
                 return $this->loadView('datatable.buttons.edit') . $this->loadView('datatable.buttons.delete');
             })
            ->rawColumns(['actions'])
            ->toJson();
        }

        return $this->loadView('datatable.index');

    }

    public function create(Course $course)
    {

        $this->data =[
            'lesson'=>new Lesson,
            'course'=> $course,
            'user'=>User::all(),
            'tag'=>Tag::all(),
            'cities' => City::where('active', '1')->orderBy('name' , 'ASC')->get()
        ];
        return $this->loadView('panel.lessons.create');
    }

    public function store(LessonRequest $request)
    {
        $model = new Lesson;
        $request->type = 'lesson';
        $stripe  =  $this->createProduct($request , 'good' , 'create' , $model);
        LessonOrCourse::createOrUpdate($request , $model , $stripe);
        flash('Se ha creado exitosamente', 'success');
        return back();
    }

    public function edit(Lesson $lesson)
    {
        $taggable =  $this::haveTags($lesson);


        $this->data = [
            'user'=> User::all(),
            'tag'=> $taggable,
            'lesson'=>$lesson,
            'cities' => City::where('active', '1')->orderBy('name' , 'ASC')->get()


        ];
        return $this->loadView('panel.lessons.edit' );
    }

    public function update(LessonRequest $request, Lesson $lesson)
    {
        $request->type = 'lesson';
         $this->data['lesson'] = LessonOrCourse::createOrUpdate($request , $lesson);

            return $this->redirectRoute('panel.lessons.edit');
    }

}
