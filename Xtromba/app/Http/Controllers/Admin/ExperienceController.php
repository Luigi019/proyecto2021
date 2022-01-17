<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\Stripe;
use App\Models\City;
use App\Models\Tag;
use App\Models\User;
use App\Models\Course;
use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Traits\LessonOrCourse;
use App\Http\Requests\CourseRequest;

class ExperienceController extends BaseController
{
    use LessonOrCourse , Stripe;

    public function index()
    {

        //  create array to pass the view
        $this->data = [
            'model'=>'Course',
            'page' => [
                'headerTitle' => 'Todas las experiences',
                'titlePage' => 'Experiences',
                'createText' => 'experience',
            ],
            'datatable' => [
                'route' => [
                    'deleteData' => 'delete.resource',
                    'createData' => 'panel.experience.create',
                    'editData' => 'panel.experience.edit'
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
            $query = Course::getType('experience')->orderBy('id' , 'desc');

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

    public function create()
    {
        $this->data = [
            'course'=> new Course,
            'user'=>User::all(),
            'tag'=>Tag::all(),
            'cities'=>City::all()
        ];

        return $this->loadView('panel.experiences.create');
    }

    public function store(CourseRequest $request)
    {
        $request->type = 'experience';
        $model = new Course;
       $this->data['course']= LessonOrCourse::createOrUpdate($request , $model);
        $this->createProduct($request , 'service');
        return $this->redirectRoute('panel.lesson.create.course');

    }

    public function edit(Course $experience)
    {
        $this->data = [
            'course'=>$experience,
            'user'=>User::all(),
            'tag'=>Tag::all(),
            'cities'=>City::all()
        ];
        return $this->loadView('panel.courses.edit');
    }

}
