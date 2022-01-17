@extends('panel.layouts.app')
@section('title','Home')


@section('customCss')


@endsection
@section('content_header')
<a href="{{ URL::previous() }}" class="btn btn-primary"> Volver hacia atrás</a>
<div class="mb-4"></div>
@endsection
@section('content')

<div>
    <div class='form-responsive'>
<form action="{{route("panel.courses.store")}}" method="POST" enctype="multipart/form-data" id="main-form">
    @csrf
<x-message-or-errors/>
    @include ('panel.courses.inc.form')
    <input class="btn btn-success" type="submit" value="Agregar" >
</form>

<br>
    </div>
</div>

@endsection

@section('scripts')
  
    <script>
          // Para el plugin de selector multiple
     $(".chosen-select").chosen({
            placeholder_text_multiple: 'Puede seleccionar una o varias opciones',
           no_results_text: "No se encontraron resultados"

     });
   //Para el dropzone



    </script>
@endsection
