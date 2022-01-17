@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" type="text/css" href=""/>
    @livewireStyles
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <link rel="stylesheet" type="text/css" href='https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css'/>--}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

{{--    <link rel="stylesheet" type="text/css" href='https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css'/>--}}

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css">--}}
    @yield('customCss')
@endsection

@section('title')


@if(isset($page['titlePage']))
{{$page['titlePage']}}
@else
@yield('title')
@endif
@endsection

@section('content_header')

   <h1>
       @if(isset($page['headerTitle']))
       {{ $page['headerTitle'] }}
@else
@yield('header_title')
@endif
</h1>

    @if(flash()->message)
    <div class='alert alert-{{ flash()->class }} p-3 mt-3'>
        {{ flash()->message }}
        </div>
    @endif

@stop

@section('content')

@yield('container')
{{--
@if(isset($html))
 {!! $html->table(['class' => 'table table-bordered'], true) !!}
@endif --}}
@endsection


@section('js')

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/app.js')}}"></script>
{{--        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>--}}
        @yield('after.jquery')
{{--        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>--}}
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
{{--        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>--}}

    {{-- Datatables --}}
{{--        <script src='https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js'></script>--}}
{{--        <script src='https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js'></script>--}}

    {{-- Fileinput --}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/js/fileinput.js"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/themes/fa/theme.min.js"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>--}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> --}}

    {{-- FontAwesome --}}
{{--        <script src="https://kit.fontawesome.com/1b8df5c909.js" crossorigin="anonymous"></script>--}}

    <script src="https://cdn.jsdelivr.net/npm/tinymce@5.9.2/tinymce.min.js"></script>
    <script>
    window.addEventListener('DOMContentLoaded' , () => {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    })
    </script>
    <script>
        tinymce.init({
            language: 'es',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',

            selector: 'textarea'
        });
      </script>
    @yield('scripts')


@endsection
