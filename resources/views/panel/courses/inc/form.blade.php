<style>
    .chosen-container {
        width: 100% !important;
    }

    .file-caption-name {
        opacity: 0 !important;
    }

</style>

<div class="form-group justify-content-center">
    <div class="form-group justify-content-center">
        <label for="title">Titulo:</label>
        <input type="text" class="form-control" name="title" id="title"
            value="{{ isset($course->title) ? $course->title : '' }}"  required>
        <small>Ejemplo: Bailar Salsa Casino</small>
    </div>
    <div class="form-group justify-content-center">
        <label for="Descripcion">Descripción: </label>
        <textarea class="form-control form-control-lg" name="description" id="description" cols="3"
            rows="3">{{ isset($course->description) ? $course->description : '' }}</textarea>
        <small>Ejemplo: Aprenderas a bailar salsa casino como todo un profesional</small>
    </div>
    <div class="form-group justify-content-center">
        <label for="Descripcion">Contenido: </label>
        <textarea class="form-control form-control-lg" name="content" id="description" cols="3"
            rows="3">{{ $course->content }}</textarea>
        <small>Ejemplo: Aprenderas a bailar salsa casino como todo un profesional</small>
    </div>
    <div class="form-group justify-content-center">
        <label for="Precio">Precio: </label>
        <input type="text" class="form-control" name="price" id="price"
            value="{{ isset($course->price) ? $course->price : '' }}" maxlength="25" required>
        <small>Ejemplo: 50.00</small>
    </div>

    <div class="form-group">
        <label class="mt-3 mb-3" for="Profesor">Profesor:</label>

        <select name="instructor_id" id="instructor_id" class="form-control chosen-select">
            @if (isset($course->teacher))
                <option selected value='{{ $course->teacher->id }}'>{{ $course->teacher->name }}</option>
            @endif
            @foreach ($user as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

    </div>

    <div class="form-group">
        <label class="mt-3 mb-3">Preferencia:</label>
        <select name="preference_id" id="preference_id" class="form-control chosen-select" required>
            <option value="1">Online</option>
            <option value="2">Presencial</option>
        </select>
    </div>

    <div class="form-group" id="city">
        <label class="mt-3 mb-3">Ciudad:</label>

        <select name="city_id" id="city_id" class="form-control chosen-select" required>
            @if ($course->city_id)
                <option selected value='{{ $course->city_id }}'>{{ $course->cities->name }}</option>
            @endif
            <option value="0">Seleccione una opción</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group justify-content-center" style="">
        <label class="mt-3 mb-3" for="Video">Trailer:</label>
        <div class="file-loading">
            <input id="video" type="file" accept="video/mp4,video/mkv,video/avi,video/mov,video/flv,video/webm" multiple
                class="hidden input-fa-video" name="video[]">
        </div>
    </div>
    <div class="form-group justify-content-center " style="">
        <label class="mt-3 mb-3" for="Foto">Foto:</label>
        <div class="file-loading">
            <input id="photo" class="hidden input-fa-photo" name="photo[]" type="file"
                accept="image/png,image/jpg,image/jpeg" multiple />
        </div>
    </div>

    <div class="form-group">
        <label class="mt-3 mb-3" for="Tags">Tags:</label>
        <select name="tag[]" id="tag" multiple="multiple" class="form-control chosen-select">
            @foreach ($tag as $tag)
                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
            @endforeach
        </select>
    </div>

    <label class="mt-3 mb-3" for="events">Eventos</label>
    <div id='events'>

        @include('panel.courses.inc.event')
    </div>
    <button class='btn btn-secondary' id='order-event' type='button'> Agregar otro evento </button>
    <div class=' form-group'>
    <label class="mt-3 mb-3" for="extras">Extras</label>
<div id="extras">

    @include('panel.courses.inc.extras')
</div>
<button class='btn btn-secondary' id='btn-extras' type='button'> Agregar otro extra </button>
</div>
</div>

    @if ($course->lessons->count())
        <div class="form-group">
            <h2>Editar clases</h2>
            @foreach ($course->lessons as $key => $lesson)
                @php
                    $key++;
                @endphp
                <div class='d-flex flex-column'>
                    <span> #{{ $key }}<a class='ml-2'
                            href="{{ route('panel.lessons.edit', $lesson) }}">{{ $lesson->title }}</a></span>
                </div>
            @endforeach
        </div>
    @endif
</div>


<script>
    window.addEventListener('DOMContentLoaded', function() {

        $('#order-event').click(() => {
            const eventContainer = $('#events');
            eventContainer.append(`<div class='form-group'>
    <div class='d-flex flex-direction-row mb-3'>
        <input type='text' class='form-control col-md-3' name='event[title][]' ' placeholder='Titulo del evento' >
        <input type='datetime-local' name='event[start][]'  class='form-control col-md-3 ml-4' placeholder='fecha del evento' >
                <input type='number' hidden class='form-control col-md-3' name='event['id'][]'  >
        <i class='fas fa-trash text-danger ml-3 mt-3' id='event-delete'> </i>
    </div>
    <textarea class='form-control' name='event[content][]'></textarea>

 </div>`)
            tinymce.init({
                language: 'es',
                plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',

                selector: 'textarea'
            });

        })

        $('#btn-extras').click(() => {
            const eventContainer = $('#extras');
            eventContainer.append(`<div class='d-flex '>
    <input type="text" placeholder="Titulo del archivo" class='form-control col-md-3' name="extra[title][]">
    <input type='number' hidden class='form-control col-md-3' name='extra[id][]'  >
    <input id="extra" class="hidden ml-3 " name="extra[file][]" type="file"/>
    <i class="fas fa-trash text-danger" id='delete-extra'></i>
</div>
</div>
`)

        })
        $(document).on('click', '#event-delete', function() {
            let event = $(this).closest('.form-group')
            @if ($course->events->count())
                let route = '{{ route('panel.delete.event', ':id') }}';
                let id = event.attr('data-id');
                route = route.replace(':id' , id);
                alert(route)
                $.get(route).then(() => event.remove()).catch(err => alert(err));
                return true;
            @endif
            event.remove()
        })

        $(document).on('click', '#delete-extra', function() {
            let extra = $(this).closest('.form-group')
            
            @if (count($course->getFile('extra' , 'get')))
                let route = '{{ route('delete.img.course') }}';
                let file = extra.attr('data-file');
                let id = extra.attr('data-id');
                route = route.replace(':id' , id);
                alert(route)
                $.post(route,{childId:id,key:file,model:'Course', parentId:{{$course->id}}}).then(() => extra.remove()).catch(err => alert(JSON.strigify(err)));
                return true;
            @endif
            extra.remove()
        })

        $('#city').hide();
        $('#preference_id').on('change', function(e) {
            let preference = $('#preference_id option:selected').attr('value');
            if (preference == 0 || preference == 1) {
                $('#city').hide(500);
            } else if (preference == 2) {
                $('#city').show(500);
            }
        });

        // Para el plugin de selector multiple
        $(".chosen-select").chosen({
            placeholder_text_multiple: 'Puede seleccionar una o varias opciones',
            no_results_text: "No se encontraron resultados"

        });

        //Para el fileinput
        $(".input-fa-photo").fileinput({
            theme: "fa",
            uploadAsync: false,
            initialPreviewConfig: [{
       
                key: '{{ $course->getFile('photo', 'first')['file'] }}',
                url: `{{ route('delete.img.course', [
                    'course' => $course,
                    'model'=>'Course',
                    'parentId'=>$course->id,
                    'childId'=> $course->getFile('photo', 'first')['id']
                    ]) }}`,
            }],
            showUpload: false,
            maxFileCount: 1,
            maxFileCount: 1,
            showRemove: false,
            initialPreview: [ // Settings for Preview Pictures
                @if (File::exists(  $course->getFile('photo', 'first')['file']))
                    `<img height='200' src='{{ asset($course->getFile('photo', 'first')['file']) }}'
                        class='file-preview-image'>`,
                @endif
            ]


        });

        $(".input-fa-video").fileinput({
            theme: "fa",
            uploadAsync: false,
            showUpload: false,
            showRemove: false,
            maxFileCount: 1,
            maxFileCount: 1,
            initialPreviewConfig: [{
                key: '{{ $course->getFile('trailer', 'first')['file'] }}',
                url: `{{ route('delete.img.course', [
                'course' => $course,
                    'model'=>'Course',
                    'parentId'=>$course->id,
                    'childId'=> $course->getFile('trailer', 'first')['id'] 
                ]) }}`,
          
            }],
            initialPreview: [
                @if ($course->count() > 0 && File::exists(  $course->getFile('trailer', 'first')['file']))
                    `<video width='200' height='200' src='{{ asset(  $course->getFile('trailer', 'first')['file']) }}'
                        class='file-preview-image' controls>`,
                @endif
            ]


        });


    })
</script>
