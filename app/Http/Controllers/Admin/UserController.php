<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\BaseController;
use Spatie\Permission\Models\Permission;

class UserController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data = [
            'model'=>'User',
            'page' => [
                'headerTitle' => 'Todos los usuarios',
                'titlePage' => 'Usuarios',
                'createText'=>'usuario'
            ],
            'datatable' => [
                'route' => [
                    'deleteData' => 'delete.resource',
                    'createData' => 'panel.users.create',
                    'editData' => 'panel.users.edit'
                ],

            ]
        ];

        $this->builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Correo'],
            ['data' => 'slug', 'name' => 'slug', 'title' => 'Slug'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Fecha de registro'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'opciones'],
        ]);

        if(request()->ajax())
        {
            $query = User::all();
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

    public function getUsers()
    {
        $data = User::all();
        return \DataTables::of($data)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'page' => [
                'headerTitle' => 'Agregar usuario',
                'titlePage' => 'Usuarios',

            ],
            'route'=>[
                'storeData'=>'panel.users.store'
            ],

            'user' => new User(),

        ];
        return view('panel.users.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->slug = $request->name;
        $user->save();

        // $user->assignRole('ADMINISTRADOR');

        flash('Usuario creado exitosamente', 'success');

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = $this->haveRoles($user);
        
        return view('panel.users.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('panel.users.edit', $user)->with('info', 'Rol asignado.');
    }

    /** Call the view to asign a role */
    public function asignRole(User $user){
        $roles = Role::all();
        $this->data = [
            'roles'=> $roles,
            'user'=> $user
        ];
        return $this->loadView('panel.users.users.asign-role');
    }
    /** Asign Role to user. */
    public function asignedRole(Request $request, User $user){
        $user->roles()->sync($request->roles);
        flash('Roles asignados exitosamente', 'success');
        return back();
    }
    public static function haveRoles($user): array
    {
        // get all roles
        $roles = Role::all();
        // get user roless
        $haveRole = $user->roles()->get();
        // create empty array
        $data = [];
        foreach ($roles as $key => $rol) {
            //verify if exists users with roles
            if ($haveRole->contains($rol)) {
                $data[$rol->name]['check'] = true;
            } else {
                $data[$rol->name]['check'] = false;
            }
            $data[$rol->name]['id'] = $rol->id;
        }

        return $data;
    }
}
