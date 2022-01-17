@extends('panel.layouts.app')

@section('title', 'Mostrar un rol')

@section('content_header')
    <h1>Mostrar un rol</h1>
@stop

@section('container')

{{ Auth::id() }}

@endsection