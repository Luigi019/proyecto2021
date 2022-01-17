@extends('user.inc.layoutProfile')


@section('mainProfile')
    <div class="row">
        <div class="col-md-4 mb-3">
            <div media="slider" class="imageGallery">
                <img class="thumb" src="{{ asset('img/user.jpg') }}">
                <img class="thumb" src="{{ asset('img/anitta-funk.webp') }}">
                <img class="thumb" src="{{ asset('img/cantantes-de-reggaeton.jpg') }}">
                <img class="thumb" src="{{ asset('img/indian-hits.webp') }}">
                <img class="thumb" src="{{ asset('img/black-hits.jpeg') }}">
                <img class="thumb" src="{{ asset('img/african-hits.jpeg') }}">
            </div>
        </div>
        <div class="col-md-8 pl-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-danger text-uppercase"><img class="logoIcon"
                                                                src="{{ asset('img/logo1.png') }}">&nbsp;Perfil
                    </h4>
                </div>
                <div class="row mt-3 justify-content-center pl-3">
                    <div class="col-md-12">
                        <p>{{ $user->description }}</p>
                    </div>

                    {{-- <div class="col-md-12">
                        <p>{{$user->phone}}</p>
                    </div> --}}
                </div>
                <div class="col-md-12">
                    <h4 class="text-danger text-uppercase"><img class="logoIcon"
                                                                src="{{ asset('img/logo1.png') }}">&nbsp;Contacto
                    </h4>
                </div>
                <div class="row mt-3 justify-content-center pl-3">
                    <div class="col-md-12">
                        <p><i class="fas fa-envelope text-danger"></i>&nbsp;&nbsp;{{ $user->email }}</p>
                    </div>

                    @if ($user->phone)
                        <div class="col-md-12">
                            <p><i class="fas fa-mobile text-danger"></i>&nbsp;&nbsp;{{ $user->phone }}</p>
                        </div>
                    @endif

                    @if ($user->phone)
                        <div class="col-md-12 mb-2">
                            <a target="_blank" href="{{$user->facebook}}"><i
                                    class="fa fa-facebook text-danger"></i>&nbsp;&nbsp;{{ $user->facebook }}
                            </a>
                        </div>
                    @endif

                    @if ($user->phone)
                        <div class="col-md-12 mb-2">
                            <a target="_blank" href="{{$user->instagram}}"><i
                                    class="fa fa-instagram text-danger"></i>&nbsp;&nbsp;{{ $user->instagram }}
                            </a>
                        </div>
                    @endif

                    @if ($user->phone)
                        <div class="col-md-12 mb-2">
                            <a target="_blank" href="{{$user->twitter}}"><i
                                    class="fa fa-twitter text-danger"></i>&nbsp;&nbsp;{{ $user->twitter }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="row">
                @auth

                    @role('ADMINISTRADOR|PROFESOR')
                    <div class="col-12 col-md-6 mb-4">
                        <div class="tab-pane" id="calendar">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="text-center"><img class="logoIcon"
                                                                 src="{{ asset('img/logo1.png') }}">&nbsp;Agendar
                                        clases</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="container">
                                    <div id="classCalendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endrole
                @endauth

                <div
                    class="col-12 {{ Auth::check() ? (Auth::user()->roles('ADMINISTRADOR|PROFESOR') ? 'col-md-6' : 'col-md-12') : 'col-md-12' }} mb-4">
                    <div class="tab-pane" id="calendar">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center"><img class="logoIcon"
                                                             src="{{ asset('img/logo1.png') }}">&nbsp;Pr&oacute;ximas
                                    clases</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div
                                    class="{{ Auth::check() ? (Auth::user()->roles('ADMINISTRADOR|PROFESOR') ? 'pl-3' : 'col-md-12') : 'col-md-12' }}"
                                    id="classCalendar2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4 style="text-align: center !important;"><img class="logoIcon"
                                                            src="{{ asset('img/logo1.png') }}">&nbsp;Mis
                Formaciones</h4>
        </div>
        <div class="col-md-12">
            <div class="slider mt-4">
                @include('courses.inc.courses' , ['collects' =>$user->products('Course')->get(), 'var'=>'ml-3' ,
                'modal'=>false , 'type'=>'course'])
            </div>
        </div>
    </div>

    <div class="row px-3 mt-md-5">
        <div class="col-12">
            <section class="container-fluid px-md-5 py-0">
                <section class="xperiences fullWidth mb-5 p-5">
                    <div class="row row-cols-1 d-flex justify-content-center align-items-center text-white">
                        <h4 class="text-danger text-uppercase"><img class="logoIcon"
                                                                    src="{{ asset('img/logo1.png') }}">&nbsp;XPeriences
                        </h4>
                        <p class="text-muted text-left mt-n2">No deje de progresar!</p>
                        <hr class="border-danger mt-n2">
                    </div>
                    <div
                        class="row mt-4 row-cols-1 row-cols-sm-2 row-cols-md-4 d-flex justify-content-center align-items-center h-100 card-deck">
                        @foreach ($user->products('Course')->get() as $xperience)
                            <div class="col mb-4">
                                <div class="card grow rounded shadyShadow bg-transparent border-white text-white"
                                     style="max-width: 540px;">
                                    <div class=" no-gutters">
                                        <div class="col-md col-15 scheduleImage"
                                             style="background-image:url('{{ asset(storage::get($xperience, 'photo', 'first')) }}');">
                                        </div>
                                        <div class="col-md-8 col-17">
                                            <div class="card-body">
                                                <h4 class="font-weight-bold">{{ $xperience->title }}</h4>
                                                <p class="card-text font-weight-lighter">
                                                    {{ Str::limit($xperience->description, 100) }}
                                                    .</p>
                                                <p class="card-text"><small class="text-muted"><i
                                                            class="far fa-user"></i>
                                                        &nbsp;{{ $xperience->teacher->name }}
                                                    </small></p>

                                                @auth()
                                                    <span class="btn btn-danger"><a
                                                            href="{{ route('public.courses.details', [
    'course' => $xperience,
    'lesson' => $xperience->lessons->first(),
]) }}">Ver
                                                                ahora </a> </span>

                                                @elseauth(

                                                )
                                                @endauth

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col mt-5">
                            <div
                                class="card grow rounded shadyShadow bg-bloody border-white text-white d-flex align-items-center justify-content-center"
                                style="max-width: 540px;">
                                <div class="lockIcon"><i class="fas fa-plus-circle"></i></div>
                                <span class="btn btn-danger mt-3"><a
                                        href="{{ route('public.courses.index') }}">AÑADIR</a></span>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
        @if(Auth::id() !== $user->id)
            @include('contactsForms.studentContactForm')
        @endif
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="lessonModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
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
                    <form method='post' id="formPersonalLesson" class="form-responsive form-lesson"
                          action="{{ route('public.lesson.storeinstructorlesson') }}">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            {{-- <label for="ID">ID</label> --}}
                            <input type="hidden" class="form-control" name="id" id="id" placeholder="" readonly>
                            {{-- <small class="form-text text-muted">Help text</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="title">Titulo de la clase: </label>
                            <input type="text" class="form-control" name="title" id="title"
                                   value="{{ $lesson->title }}">
                            <small>Ejemplo: Clase profesional de Flamenco</small>
                        </div>
                        <div class="form-group">
                            <label for="Descripcion">Descripción: </label>
                            <textarea class="form-control form-control-lg" name="description" id="description" cols="1"
                                      rows="3">{{ $lesson->description }}</textarea>
                            <small>Ejemplo: Bailes al estilo natural y clásico</small>
                        </div>
                        <div class="form-group">
                            <label class="mt-3 mb-3">Preferencia:</label>
                            <select name="preference_id" id="preference_id" class="form-control" required>
                                <option value="1">Online</option>
                                <option value="2">Presencial</option>
                            </select>
                        </div>

                        <div class="form-group" id="city">
                            <label class="mt-3 mb-3">Ciudad:</label>

                            <select name="city_id" id="city_id" class="form-control" required>
                                {{-- @if (isset($course->city_id))
                                    <option selected value='{{ $course->city_id }}'>{{$course->cities->name}}</option>
                                @endif --}}
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
                            <label class="mt-3 mb-3">Imagen:</label>
                            <input type="file" class="form-control" name="photo" id="photo">
                        </div>

                        @if (!request('course') || request('lesson'))
                            <div class="form-group">
                                <label for="Precio">Precio: </label>
                                <input type="text" class="form-control" name="price" id="price"
                                       value="{{ $lesson->price }}">
                                <small>Ejemplo: 50.00</small>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="start_at">Start</label>
                            <input type="date" class="form-control" name="start" id="start" aria-describedby="start">
                            <small id="start_ats" class="form-text text-muted"></small>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success" id="btnSave">Guardar
                            </button>
                            <button type="button" class="btn btn-outline-warning" id="btnEdit" name="btnEdit">Modificar
                            </button>
                            <button type="button" class="btn btn-outline-danger" id="btnDelete" name="btnDelete">
                                Eliminar
                            </button>
                            <button type="button" class="btn btn-outline-primary" id="btnShow" name="btnDelete">Ver
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
