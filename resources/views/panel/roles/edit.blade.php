@extends('panel.layouts.app')

@section('title', 'Editar un rol')
@section('content_header')
<a href="{{ URL::previous() }}" class="btn btn-primary"> Volver hacia atrás</a>
<div class="mb-4"></div>
 <h1>Editar un rol</h1>
@endsection


@section('container')

@if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif

<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route'=>['panel.roles.update',$role], 'method'=>'put']) !!}
            
            @include('panel.roles.inc.form')

            {!! Form::submit('Editar rol', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection