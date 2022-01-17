@extends('panel.layouts.app')

@section('container')
<div>
        <x-table 
        {{-- @can('admin.tags.create') --}}
            create='Crear nuevo {{ $page["createText"] }},{{ $datatable["route"]["createData"] }}'
        {{-- @endcan --}}
        >

            @slot('theads', $datatable['columns'])

        </x-table>


</div>
@endsection