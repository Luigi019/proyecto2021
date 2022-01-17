@extends('user.inc.layoutProfile')

@section('mainProfile')

    <table class="table table-hover table-striped">
        <thead>
        <th class="text-uppercase text-center">#</th>
        <th class="text-uppercase">descripcion</th>
        <th class="text-uppercase text-center">precio</th>
        <th class="text-uppercase">referencia</th>
        <th class="text-uppercase text-center">Factura</th>

        </thead>

        <tbody>
    @foreach($user->transactions as $transaction)
        <tr>
            <td class="text-center">
                {{$transaction->id}}
            </td>
            <td>
                {{$transaction->description}}
            </td>
            <td class="text-center">
                {{$transaction->price}}
            </td>
            <td>
                {{$transaction->reference}}
            </td>
            <td class="text-center">
                <a href="{{route('public.download-invoice' , $transaction)}}"><i class="fas fa-file-pdf fa-2x text-danger"></i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endsection
