@extends('panel.layouts.app')

@section('title', 'Home')

@section('content_header')
    <h1>Panel de administración</h1>
@stop

@section('container')

<div class="row">
    <div class="col-12">
    
        <!-- Small Boxes (Stats Boxes) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
    
                <div class="card bg-red rounded shadow">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div class="text-white">
                                <h2 class="text-white font-weight-bold">
                                    <a href="{{route('panel.cities.index')}}" class="text-white" style="font-weight: bold;">
                                        {{$city->count()}}
                                    </a>
                                </h2>
                                <h6 class="text-white">
                                    <a href="{{route('panel.cities.index')}}" class="text-white">
                                    Ciudades activas
                                    </a>
                                </h6>
                            </div>
                            <div class="ml-auto">
                                <span class="text-white display-6">
                                    <a href="{{route('panel.cities.index')}}" class="text-white">
                                    <i class="fas fa-city"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
    <div class="col-lg-3 col-xs-6">
    
    <div class="card bg-purple rounded shadow">
        <div class="card-body">
            <div class="d-flex no-block align-items-center">
                <div class="text-white">
                    <h2 class="text-white font-weight-bold">
                        <a href="{{route('panel.courses.index')}}" class="text-white" style="font-weight: bold;">
                            {{$course->count()}}
                        </a>
                    </h2>
                    <h6 class="text-white">
                        <a href="{{route('panel.courses.index')}}" class="text-white">
                        Cursos activos
                        </a>
                    </h6>
                </div>
                <div class="ml-auto">
                    <span class="text-white display-6">
                        <a href="{{route('panel.courses.index')}}" class="text-white">
                        <i class="fas fa-book"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
</div>
    
    <div class="col-lg-3 col-xs-6">
    
    <div class="card bg-success rounded shadow">
        <div class="card-body">
            <div class="d-flex no-block align-items-center">
                <div class="text-white">
                    <h2 class="text-white font-weight-bold">
                        <a href="{{route("panel.lessons.index")}}" class="text-white" style="font-weight: bold;">
                        {{$lesson->count()}}
                        </a>
                    </h2>
                    <h6 class="text-white">
                        <a href="{{route("panel.lessons.index")}}" class="text-white">
                        Clases
                        </a>
                    </h6>
                </div>
                <div class="ml-auto">
                    <span class="text-white display-6">
                        <a href="{{route("panel.lessons.index")}}" class="text-white">
                        <i class="far fa-check-circle"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
</div>
    
    <div class="col-lg-3 col-xs-6">
    
    <div class="card bg-info rounded shadow">
        <div class="card-body">
            <div class="d-flex no-block align-items-center">
                <div class="text-white">
                    <h2 class="text-white font-weight-bold">
                        <a href="{{route("panel.users.index")}}" class="text-white" style="font-weight: bold;">
                        {{ $user->count()}}
                        </a>
                    </h2>
                    <h6 class="text-white">
                        <a href="{{route("panel.users.index")}}" class="text-white">
                        Usuarios
                        </a>
                    </h6>
                </div>
                <div class="ml-auto">
                    <span class="text-white display-6">
                        <a href="{{route("panel.users.index")}}" class="text-white">
                        <i class="far fa-user-circle"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
</div>
    
<div class="col-lg-3 col-xs-6">
    
    <div class="card bg-inverse text-white rounded shadow">
        <div class="card-body">
            <div class="d-flex no-block align-items-center">
                <div class="text-white">
                    <h2 class="text-white font-weight-bold">
                        <a href="{{route("panel.tags.index")}}" class="text-black" style="font-weight: bold;">
                            {{$tag->count()}}
                        </a>
                    </h2>
                    <h6 class="text-white">
                        <a href="{{route("panel.tags.index")}}" class="text-black">
                        Etiquetas
                        </a>
                    </h6>
                </div>
                <div class="ml-auto">
                    <span class="text-white display-6">
                        <a href="{{route("panel.tags.index")}}" class="text-black">
                            <i class="fas fa-tags"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="col-lg-3 col-xs-6">
    
    <div class="card bg-black rounded shadow">
        <div class="card-body">
            <div class="d-flex no-block align-items-center">
                <div class="text-white">
                    <h2 class="text-white font-weight-bold">
                        <a href="{{route("panel.roles.index")}}" class="text-black" style="font-weight: bold;">
                            {{$role->count()}}
                        </a>
                    </h2>
                    <h6 class="text-white">
                        <a href="{{route("panel.roles.index")}}" class="text-black">
                        Roles activos
                        </a>
                    </h6>
                </div>
                <div class="ml-auto">
                    <span class="text-white display-6">
                        <a href="{{route("panel.roles.index")}}" class="text-black">
                            <i class="fas fa-user-secret"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
</div>

        </div>


@endsection