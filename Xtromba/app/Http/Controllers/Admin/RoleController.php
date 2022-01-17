<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;



class RoleController extends BaseController
{

    public function index()
    {
         $this->data = [
            'model'=>'Role',
            'page' => [
                'headerTitle' => 'Todos los roles',
                'titlePage' => 'Roles',
                'createText'=>'rol',
            ],
            'datatable' => [
                'route' => [
                    'deleteData' => 'delete.resource',
                    'createData' => 'panel.roles.create',
                    'editData' => 'panel.roles.edit'
                ],
                

            ]
        ];

        $this->builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            ['data' => 'permissions', 'name' => 'permissions', 'title' => 'Permisos'],
            ['data' => 'actions', 'name' => 'actions', 'title' => 'opciones'],
        ]);

      
        if(request()->ajax())
        {
            $query = Role::orderBy('id','DESC');

            $fields =   $this->datatable($query)
            ->addColumn('actions' , function($field){
                if($field->name !== 'ADMINISTRADOR' && $field->name !== 'PROFESOR' && $field->name !== 'ESTUDIANTE')
               {
                $this->data['field']= $field;
                return $this->loadView('datatable.buttons.edit') . $this->loadView('datatable.buttons.delete'); 
               }
               
            })
            ->addColumn('permissions' , function($rol){ 
                return $rol->permissions()->count();
            })
           ->rawColumns(['actions' ,'permissions'])
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
        $role = new Role;
        $permissions = $this->havePermission($role);

        $this->data = [
        'permissions' =>  $permissions,
        'role'=>$role,
        'route'=>'panel.roles.store',
        'method'=>'post',
        ];
        return $this->loadView('panel.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

     
        $role=Role::create([
            'name'=>$request->name,
            'slug'=>$request->name
        ]);
        $role->permissions()->sync($request->permissions);
        flash('El rol se ha creado exitosamente' ,'success');
        return redirect()->route('panel.roles.edit', compact('role'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions=$this->havePermission($role);

        $this->data = [
        'permissions' =>  $permissions,
        'role'=>$role,
        'route'=>'panel.roles.update',
        'method'=>'put',
        ];
       return $this->loadView('panel.roles.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('panel.roles.edit', $role)->with('info','El rol se actualizó exitosamente');
    }




    public function havePermission(Role $role):array
    {
        $permissions = Permission::orderBy('description' , 'DESC')->get();
        $hasPermission = $role->permissions()->get();

        $result = [];

        foreach($permissions as $permission)
        {
            if($hasPermission->contains($permission))
            {
                $data[$permission->description]['check'] = true;
                $data[$permission->description]['id'] = $permission->id;
                $data[$permission->description]['description'] = $permission->description;
                
            }
            else
            {
                $data[$permission->description]['check'] = false;
                $data[$permission->description]['id'] = $permission->id;
                $data[$permission->description]['description'] = $permission->description;
            }
        }

        return $data;
    }
}
