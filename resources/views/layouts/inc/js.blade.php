<script src="{{asset('js/app.js')}}"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>-->
{{--    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>--}}
{{--    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>--}}
{{-- Slick-Slider --}}

{{-- FontAwesome --}}
{{--    <script src="https://kit.fontawesome.com/1b8df5c909.js" crossorigin="anonymous"></script>--}}
{{--FullCalendar CDN--}}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/locales-all.min.js"></script>
{{--Chosen-select --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
{{--    <script src="https://unpkg.com/axios@0.21.1/dist/axios.min.js"></script>--}}
{{--DataTables--}}
{{--    <script src='https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js'></script>--}}
{{--    <script src='https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js'></script>--}}
{{-- custom --}}
    <script src="{{ asset('js/scripts.js') }}"></script>
    @yield("js")
