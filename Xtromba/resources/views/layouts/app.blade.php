<!DOCTYPE html>
<html lang="es">

<head>
    <script src="https://kit.fontawesome.com/1b8df5c909.js" crossorigin="anonymous"></script>

    @include('layouts.inc.meta')
    <title>XTROMBA | @yield('title')</title>

    @include('layouts.inc.css')
  @livewireStyles
</head>

<body >
    <div id="preloader"></div>

    <header>
        @include('layouts.inc.navbar')

        @yield('header')
    </header>

   <main style=" flex-grow: 1!important;">
       @if(flash()->message)
           <div class='alert alert-{{ flash()->class }} p-3 mt-3'>
               {{ flash()->message }}
           </div>
   @endif
       <!-- Content section-->
        <div>
        {{--  original class = container  px-md-3 py-0  --}}
            <div class="container-fluid col-md-10  px-md-3 py-0 ">
              @yield('content')
            </div>
        </div>
   </main>

    <!-- Footer-->
    @include('layouts.inc.footer')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    @include('layouts.inc.js')
    @livewireScripts

</body>

</html>
