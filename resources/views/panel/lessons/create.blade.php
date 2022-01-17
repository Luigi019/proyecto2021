@extends('panel.layouts.app')
@section('title','Home')

@section('content_header')
<a href="{{ URL::previous() }}" class="btn btn-primary"> Volver hacia atrás</a>
<div class="mb-4"></div>
@endsection
@section('customCss')

@endsection

@section('content')
<div>
    <div class='form-responsive'>
<form method="POST" action='{{route("panel.lessons.store")}}' enctype="multipart/form-data"  id="main-form">
    @method('POST')
    @csrf
<x-message-or-errors/>
    @include ('panel.lessons.inc.form')
    <input class="btn btn-success" type="submit" value="Agregar" >
</form>

    </div>
</div>

@endsection

@section('scripts')

@endsection
