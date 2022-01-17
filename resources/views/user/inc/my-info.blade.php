@extends('user.profile')
<div class="row mt-5">
    <div class="col-md-12">
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
                                <a target="_blank" href="{{$user->facebook}}"><i class="fa fa-facebook text-danger"></i>&nbsp;&nbsp;{{ $user->facebook }}</a>
                            </div>
                        @endif

                        @if ($user->phone)
                            <div class="col-md-12 mb-2">
                                <a target="_blank" href="{{$user->instagram}}"><i class="fa fa-instagram text-danger"></i>&nbsp;&nbsp;{{ $user->instagram }}</a>
                            </div>
                        @endif

                        @if ($user->phone)
                            <div class="col-md-12 mb-2">
                                <a target="_blank" href="{{$user->twitter}}"><i class="fa fa-twitter text-danger"></i>&nbsp;&nbsp;{{ $user->twitter }}</a>
                            </div>
                        @endif
                    </div>
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

                        {{-- <div class="col-12 col-md-6 mb-4">
                            <div class="tab-pane" id="calendar2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="text-center"><img class="logoIcon"
                                                                     src="{{ asset('img/logo1.png') }}">&nbsp;Pr&oacute;ximas
                                            clases</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container">
                                        <div id="classCalendar2"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
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
                                    <div class="{{ Auth::check() ? (Auth::user()->roles('ADMINISTRADOR|PROFESOR') ? 'pl-3' : 'col-md-12') : 'col-md-12' }}"
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