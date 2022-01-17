<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        //  CREAR ARREGLO DE DATOS PPARA PASAR A LA VISTA
        $this->data = [
            'model'=>'User',
            'page' => [
                'headerTitle' => 'Todos los profesores',
                'titlePage' => 'Profesores',
                'createText'=>'profesor',
            ],
            'datatable' => [
                'route' => [
                    'getData' => 'list.teachers',
                    'deleteData' => 'delete.resource',
                    'createData' => 'panel.teachers.create',
                    'editData' => 'panel.teachers.edit'
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

        if(request()->ajax())
        {
            $query = User::role('PROFESOR')->orderBy('id' , 'desc');

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



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data = [
            'page' => [
                'headerTitle' => 'Agregar profesor',
                'titlePage' => 'Administradores'
            ],
            'route'=>[
                'storeData'=>'panel.teachers.store'
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

        $teacher = new User();

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->slug = $request->name;
        $teacher->save();

        $teacher->assignRole('PROFESOR');

        flash('Usuario creado exitosamente', 'success');

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {

        $this->data = [

            'page' => [
                'headerTitle' => 'Editar administrador',
                'titlePage' => 'Administradores'
            ],
            'user' => $teacher,
            'route'=>[
                'updateData'=>[
                    'param'=>'teacher',
                    'name'=>'panel.teachers.update'
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
    public function update(Request $request, User $teacher)
    {
        if ($request->password !== null) {
            $teacher->password = Hash::make($request->password);
        }
        if ($request->phone !== null) {
            //$teacher->phone = $request->phone;
        }

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->slug = $request->name;
        $teacher->update();

        $this->data['teacher'] = $teacher;
        flash('Usuario editado correctamente', 'success');
        return $this->redirectRoute('panel.teachers.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

        $admin = User::find(request()->only('id')['id']);
        try {
            $admin->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Eliminado exitosamente'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 400,
                'message' => 'Error al eliminar'
            ]);
        }
    }
}
