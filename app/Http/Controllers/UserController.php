<?php

// namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
// use App\Models\User;
// use App\Http\Requests\UserRequest;
// use Illuminate\Http\Request;

// use Spatie\Permission\Models\Permission;
// use Hash, Auth;

// class UserController extends Controller
// {
//     public function index(){
//         \Meta::set('description', 'Perfil del usuario');
//         \Meta::set('description', 'User Profile');
//         \Meta::set('og:type', 'articles');
//         \Meta::set('og:type', 'articulos');
//         $user=User::find(1);
//         return view('user.profile', compact('user'));
//     }
//     public function updateDataUser(Request $request, User $user)
//     {
//         $request->validate([
//             'name' => ['required', 'string'],
//             'email' => ['required', 'string', 'email', 'unique:users'],
//         ]);
//         $user=User::find(1);
//         $user->name = $request->name;
//         $user->email = $request->email;

//         $user->update();
//         flash('Se ha editado exitosamente', 'success');
//         return back();
        
//     }

//     public function updatePassword(Request $request)
//     {
//         $request->validate([
//             'password' => ['required', 'string', 'min:6'],
//             'confirm' => ['required', 'string']
//         ]);
//         if (!Hash::check($request->confirm, Auth::user()->password)) return back()->with('message', 'La clave confirmada no es valida')->with('type', 'danger');

//         Auth::user()->password = $request->password;

//         return back()->with('message', 'La clave se actualizo correctamente')->with('type', 'success');
//     }

// }
