@extends('panel.layouts.app')

@section('title', 'Asignar un rol')
@section('content_header')
<a href="{{ URL::previous() }}" class="btn btn-primary"> Volver hacia atrás</a>
<div class="mb-4"></div>
<h1>Asignar un rol</h1>
@endsection


@section('container')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <p class="h5">Nombre:</p>
        <p class="form-control">{{$user->name}}</p>

        {!! Form::model($user, ['route'=>['panel.users.update', $user], 'method'=> 'put']) !!}
        <select multiple="multiple" class="form-control chosen-select" name="roles[]" id="roles">
        @foreach ($roles as $name => $data)
                    <option {{$data['check'] ?'selected' : ''}} name='roles[]' id='role-{{$data["id"]}}' value='{{$data["id"]}}' >{{$name}}</option>
     
        @endforeach
    </select>
        {!! Form::submit('Asignar rol', ['class'=>'btn btn-primary mt-2']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection

@section('scripts')
  
    <script>
          // Para el plugin de selector multiple
     $(".chosen-select").chosen({
            placeholder_text_multiple: 'Puede seleccionar una o varias opciones',
            no_results_text: "No se encontraron resultados",
            height: "38px"

     });
   //Para el dropzone



    </script>
@endsection
