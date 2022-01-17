<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $teacher)
    {
        \Meta::set('description', 'Perfil del usuario');
        \Meta::set('description', 'User Profile');
        \Meta::set('og:type', 'articles');
        \Meta::set('og:type', 'articulos');
       

        
        $data = [
            'teachers'=>User::all(),
           
        ];

        return view('teachers.teachers', $data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \Meta::set('description', 'Perfil del usuario');
        \Meta::set('description', 'User Profile');
        \Meta::set('og:type', 'articles');
        \Meta::set('og:type', 'articulos');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $teacher)
    {
        \Meta::set('description', 'Perfil del usuario');
        \Meta::set('description', 'User Profile');
        \Meta::set('og:type', 'articles');
        \Meta::set('og:type', 'articulos');
            $data = [
                'teachers'=>User::all(),
                'teacher'=>$teacher
            ];

            return view('teachers.teachers', $data); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        \Meta::set('description', 'Perfil del usuario');
        \Meta::set('description', 'User Profile');
        \Meta::set('og:type', 'articles');
        \Meta::set('og:type', 'articulos');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
