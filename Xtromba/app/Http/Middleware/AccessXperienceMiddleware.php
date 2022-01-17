<?php

namespace App\Http\Middleware;


use App\Http\Traits\LessonOrCourse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessXperienceMiddleware
{
    use LessonOrCourse;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = $this->courseOrLesson($request);
        $route = [];

        $table =$data['object']->getTable();
        if($table === 'lessons')
        {
            $route['params']['lesson'] = $data['object'];
            $route['route'] = 'public.streaming.stream.show';
        } else{
            // $route['params']['lesson'] = $data['object']->lessons->first();
            $route['params']['course'] = $data['object'];
            $route['route'] = 'public.courses.details';
        }
    
        if(Auth::user()->hasRole('ADMINISTRADOR') || Auth::user()->hasRole(['PROFESOR']) || Auth::user()->hasProduct($data['object'] , 'Course' , 'course')->count() > 0)
        {
            return redirect()->route($route['route'] , $route['params']);
        }



        return $next($request);
    }
}
