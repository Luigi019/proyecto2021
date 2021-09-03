<div class="mt-2"><a href="{{ URL::previous() }}" class="btn btn-primary"> Volver hacia atrás</a></div>
<div class="mb-4"></div>
<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre del rol') }}
            {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group">
            @foreach($permissions as $permission => $values)
                <div class="form-group">
                <input type="checkbox"  name="roles[]" class="mr-2" {{$values['check'] ? 'checked' : ''}} value="{{$values['id']}}" />{{$permission}}
                </div>
                @endforeach
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>
