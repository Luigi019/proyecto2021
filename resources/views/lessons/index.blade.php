@extends('layouts.app')

@section('title', 'Formaciones disponibles')

@section('header')

    @include('layouts.inc.jumbotron')

@endsection

@section('content')

    <section class="mt-3">
        <div class="row mb-5">
            <div class="col-md-8">
                <h2 class="text-capitalize text-roboto font-weight-bolder">
                    <img src="{{asset('img/logo1.png')}}" alt="XTROMBA" height="40" width="40">
                    <strong>Nuevas clases</strong>
                </h2>
            </div>
{{--            @include('courses.inc.input-search')--}}
        </div>
        <div class='courses mb-5'>
            <div class="h-25">
                <div id='calendar'></div>
                {{--                 @livewire('list-courses', ['data' => $lessons, 'var' => 'mb-3 col-md-3', 'modal' => true, 'type' => 'lessons'])--}}
            </div>
            @include('lessons.modal.lesson-calendar-modal')
        </div>
    </section>

@endsection


@section('js')

    <script>


        document.addEventListener('DOMContentLoaded', function () {

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                events: '{{route('public.lesson.getall')}}',

                eventClick: function (info) {
                    $('#lessonModal').modal('show');
                    $('#title').html(info.event.title);
                    let id = info.event.id;
                    $.get('/lessons/' + id, function (data) {
                        console.log(data);
                        if (data.teacher) {
                            $('#teacher').html('Por: ' + data.teacher.name);
                        } else {
                            $('#teacher').html('Instructor por asignar');
                        }
                        $('#startDate').val(data.lesson.start);
                        $('#precio').val(data.lesson.price);
                        $('#lessonDescription').html(data.lesson.description);
                        $('#imagenLesson').attr('src', data.img);
                        // if(!data.teacher.email_verified_at){
                        //         $('#verify').css('display', 'none')
                        // }

                        $('#btn-next').on('click', () => {
                            console.log(data)
                            if (!data.hasLesson) {
                                let route = '{{route("public.payment.checkout" , ":id")}}'
                                let url = route.replace(':id', data.lesson.id)

                                window.location.href = url + '?isCourse=lessons';
                            } else {
                                let route = '{{route("public.streaming.stream.show" , ":id")}}'
                                let url = route.replace(':id', data.lesson.slug)
                                window.location.href = url;

                            }

                        })
                    });
                }
            });
            calendar.render();
        });


    </script>

@endsection

