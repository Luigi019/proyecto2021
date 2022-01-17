@extends('panel.layouts.app')
@section('title', 'Asignar un rol')

@section('content_header')
@stop

@section('container')
    <br>
    <div class="card">
        <div class="card-header">
            <h4>Asignar un rol a {{ $user->name }}</h4>
        </div>
        <div class="card-body">
            <br>
            <form action="{{route('panel.asignedrole', ['user'=>$user])}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <label class="form-control-label pt-2">Nombre: </label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="{{ $user->name }}" onlyread>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 d-flex">
                            <label class="form-control-label pt-2">Rol: </label>
                            <div class="col-md-8 pt-2">
                                <select multiple="multiple" class="form-control chosen-select" name="roles[]" id="roles">
                                    @foreach ($roles as $rols)
                                        <option value="{{ $rols->id }}">{{ $rols->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </form>
            
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
