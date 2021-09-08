<link rel="manifest" href="{{ asset ('site.webmanifest') }}">
<link rel="shortcut icon" href= "{{ asset ('img/favicon.ico') }}" >
<!-- Place favicon.ico in the root directory -->

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> --}}
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<!-- SimpleLightbox plugin CSS-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)--> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-material-design.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/noticias.css') }}">
<link rel="stylesheet" href="{{ asset('css/Post-Template.css') }}">

  @yield("css")
