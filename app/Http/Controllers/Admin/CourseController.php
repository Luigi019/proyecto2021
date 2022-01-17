<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\Stripe;
use App\Models\Tag;
use App\Models\City;
use App\Models\User;
use App\Models\Course;
use App\Http\Traits\LessonOrCourse;

use App\Http\Requests\CourseRequest;

class CourseController extends BaseController
{

    use LessonOrCourse, Stripe;


    public function index()
    {

        //  create array to pass the view
        $this->data = [
            'model' => 'Course',
            'page' => [
                'headerTitle' => 'Todas las formaciones',
                'titlePage' => 'Formaciones',
                'createText' => 'formacion',
            ],
            'datatable' => [
                'route' => [
                    'deleteData' => 'panel.delete.product',
                    'createData' => 'panel.courses.create',
                    'editData' => 'panel.courses.edit'
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

        if (request()->ajax()) {
            $query = Course::getType('course')->orderBy('id', 'desc');

            return $this->datatable($query)
                ->addColumn('actions', function ($field) {
                    $this->data['field'] = $field;
                    return $this->loadView('datatable.buttons.edit') . $this->loadView('datatable.buttons.delete');
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        return $this->loadView('datatable.index');
    }

    public function create(Course $course)
    {

        $this->data = [
            'course' => new Course,
            'user' => User::all(),
            'tag' => Tag::all(),
            'cities' => City::where('active', '1')->orderBy('name', 'ASC')->get()
        ];
        view()->share($this->data);

        return $this->loadView('panel.courses.create');
    }

    public function store(CourseRequest $request)
    {
        $model = new Course;
        $request->type = 'course';
        $stripe = $this->createProduct($request, 'service', 'create', $model);
        $course = $this::createOrUpdate($request, $model, $stripe);
        flash('Se ha creado exitosamente', 'success');
        return redirect()->route('panel.lesson.create.course', ['course' => $course]);
    }

    public function edit(Course $course)
    {
        $this->data = [
            'course' => $course,
            'user' => User::all(),
            'tag' => Tag::all(),
            'cities' => City::where('active', '1')->orderBy('name', 'ASC')->get()

        ];
        view()->share($this->data);
        return $this->loadView('panel.courses.edit');
    }

    public function update(CourseRequest $request, Course $course)
    {


        $request->type = 'course';
        $stripe = $this->createProduct($request, 'service', 'edit', $course);
        $this->data['course'] = LessonOrCourse::createOrUpdate($request, $course, $stripe);


        return $this->redirectRoute('panel.courses.edit');
    }

}
