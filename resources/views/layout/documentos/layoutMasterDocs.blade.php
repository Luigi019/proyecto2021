<!doctype html>
    <html class="no-js" lang="es">

    <head>
        <title> @yield("title")  </title>
        @include('layout.documentos.inc.linksDocs_meta')
        @include('layout.documentos.inc.linksDocs_css')
    </head>
    <body id="page-top">
  
        @yield("content")


        @include('layout.documentos.inc.linksDocs_js')

    </body>
    </html>
