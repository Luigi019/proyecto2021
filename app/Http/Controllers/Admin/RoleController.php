<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

/**
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();

        return view('panel.role.index', compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * $roles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        $permissions = $this->havePermission($role);
        return view('panel.role.create', compact('role' , 'permissions'));
    }

    /**
     * Store a newly guardada resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $role = Role::create($request->all());
        $role->syncPermissions($request->roles);
        return redirect()->route('admin.roles.index')
            ->with('success', 'Rol guardado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);


        return view('panel.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = $this->havePermission($role);


        return view('panel.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {


        $role->update($request->all());
        $role->syncPermissions($request->roles);
       return redirect()->route('admin.roles.index')
            ->with('success', 'Rol actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $role = Role::find($id)->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Rol eliminado satisfactoriamente');
    }

    public function havePermission(Role $role):array
    {
        $permissions = Permission::orderBy('id' , 'DESC')->get();
        $hasPermission = $role->permissions()->get();


        foreach($permissions as $permission)
        {
            if($hasPermission->contains($permission))
            {
                $data[$permission->name]['check'] = true;
                $data[$permission->name]['id'] = $permission->id;
//                $data[$permission->description]['description'] = $permission->description;

            }
            else
            {
                $data[$permission->name]['check'] = false;
                $data[$permission->name]['id'] = $permission->id;
//                $data[$permission->description]['description'] = $permission->description;
            }
        }

        return $data;
    }
}
