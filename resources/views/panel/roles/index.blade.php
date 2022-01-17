@extends('panel.layouts.app')

@section('title', 'Lista de roles')

@section('content_header')
    {{-- <a href="{{route('admin.roles.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo rol</a>
    <h1>Lista de roles</h1> --}}
@stop

@section('container')

@if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
@endif

 {!! $html->table(['class' => 'table table-bordered'], true) !!}
@endsection

@section('js')
    {!! $html->scripts() !!}
@endsection