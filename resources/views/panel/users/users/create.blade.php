@extends('panel.layouts.app')
@section('content_header')
<a href="{{ URL::previous() }}" class="btn btn-primary"> Volver hacia atrás</a>
<div class="mb-4"></div>
@endsection
@section('container')

<form action='{{ route($route["storeData"]) }}' method='POST'>
    @include('panel.users.admin.inc.form', ['password'=>true])
   
</form>
@endsection