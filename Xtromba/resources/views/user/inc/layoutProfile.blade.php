@extends('layouts.app')

@section('title', 'Mi Cuenta')

@section('css')
    <link rel="stylesheet" href=" {{ asset('vendor/jsgallery/jsgallery.css') }} ">
    <style>
        .userBanner {
            width: 100%;
            height: 35vh;
            background-image: url("{{ asset('img/african-hits.jpeg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .userImage {
            max-height: 100px;
        }

        .userImage img {
            height: 200px;
            width: 200px;
            transform: translate(0%, -50%);
        }

        .logoIcon {
            display: inline;
            height: 1em;
        }

        .imageGallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, 1fr);
            grid-column-gap: 10px;
            grid-row-gap: 10px;
        }

        .imageGallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        #calendar .container {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .list-wrapper {
            position: relative;
        }

        .list-item-wrapper {
            margin-top: 10px;
            position: relative;
        }

        .list-bullet {
            float: left;
            margin-right: 10px;
            background: var(--bloodyRed);
            height: 16px;
            width: 16px;
            line-height: 16px;
            border-radius: 50%;
            font-weight: 300;
            font-size: 0.7em;
            color: white;
            text-align: center;
        }

        .list-item {
            display: table-row;
            vertical-align: middle;
        }

        .list-title {
            font-weight: 200;
            font-size: 0.8em;
        }

        .list-text {
            font-weight: 400;
        }

        .red-line {
            background: var(--bloodyRed);
            z-index: -1;
            width: 2px;
            height: 100%;
            position: absolute;
            left: 7px;
        }

        #nav-lan {}

    </style>
@endsection

