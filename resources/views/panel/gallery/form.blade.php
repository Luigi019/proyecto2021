<div class="mt-2"><a href="{{ URL::previous() }}" class="btn btn-primary"> Volver hacia atrás</a></div>
<div class="mb-4"></div>
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('name', $gallery->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('description', $gallery->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
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
                key: '{{ $gallery->getFile("gallery" ,'first') }}',
                url: '{{ route('admin.delete.img.resource', ['gallery' => $gallery]) }}'
            }],
      
            initialPreview: [ // Settings for Preview Pictures
                @if ( File::exists($gallery->getFile("gallery" ,'first')))
                    "<img height='200' src='{{ asset($gallery->getFile("gallery" ,"first")) }}' class='file-preview-image'>",
                @endif
            ]


        });
})

</script>