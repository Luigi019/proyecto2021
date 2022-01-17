<style>
    .menumobile{
        display: none;
    }
    
    @media(max-width:767px){
        .bigmenu{
            display: none !important;
        }

        .menumobile{
        display: block;
    }
    }
</style>
<nav class="navbar smart-scroll navbar-expand-md navbar-dark border-bottom border-danger"
     style="background:#000413; min-width: 100%;">

    {{-- <div class="d-flex py-3"> --}}
    <a class="navbar-brand" href="{{route('public.home.page')}}">
        <img src="{{ asset('img/logo-blanco.png') }}" alt="xtromba" width="120" height="34">
    </a>

    <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" style="z-index: 15;">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">

        {{--  <div class="offcanvas-header mt-3 ml-5 px-5">

          <img class="ml-3" src="{{ asset('img/logo-blanco.png') }}" alt="xtromba" width="120" height="34">
        </div>  --}}

        <ul id="web-nav" class="navbar-nav py-3">
            <li class="nav-item align-self-left mr-3">
                <a class="nav-link text-white" href="{{route('public.home.page')}}">
                    <i class="fa fa-home"></i>     Inicio
                    {{-- <span class="sr-only">(current)</span> --}}
                </a>
            </li>
            <li class="nav-item align-self-left mr-3">
                <a class="nav-link text-white" href="{{route('public.courses.index')}}">
                    <i class="fa fa-graduation-cap"></i>     Formaciones
                </a>
            </li>
            <li class="nav-item align-self-left mr-3 d-none">
                <a class="nav-link text-white" href="{{route('public.lessons.index')}}">
                    <i class="fa fa-graduation-cap"></i>     Clases
                </a>
            </li>
            <li class="nav-item align-self-left mr-3">
                <a class="nav-link text-white" href="{{route('public.experience.index')}}">
                    <i class="fa fa-graduation-cap"></i>     Experiences
                </a>
            </li>
            <li class="nav-item align-self-left mr-3 d-none">
                <a class="nav-link text-white" href="{{route('public.teacher.index')}}">
                    <i class="fa fa-user"></i>     Instructores
                </a>
            </li>
            @auth
            <li class="nav-item align-self-left mr-3 menumobile">
                <a class="nav-link text-white" href="{{route('public.user.index' , [Auth::user()])}}">
                    <i class="fa fa-user"></i>     Perfil
                </a>
            </li>
            <li class="nav-item align-self-left mr-3 menumobile">
                <a class="nav-link text-white" href="{{route('panel.home')}}">
                    <i class="fa fa-calendar"></i>     Dashboard
                </a>
            </li>
            <li class="nav-item align-self-left mr-3 menumobile">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="nav-link text-white dropdown-item" href="#"><i class="fa fa-sign-out"></i>     Salir</button>
                </form>
            </li>
            @endauth
        </ul>
        <ul class="navbar-nav ml-auto py-3 pr-5">
            <li class="nav-item align-self-left mr-2 d-none">
                <a class="nav-link text-white py-0" href="#" id="btn-cart" role="button">
                    <h3 class="mb-0"><i class="fa fa-shopping-cart"></i></h3>
                </a>
            </li>
            @auth
                <li class="nav-item align-self-left mr-0 d-none">
                    <a class="nav-link text-white py-0" href="#" id="btn-chat" role="button">
                        <h3 class="mb-0"><i class="fa fa-comment"></i></h3>
                    </a>
                </li>
                <li class="nav-item align-self-left mr-4 d-none">
                    <a class="nav-link text-white p-0 btn-notification" href="#" id="btn-notification" role="button">
                        <div class="notification"></div>
                    </a>
                </li>
            @endauth
            <li class="nav-item dropdown align-self-left bigmenu">
                <a class="nav-link dropdown-toggle p-0 btn-block" href="#" id="dd-user" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="row">
                        @auth
                            <img class="mr-3 rounded-circle" src="https://picsum.photos/300/300" alt="" width="40"
                                 height="40">
                            <div class="lh-100">
                                <small class="text-white">¡Hola!</small>
                                <h6 class="mb-0 text-white lh-100">{!! Str::limit(Auth::user()->name,10) !!}</h6>
                                @elseguest
                                    <div class="lh-100">
                                        <small>
                                            <a href="{{route('login')}}"
                                               class="btn-secondary btn rounded-5 ml-4">Login</a>
                                        </small>
                                    </div>
                                @endauth
                            </div>
                    </div>
                </a>
                @auth
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user">
                        <a class="dropdown-item" href="{{route('public.user.index' , [Auth::user()])}}">Perfil</a>
                        @can('admin.home')
                            <a class="dropdown-item" href="{{route('panel.home')}}">Dashboard</a>
                        @endcan
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item" href="#">Salir</button>
                        </form>
                    </div>
                @endauth

            </li>
        </ul>
    </div>
    {{-- </div> --}}
</nav>