@section('content')

    <div class="container-fluid m-0 p-0">
        <div class="row">
            <div class="col">
                <div class="userBanner">
                </div>
            </div>
        </div>
        <div class="row pr-0 pr-md-2">
            <div class="col-12 col-md-3 d-flex justify-content-center userImage pr-0">
                <img class="rounded-circle" src="{{ asset('img/user.jpg') }}">
            </div>
            <div class="col-12 col-md-6 text-center text-md-left mt-3 px-4">
                <h3 class="mb-n1 text-uppercase">
                    {{ $user->name }}
                </h3>
                <span class="text-muted">{{ $user->description }}</span>
                <form>
                    @csrf
                    <i class="fa fa-star" data-index="1"></i>
                    <i class="fa fa-star" data-index="2"></i>
                    <i class="fa fa-star" data-index="3"></i>
                    <i class="fa fa-star" data-index="4"></i>
                    <i class="fa fa-star" data-index="5"></i>
                </form>
                <p id="mensajeVoto" class="text-success"></p>
                <span class="ml-2">

                </span>
                @if (Auth::check() && $user->id === Auth::id())
                    <div class="mt-2 row  align-items-center justify-content-center mt-4" id="nav-lan">

                        @if (!request()->routeIs('public.user.myExperiences', $user))
                            <a class="btn border-1 border-dark" href="{{ route('public.user.myExperiences', $user) }}"><i
                                    class="fas fa-dollar-sign mr-3"></i>Mis Experiences</a>
                        @endif
                        @if (!request()->routeIs('public.user.myCourses', $user))
                            <a class="btn border-1 border-dark" href="{{ route('public.user.myCourses', $user) }}"> <i
                                    class="fas fa-book mr-3"></i>Mis Formaciones</a>
                        @endif
                        @if (!request()->routeIs('public.user.myTransactions', $user))
                            <a class="btn border-1 border-dark" href="{{ route('public.user.myTransactions', $user) }}"><i
                                    class="fas fa-dollar-sign mr-3"></i>Mis Transacciones</a>
                        @endif

                        @if (!request()->routeIs('public.user.index'))
                            <a class="btn border-1 border-dark" href="{{ route('public.user.index', $user) }}"><i
                                    class="fas fa-home mr-3"></i>Perfil home</a>
                        @endif
                    </div>
                @endif
            </div>
            <div
                class="col-12 col-md-3 d-flex justify-content-center justify-content-md-end align-items-center pr-md-4 mt-4 mb-3 my-md-0">
                <div class="btn-group" role="group" aria-label="Basic example">
                    @if (Auth::id() === $user->id)
                        <button id="btnConfig" class="btn btn-light text-danger">&nbsp;<i class="fas fa-cog red"></i>
                    @endif
                    </button>
                    <button class="btn  btn-danger">&nbsp;<i class="fas fa-comment"></i> Mensajes</button>
                </div>

                <!-- Modal de configuracion-->
                @if (Auth::id() === $user->id)
                    <div class="modal fade" id="configModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4><img class="logoIcon" src="{{ asset('img/logo1.png') }}">&nbsp;Clases</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method='post' id="formPersonalConfig" class="form-responsive form-lesson"
                                        action="{{ route('public.profile.update', $user) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">Nombre del usuario: </label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ $user->name }}">
                                            <small>Ejemplo: Pedro Garcia</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="Descripcion">Descripción: </label>
                                            <textarea class="form-control form-control-lg" name="description"
                                                id="description2" cols="1" rows="3">{{ $user->description }}</textarea>
                                            <small>Ejemplo: Bailarin profesional de salsa</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Correo: </label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="{{ $user->email }}">
                                            <small>Ejemplo: pedrogarcia@xtromba.com</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Teléfono: </label>
                                            <input type="phone" class="form-control" name="phone" id="phone"
                                                value="{{ $user->phone }}">
                                            <small>Ejemplo: +36 123 45 67 89</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="facebook">Facebook: </label>
                                            <input type="facebook" class="form-control" name="facebook" id="facebook"
                                                value="{{ $user->facebook }}">
                                            <small>Ejemplo: www.facebook.com/pedrogarcia</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="instagram">Instagram: </label>
                                            <input type="instagram" class="form-control" name="instagram" id="instagram"
                                                value="{{ $user->instagram }}">
                                            <small>Ejemplo: www.instagram.com/pedrogarcia</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="twitter">Twitter: </label>
                                            <input type="twitter" class="form-control" name="twitter" id="twitter"
                                                value="{{ $user->twitter }}">
                                            <small>Ejemplo: www.twitter.com/pedrogarcia</small>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-warning"
                                                id="btnEditConfig">Modificar
                                            </button>
                                        </div>
                                    </form>
                                    <form action="{{ route('public.profile.update', $user) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="password">Clave: </label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                value="">
                                            <small>Ejemplo: utilizar mayusculas, numeros y caracteres especiales</small>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-danger" id="btnChangePw">
                                                Actualizar
                                                password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">

                @yield('mainProfile')

            </div>


            <style>
                .slick-track {
                    float: left !important;
                }

            </style>
        @endsection
        @section('js')
        
          @include('layouts.inc.votes' , [
              'voteType'=>'User',
              'object'=> $user
          ])

            <script src="{{ asset('vendor/jsgallery/jquery.jsgallery.min.js') }}"></script>
            <script>
                 

                document.addEventListener('DOMContentLoaded', function() {

                    // Para el plugin de selector multiple

                    $('#btnConfig').on('click', function() {
                        alert('prueba');
                        $('#configModal').modal('show');
                        //$('#btnSave')
                    });
                    // var calendarEl = document.getElementById('classCalendar');
                    // var calendar = new FullCalendar.Calendar(calendarEl, {
                    //     initialView: 'dayGridMonth',
                    //     locale: 'es',
                    //     events: '{{ route('public.lesson.lessonbyuser') }}',
                    //     dateClick: function() {
                    //         let formData = document.getElementById('formPersonalLesson');
                    //         formData.reset();
                    //         $("#lessonModal").modal("show");
                    //         showFieldByPreference();
                    //         $('#description').val('');
                    //         $('#city_id').val('0');
                    //         $('#preference_id').val('1');
                    //         $('#id').val('');
                    //         $('#btnSave').css('display', 'block');
                    //         $('#btnDelete').css('display', 'none');
                    //         $('#btnEdit').css('display', 'none');
                    //         $('#btnShow').css('display', 'none');
                    //     },
                    //     eventClick: function(info) {
                    //         $('#btnDelete').css('display', 'block');
                    //         $('#btnEdit').css('display', 'block');
                    //         $('#btnSave').css('display', 'none');
                    //         $('#btnShow').css('display', 'none');
                    //         $('#lessonModal').modal('show');
                    //         $('#title').val(info.event.title);
                    //         let id = info.event.id;
                    //         $('#id').val(id);
                    //         $.get('/lessons/' + id, function(data) {
                    //             console.log(data);
                    //             $('#price').val(data.lesson.price);
                    //             $('#description').val(data.lesson.description);
                    //             $('#city_id').val(data.lesson.city_id);
                    //             if (data.lesson.online == '0') {
                    //                 $('#frameYT').hide();
                    //                 $('#preference_id').val('2');
                    //                 $('#preference_id').on('change', function(e) {
                    //                     let preference = $('#preference_id option:selected')
                    //                         .attr('value');
                    //                     if (preference == 1) {
                    //                         $('#frameYT').show(500);
                    //                         $('#city').hide(500);
                    //                         $('#city_id').val('0');
                    //                     } else {
                    //                         $('#frameYT').hide(500);
                    //                         $('#city').show(500);
                    //                         $('#iframeYT').val('');

                    //                     }
                    //                 });
                    //             } else {
                    //                 showFieldByPreference();
                    //                 $('#preference_id').val('1');
                    //                 $
                    //             }
                    //         });
                    //     }
                    // });

                    // var calendarEl2 = document.getElementById('classCalendar2');
                    // var calendar2 = new FullCalendar.Calendar(calendarEl2, {
                    //     initialView: 'dayGridMonth',
                    //     locale: 'es',
                    //     events: '{{ route('public.lesson.lessonpurchased') }}',guardado
                    //         $('#btnSave').css('display', 'none');
                    //         $('#btnDelete').css('display', 'none');
                    //         $('#btnEdit').css('display', 'none');
                    //         $('#lessonModal').modal('show');
                    //         $('#btnShow').css('display', 'block');
                    //         $('#title').val(info.event.title);
                    //         let id = info.event.id;
                    //         $('#id').val(id);
                    //         $.get('/lessons/' + id, function(data) {
                    //             console.log(data);
                    //             showFieldByPreference();
                    //             $('#price').val(data.lesson.price);
                    //             $('#description').val(data.lesson.description);
                    //             $('#city_id').val(data.lesson.city_id);
                    //             $('#title').attr('readonly', 'true');
                    //             $('#description').attr('readonly', 'true');
                    //             $('#price').attr('readonly', 'true');
                    //             $('#preference_id').attr('readonly', 'true');
                    //             $('#start').attr('readonly', 'true');
                    //             $('#iframeYT').attr('readonly', 'true');
                    //             $('#city_id').attr('readonly', 'true');
                    //             $('#btnShow').on('click', function() {
                    //                 let stream =
                    //                     '{{ route('public.streaming.stream.show') }}'
                    //                 window.location.href = stream + '/' + data.lesson.slug

                    //             })

                    //         });
                    //     });
                       
                    $('#btnEdit').on('click', function() {
                        var formData = $('.form-lesson').serialize();
                        axios.post('{{ route('public.mylessons.edit') }}', formData)
                            .then(response => {
                                calendar.refetchEvents();
                                console.log(response)
                                $('#lessonModal').modal('hide');
                            })
                            .catch(err => {
                                console.log(err)
                            })
                    });

                    $('#btnDelete').on('click', function() {
                        var formData = $('.form-lesson').serialize();
                        axios.post('{{ route('public.mylessons.delete') }}', formData)
                            .then(response => {
                                $('#lessonModal').modal('hide');
                                calendar.refetchEvents();
                                console.log(response)
                            })
                            .catch(err => {
                                console.log(err)
                            })
                    });


                    @role('ADMINISTRADOR|PROFESOR')
                        calendar.render();
                    @endrole
                        calendar2.render();
                    /* Light Gallery init */
                    $("body").jsgallery({
                        // options here
                    });

                    //slider

                    //$('.slider').attr('dir', 'rtl');

                    $('.slider').slick({
                        infinite: true,
                        speed: 300,
                        centerMode: true,
                        autoplay: true,
                        slide: '.slick-slider',
                        arrows: true,
                        slidesToShow: 4,
                        slidesToScroll: -1,
                        rtl: false,
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1,
                                    infinite: true,
                                    rtl: false,
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

                });


                function showFieldByPreference() {
                    $('#city').hide();
                    $('#preference_id').on('change', function(e) {
                        let preference = $('#preference_id option:selected').attr('value');
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
                }

                
            </script>
        @endsection
