@extends('layouts.app')
@section('title', 'Formaciones disponibles')
@section('css')
    <style>
        .slick-track {
            float: left !important;
        }
    </style>
@endsection
@section('content')
    <section class='mt-4'>
        <div class='row d-none'>
            <div class='col-md-7 mt-3'>
                <h2 class="text-capitalize text-roboto font-weight-bolder">
                    <img src="{{asset('img/logo1.png')}}" alt="XTROMBA" height="40" width="40">
                    <strong>Clases proximas</strong>
                </h2>
                <div class="mb-4">
                    <div class='img-fluid'>

                        <img class='' width='100%' height='400'
                             src='{{$lessons->count() ? asset($lessons[0]->getFile("photo" , "first")) :  asset('img/default.jpg')}}'/>
                        <div class="row">
                            @if($lessons->count())
                                <div class="ml-4">
                                    <h2>{{Str::limit($lessons[0]->title , 50)}}</h2>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-5 mt-2'>
                <div id='calendar'></div>
            </div>
        </div>
        <div>
            <h2 class="text-capitalize text-roboto font-weight-bolder">
                <img src="{{asset('img/logo1.png')}}" alt="XTROMBA" height="40" width="40">
                <strong>Formaciones populares</strong>
            </h2>
            <div class=' slider mt-4'>
                @include('courses.inc.courses' , ['collects' => $courses, 'var'=>'ml-3' , 'modal'=>true , 'type'=>'courses'])
            </div>
        </div>
        <div>
            <h2 class="text-capitalize text-roboto font-weight-bolder">
                <img src="{{asset('img/logo1.png')}}" alt="XTROMBA" height="40" width="40">
                <strong>Experiences populares</strong>
            </h2>
            <div class=' slider mt-4'>
                @include('courses.inc.courses' , ['collects' => $courses, 'var'=>'ml-3' , 'modal'=>true , 'type'=>'courses'])
            </div>
        </div>
        @include('lessons.modal.lesson-calendar-modal')
    </section>

@endsection
@section('js')

    <script>

        //slider

        $('.slider').slick({
            infinite: true,
            speed: 300,
            centerMode: true,
            slide: '.slick-slider',
            autoplay: false,
            arrows: false,
            slidesToShow: 4,
            autoplaySpeed: 800,
            slidesToScroll: -1,
            rtl: false,

            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        infinite: true,
                        dots: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        {{--document.addEventListener('DOMContentLoaded', function () {--}}

        {{--    var calendarEl = document.getElementById('calendar');--}}
        {{--    var calendar = new FullCalendar.Calendar(calendarEl, {--}}
        {{--        initialView: 'dayGridMonth',--}}
        {{--        locale: 'es',--}}
        {{--        events: '{{route('public.lesson.getall')}}',--}}

        {{--        eventClick: function (info) {--}}
        {{--            $('#lessonModal').modal('show');--}}
        {{--            $('#title').html(info.event.title);--}}
        {{--            let id = info.event.id;--}}
        {{--            $.get('/lessons/' + id, function (data) {--}}
        {{--                console.log(data);--}}
        {{--                if (data.teacher) {--}}
        {{--                    $('#teacher').html('Por: ' + data.teacher.name);--}}
        {{--                } else {--}}
        {{--                    $('#teacher').html('Instructor por asignar');--}}
        {{--                }--}}
        {{--                $('#startDate').val(data.lesson.start);--}}
        {{--                $('#precio').val(data.lesson.price);--}}
        {{--                $('#lessonDescription').html(data.lesson.description);--}}
        {{--                $('#imagenLesson').attr('src', data.img);--}}
        {{--                // if(!data.teacher.email_verified_at){--}}
        {{--                //         $('#verify').css('display', 'none')--}}
        {{--                // }--}}

        {{--                $('#btn-next').on('click', () => {--}}
        {{--                    console.log(data)--}}
        {{--                    if (!data.hasLesson) {--}}
        {{--                        let route = '{{route("public.payment.checkout" , ":id")}}'--}}
        {{--                        let url = route.replace(':id', data.lesson.id)--}}

        {{--                        window.location.href = url + '?isCourse=lessons';--}}
        {{--                    } else {--}}
        {{--                        let route = '{{route("public.streaming.stream.show" , ":id")}}'--}}
        {{--                        let url = route.replace(':id', data.lesson.slug)--}}
        {{--                        window.location.href = url;--}}

        {{--                    }--}}

        {{--                })--}}
        {{--            });--}}
        {{--        }--}}
        {{--    });--}}
        {{--    calendar.render();--}}
        {{--});--}}
    </script>
@endsection
