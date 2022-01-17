<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', $role->name, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del rol']) !!}

    @error('name')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror

</div>

<h2 class="h3">Lista de permisos</h2>

@foreach ($permissions as $permission => $data)
<div>
    <label>
        {!! Form::checkbox('permissions[]', $data['id'], $data['check'], ['class'=>'mr-1']) !!}
        {{$permission}}
    </label>
</div>
@endforeach