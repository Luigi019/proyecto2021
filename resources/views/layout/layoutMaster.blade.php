<!doctype html>
    <html class="no-js" lang="en">

    <head>
        <title> @yield("title")  </title>
        @include('layout.inc.linksMeta')
        @include('layout.inc.linksCss')
    </head>
    <body id="page-top">
  
        @yield("content")


        @include('layout.inc.linksJs')

    </body>
    </html>
