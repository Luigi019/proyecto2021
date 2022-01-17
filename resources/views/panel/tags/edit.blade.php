@extends('panel.layouts.app')
@section('title', 'Home')

@section('content_header')
<a href="{{ URL::previous() }}" class="btn btn-primary"> Volver hacia atrás</a>
<div class="mb-4"></div>
@endsection

@section('content')
    <div>
        <div class='form-responsive'>
            <form action="{{ route('panel.tags.update' , $tag) }}" method="POST" enctype="multipart/form-data" id="main-form">
                @csrf
                @method('put')
                <x-message-or-errors />
                @include ('panel.tags.inc.form')
                <input class="btn btn-success" type="submit" value="Editar">
            </form>

            <br>
        </div>
    </div>

@endsection

