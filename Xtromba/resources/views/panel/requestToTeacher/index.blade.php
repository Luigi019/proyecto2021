@extends('panel.layouts.app')


@section('container')
<div>
        <x-table>

            @if(isset($datatable))
                 @if( isset($datatable['columns']))
                     @slot('theads', $datatable['columns'])
                 @endif
            @endif
        </x-table>

</div>
@endsection