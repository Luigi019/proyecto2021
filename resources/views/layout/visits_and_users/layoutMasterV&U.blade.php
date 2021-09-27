<!doctype html>
    <html class="no-js" lang="es">

    <head>
        <title> @yield("title")  </title>
        @include('layout.visits_and_users.inc.linksV&U_meta')
        @include('layout.visits_and_users.inc.linksV&U_css')
    </head>
    <body id="page-top">
  
        @yield("content")


        @include('layout.visits_and_users.inc.linksV&U_js')

    </body>
    </html>
