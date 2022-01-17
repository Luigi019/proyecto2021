@extends('panel.layouts.app')

@section('title', 'Crear un rol')
@section('content_header')
<a href="{{ URL::previous() }}" class="btn btn-primary"> Volver hacia atrás</a>
<div class="mb-4"></div> 
<h1>Crear un rol</h1>
@endsection


@section('container')

<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => [$route , $role]]) !!}
        @method($method)
            
            @include('panel.roles.inc.form')

        {!! Form::submit('Crear rol', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection