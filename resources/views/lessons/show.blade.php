@extends("layouts.app")

@section('title', 'Clase')

@section('css')
<style>
    .logoIcon {
        display: inline;
        height: 1em;
    }
</style>
@endsection
@section('content')

  
    <section class='details '>
        <div class="row mb-4">
            {{--Título y descripción--}}
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid h-100 w-100">
                    <div class="container-fluid p-4">
                        <h1 class="display-4">{{$lesson->title}}</h1>
                        <hr class="my-4 bg-danger">
                        <p class="lead"> <span>{{(request('course'))?'Profesor: '.$course->teacher->name : '' }}</span></p>
                        <p class="lead">{!! $lesson->description !!}</p>
                    
                        {{-- <button href="#" class="btn btn-danger mt-4" data-toggle="modal" data-target="#classModal"><i
                                class="fas fa-cash-register"></i>&nbsp; Comprar
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            {{--Trailer--}}
            <div class="col-12">
                {{-- <iframe class="w-100" height="500" src="https://www.youtube.com/embed/v-_Ad1MEpq0"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe> --}}

                <video src='{{asset($lesson->getFile('video' , 'first')['file'])}}' width='100%' controls> </video>
            </div>
        </div>
        <div class="row mb-4">
            {{--Contenido--}}
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Contenido extra de la clase</h5>
                    <div class="card-body">
                        {!! $lesson->content ? $lesson->content : 'Sin contenido' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('classCalendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                events: '{{ route('public.lesson.lessonbyuser') }}',
                dateClick: function () {
                    let formData = document.getElementById('formPersonalLesson');
                    formData.reset();
                    $("#lessonModal").modal("show");
                    showFieldByPreference();
                    $('#description').val('');
                    $('#city_id').val('0');
                    $('#preference_id').val('1');
                    $('#id').val('');
                    $('#btnSave').css('display', 'block');
                    $('#btnDelete').css('display', 'none');
                    $('#btnEdit').css('display', 'none');
                    $('#btnShow').css('display', 'none');
                },
                eventClick: function (info) {
                    $('#btnDelete').css('display', 'block');
                    $('#btnEdit').css('display', 'block');
                    $('#btnSave').css('display', 'none');
                    $('#btnShow').css('display', 'none');
                    $('#lessonModal').modal('show');
                    $('#title').val(info.event.title);
                    let id = info.event.id;
                    $('#id').val(id);
                    $.get('/lessons/' + id, function (data) {
                        console.log(data);
                        $('#price').val(data.lesson.price);
                        $('#description').val(data.lesson.description);
                        $('#city_id').val(data.lesson.city_id);
                        if (data.lesson.online == '0') {
                            $('#frameYT').hide();
                            $('#preference_id').val('2');
                            $('#preference_id').on('change', function (e) {
                                let preference = $('#preference_id option:selected')
                                    .attr('value');
                                if (preference == 1) {
                                    $('#frameYT').show(500);
                                    $('#city').hide(500);
                                    $('#city_id').val('0');
                                } else {
                                    $('#frameYT').hide(500);
                                    $('#city').show(500);
                                    $('#iframeYT').val('');

                                }
                            });
                        } else {
                            showFieldByPreference();
                            $('#preference_id').val('1');
                            $
                        }
                    });
                }
            });
            calendar.render();
        });
    </script> --}}
@endsection
@section('js')

@endsection
