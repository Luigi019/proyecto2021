@extends('panel.layouts.app')


@section('container')
<div>
        <x-table 
        {{-- @can('admin.teachers.create') --}}
            create='Crear nuevo {{ $page["createText"] }},{{ $datatable["route"]["createData"] }}'
        {{-- @endcan --}}
        >

            @slot('theads', $datatable['columns'])

        </x-table>


</div>
@endsection
