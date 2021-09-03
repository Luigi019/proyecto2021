<div class="mt-2"><a href="{{ URL::previous() }}" class="btn btn-primary"> Volver hacia atrás</a></div>
<div class="mb-4"></div>
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $company->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la empresa']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('description', $company->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion de la empresa']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</p>') !!}
        </div>
            <div class="form-group">
            {{ Form::label('Foto') }}
           <input id="input-b3" name="photo[]" type="file" class="file" accept="image/*"
    data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>

<script>
    

document.addEventListener('DOMContentLoaded', () => {


 window.addEventListener('DOMContentLoaded' , () => { 
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            });
    })


  $("#input-b3").fileinput({
           
    
            initialPreviewConfig: [{
                key: '{{ $company->getFile("company" ,'first') }}',
                url: '{{ route('admin.delete.img.resource', ['company' => $company]) }}'
            }],
      
            initialPreview: [ // Settings for Preview Pictures
                @if ( File::exists($company->getFile("company" ,'first')))
                    "<img height='200' src='{{ asset($company->getFile("company" ,"first")) }}' class='file-preview-image'>",
                @endif
            ]


        });
})

</script>

