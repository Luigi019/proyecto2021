<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::paginate();

        return view('panel.user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $user = new User();
        $roles = $this->haveRoles($user);
        return view('panel.user.create', compact('user' , 'roles'));
    }

    /**
     * Store a newly guardada resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $user = User::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'slug'=>$request->name,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario guardado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('panel.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = $this->haveRoles($user);
        return view('panel.user.edit', compact('user' , 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {


        $user->update([
            'email'=>$request->email,
            'name'=>$request->name,
            'slug'=>$request->name,
            'password'=>Hash::make($request->password),
        ]);
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): RedirectResponse
    {
        $user = User::find($id)->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario eliminado satisfactoriamente');
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
