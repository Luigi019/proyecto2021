<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\BaseController;
use Spatie\Permission\Models\Role;

class AdminController extends BaseController
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
                'headerTitle' => 'Todos los administradores',
                'titlePage' => 'Administradores',
                'createText'=>'administrador'
            ],
            'datatable' => [
                'route' => [
                    'deleteData' => 'delete.resource',
                    'createData' => 'panel.admins.create',
                    'editData' => 'panel.admins.edit'
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
            $query = User::role('ADMINISTRADOR')->orderBy('id' , 'DESC');

            $fields =   $this->datatable($query)
            ->addColumn('actions' ,function($field){
               $this->data['field']= $field;
                return $this->loadView('datatable.buttons.edit') . $this->loadView('datatable.buttons.delete');
            })
           ->rawColumns(['actions'])
            ->toJson();

            return $fields;
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
                'headerTitle' => 'Agregar administrador',
                'titlePage' => 'Administradores',

            ],
            'route'=>[
                'storeData'=>'panel.admins.store'
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
        $admin = new User();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->slug = $request->name;
        $admin->password = Hash::make($request->password);

        $admin->save();

        $admin->assignRole('ADMINISTRADOR');

        flash('Usuario creado exitosamente', 'success');

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {

        $this->data = [
            'page' => [
                'headerTitle' => 'Editar administrador',
                'titlePage' => 'Administradores'
            ],
            'route'=>[
                'updateData'=>[
                    'name'=>'panel.admins.update',
                    'param'=>'admin'
                ]
            ],
            'user' => $admin,

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
    public function update(UserRequest $request, User $admin)
    {

        if ($request->password !== null) {
            $admin->password = Hash::make($request->password);
        }
        if ($request->phone !== null) {
            //$admin->phone = $request->phone;
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->slug = $request->name;

        $admin->update();
        $this->data['admin'] = $admin;
        flash('Usuario editado correctamente', 'success');
        return $this->redirectRoute('panel.admins.edit');
    }



}
