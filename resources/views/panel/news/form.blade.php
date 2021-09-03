<div class="mt-2"><a href="{{ URL::previous() }}" class="btn btn-primary"> Volver hacia atrás</a></div>
<div class="mb-4"></div>
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('title', $news->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contenido') }}
            {{ Form::textarea('body', $news->body, ['class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'placeholder' => 'Body']) }}
            {!! $errors->first('body', '<div class="invalid-feedback">:message</p>') !!}
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
                key: '{{ $news->getFile("new" ,"first") }}',
                url: '{{ route('admin.delete.img.resource', ['news' => $news]) }}'
            }],
      
            initialPreview: [ // Settings for Preview Pictures
                @if ( File::exists($news->getFile("new" ,'first')))
                    "<img height='200' src='{{ asset($news->getFile('new' ,'first')) }}' class='file-preview-image'>",
                @endif
            ]


        });
})

</script>