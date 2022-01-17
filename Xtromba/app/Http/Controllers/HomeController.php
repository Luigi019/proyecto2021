<?php

namespace App\Http\Controllers;

use App\Http\Traits\Event;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{

    use Event;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

        public function index()
        {

            \Meta::set('description', 'Todos los cursos y clases');
            \Meta::set('description', 'All corses & lessons');
            \Meta::set('og:type', 'articles');
            \Meta::set('og:type', 'articulos');
           $data = [
            'lessons' => Lesson::all(),
            'courses' => Course::all(),
           ];

            return view('home', $data);
        }

}
