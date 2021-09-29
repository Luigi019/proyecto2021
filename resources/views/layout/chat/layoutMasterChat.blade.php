<!doctype html>
    <html class="no-js" lang="es">

    <head>
        <title> @yield("title")  </title>
        @include('layout.chat.inc.linksChat_meta')
        @include('layout.chat.inc.linksChat_css')
    </head>
    <body id="page-top">
  
        @yield("content")


        @include('layout.chat.inc.linksChat_js')

    </body>
    </html>
