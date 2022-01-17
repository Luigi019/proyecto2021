<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class StudentController extends BaseController
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(request()->ajax())
        {
            $query = User::role('ESTUDIANTE')->orderBy('id' , 'desc');

            return $this->datatable($query)
                ->addColumn('actions' ,function($field){
                    $this->data['field']= $field;
                    return $this->loadView('datatable.buttons.edit') . $this->loadView('datatable.buttons.delete');
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        //  CREAR ARREGLO DE DATOS PPARA PASAR A LA VISTA
        $this->data = [
            'model'=>'User',
            'page' => [
                'headerTitle' => 'Todos los estudiantes',
                'titlePage' => 'Estudiantes',
                'createText'=>'estudiante',
            ],
            'datatable' => [
                'route' => [
                    'deleteData' => 'delete.resource',
                    'createData' => 'panel.students.create',
                    'editData' => 'panel.students.edit'
                ],
            ]
        ];

        $this->builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Correo'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'opciones'],
        ]);



        return $this->loadView('datatable.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data = [
            'page' => [
                'headerTitle' => 'Agregar estudiante',
                'titlePage' => 'Estudiantes'
            ],
            'route'=>[
                'storeData'=>'panel.students.store'
            ],
            'user' => new User(),

        ];
        return $this->loadView('panel.users.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $student = new User();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->slug = $request->name;
        $student->password = Hash::make($request->password);

        $student->save();

        $student->assignRole('ESTUDIANTE');

        flash('Usuario creado exitosamente', 'success');

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {

        $this->data = [
            'page' => [
                'headerTitle' => 'Editar estudiante',
                'titlePage' => 'Estudiantes'
            ],
            'user' => $student,
            'route'=>[
                'updateData'=>[
                    'param'=>'student',
                    'name'=>'panel.students.update'
                ]
            ]

        ];
        return $this->loadView('panel.users.admin.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $student)
    {
        if ($request->password !== null) {
            $student->password = Hash::make($request->password);
        }
        if ($request->phone !== null) {
            //$student->phone = $request->phone;
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->slug = $request->name;

        $student->update();

        flash('Usuario editado correctamente', 'success');
        $this->data['student'] = $student;
        return $this->redirectRoute('panel.students.edit');
    }


}
