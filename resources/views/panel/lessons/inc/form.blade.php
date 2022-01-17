<style>
    .file-caption-name {
        opacity: 0 !important;
    }

</style>
<div class='lessons '>
    <div class='card mt-5'>
        <div class='card-body'>
            <div class="form-group justify-content-center">
                <div class="form-group justify-content-center">

                    @if (request('course'))

                        <input type='hidden' name='course' value='{{ request('course') }}' />
                        <h1>Crea una clase del curso {{ $course->title }}</h1>
                    @endif
                    <label for="title">Titulo de la clase: </label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ isset($lesson->title) ? $lesson->title : '' }}" maxlength="25">
                    <small>Ejemplo: Flamenco</small>
                </div>
                <div class="form-group justify-content-center">
                    <label for="Descripcion">Descripción: </label>
                    <textarea class="form-control form-control-lg" name="description" id="description" cols="3"
                        rows="3">{{ isset($lesson->description) ? $lesson->description : '' }}</textarea>
                    <small>Ejemplo: Bailes al estilo natural y clásico</small>
                </div>
                @if (!request('course') || request('lesson'))
                    <div class="form-group justify-content-center">
                        <label for="Precio">Precio: </label>
                        <input type="text" class="form-control" name="price" id="price"
                            value="{{ isset($lesson->price) ? $lesson->price : '' }}" maxlength="25">
                        <small>Ejemplo: 50.00</small>
                    </div>

                    <div class="form-group">
                        <label class="mt-3 mb-3" for="Profesor">Profesor: </label>

                        <select name="instructor_id" id="instructor_id" class="form-control ">
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
                            @if (isset($lesson->cities))
                                <option selected value='{{ $lesson->city_id }}'>{{$lesson->cities->name ?? null}}</option>
                            @endif
                            <option value="0">Seleccione una opción</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" id="frameYT">
                        <label class="mt-3 mb-3">FrameYT:</label>
                        <input type="text" class="form-control" name="iframeYT" id="iframeYT">
                    </div>



                    <div class="form-group">
                        <label class="mt-3 mb-3">Fecha:</label>
                        <input type="date" class="form-control" name="start" id="start">
                    </div>

                    <div class="form-group">
                        <label class="mt-3 mb-3" for="Tags">Tags: </label>

                        <select name="tag[]" id="tag" multiple="multiple" class="form-control chosen-select">
                            @foreach ($tag as $tag => $data)
                                <option {{ $data['check'] ? 'selected' : '' }} value="{{ $data['id'] }}">
                                    
                                    {{ $data['tag'] }}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                @endif


                <div class="form-group justify-content-center ">
                    <label class="mt-3 mb-3" for="Foto">Foto: </label>

                    <div class="file-loading">
                        <input class="input-fa-photo hidden " name="photo[]" type="file"
                            accept="image/png,image/jpg,image/jpeg" multiple>
                    </div>
                </div>

                <div class="form-group justify-content-center">
                    <label class="mt-3 mb-3" for="Video">Video: </label>

                    <div class="file-loading">
                        <input type="file" id='Video'
                            accept="video/mp4,video/mkv,video/avi,video/mov,video/flv,video/webm" multiple
                            class=" hidden input-fa-video" name="video[]">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function() {




        // Para el plugin de selector multiple
        $(".chosen-select").chosen({
            placeholder_text_multiple: 'Puede seleccionar una o varias opciones',
            no_results_text: "No se encontraron resultados"

        });

        $('#city').hide();
        $('#preference_id').on('change', function(e) {
            let preference = $('#preference_id option:selected').attr('value');
            if (preference == 1) {
                $('#frameYT').show(500);
                $('#city').hide(500);
            } else {
                $('#frameYT').hide(500);
                $('#city').show(500);
            }
        });

        //Para el dropzone
        $(".input-fa-photo").fileinput({
            theme: "fa",
            uploadAsync: false,
            initialPreviewConfig: [{
                key: '{{ $lesson->getFile('photo', 'first')['file'] }}',
                url: `{{ route('delete.img.course', ['lesson' => $lesson,
                'parentId'=>$lesson->id,
                'childId'=>$lesson->getFile('photo' , 'first')['id'],
                'model'=>'Lesson'
                ]) }}`
            }],
            showUpload: false,
            maxFileCount: 1,
            maxFileCount: 1,
            showRemove: false,
            initialPreview: [ // Settings for Preview Pictures
                @if (File::exists('storage/' . $lesson->getFile('photo', 'first')['file']))
                    `<img height='200' src='{{ asset('storage/' . $lesson->getFile('photo', 'first')['file']) }}
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
                key: '{{ $lesson->getFile('video', 'first')['file'] }}',
                url: `{{ route('delete.img.course', ['lesson' => $lesson,
                'parentId'=>$lesson->id,
                'childId'=>$lesson->getFile('photo' , 'first')['id'],
                'model'=>'Lesson'
                ]) }}`
            }],
            initialPreview: [
                @if ($lesson->count() > 0 && File::exists('storage/' . $lesson->getFile('video', 'first')['file']))
                    `<video width='200' height='200' src='{{ asset('storage/' . $lesson->getFile('video', 'first')['file']) }}'
                        class='file-preview-image' controls>`,
                @endif
            ]


        });

    })
</script>
