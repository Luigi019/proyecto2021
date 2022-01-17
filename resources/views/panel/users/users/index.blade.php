@extends('panel.layouts.app')

@section('title', 'Todos los usuarios')

@section('content_header')
    <h1>Lista de todos los usuarios</h1>
@stop

@section('container')

<div>
    <x-table 
        create='Crear nuevo {{ $page["createText"] }},{{ $datatable["route"]["createData"] }}'
    >

        @slot('theads', $datatable['columns'])

    </x-table>

</div>



@endsection