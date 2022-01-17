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
     <form action="{{ route('panel.cities.update', $city) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include ('panel.city.inc.form')
            <input class="btn btn-success" type="submit" value="Editar" >
        </form>
        
        <br>
    </div>
</div>

@endsection

@section('scripts')
  
@endsection
