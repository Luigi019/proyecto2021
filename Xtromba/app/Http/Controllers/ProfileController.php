<?php

namespace App\Http\Controllers;

use App\Http\Traits\DownloadInvoice;
use App\Models\Transaction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;
use App\Models\City;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class ProfileController extends Controller
{
    use DownloadInvoice;

    public function index(User $user)
    {
        \Meta::set('description', 'Perfil del usuario');
        \Meta::set('description', 'User Profile');
        \Meta::set('og:type', 'articles');
        \Meta::set('og:type', 'articulos');
        $data = [
            'lesson' => new Lesson,
            'user' => $user,
            'tag' => Tag::all(),
            'lessons' => Lesson::all(),
            'courses' => Course::all(),
            'cities' => City::where('active', '1')->orderBy('name' , 'ASC')->get(),

        ];
        view()->share([
            'object'=>$user,
            'voteType'=>'User'
        ]);
        return view('user.profile', $data);
    }

    public function show()
    {
        \Meta::set('description', 'Perfil del usuario');
        \Meta::set('description', 'User Profile');
        \Meta::set('og:type', 'articles');
        \Meta::set('og:type', 'articulos');

        $data = [
            'lesson' => new Lesson,
            'user' => User::find(2),
            'tag' => Tag::all(),
            'lessons' => Lesson::all(),
            'courses' => Course::all(),
        ];

        return view('user.profile', $data);
    }


    public function update(Request $request, User $user)
    {

        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;
        $user->phone = $request->phone;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->twitter = $request->twitter;
        $user->save();
        flash('Actualizado exitosamente', 'success');
        return back();
    }

    public function changePassword(Request $request, User $user)
    {
        $user->password = Hash::make($request->password);
        $user->save();
        flash('Actualizado exitosamente', 'success');
        return back();
    }

    /**
     * @return View
     */
    public function myExperiences(User $user): View
    {

        return view('user.inc.my-experiences', compact('user'));
    }

    public function myCoursesProfile(User $user): View
    {

        return view('user.inc.my-courses', compact('user'));
    }

    public function myTransactions(User $user): View
    {

        return view('user.inc.my-transactions', compact('user'));
    }




}
