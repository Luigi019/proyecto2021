@extends($layout)

@section('title' ,$page['titlePage'])

@section('content_header')

    <h1>
        @if(isset($page['headerTitle']))
            {{ $page['headerTitle'] }}

        @endif
    </h1>

    @isset($datatable['route'])
        @isset($datatable['route']['createData'])
            <a class='btn btn-outline-primary mb-2 mt-3' href='{{route($datatable['route']['createData'])}}'>Crear
                nuevo {{$page['createText']}}</a>
        @endisset
    @endisset


@endsection
@section('container')
    @if(isset($html))
        <div class='table-responsive'>
            {!! $html->table(['class' => 'table table-bordered'], true) !!}
        </div>
    @endif

@endsection

@section('after.jquery')
    {{--    @if(isset($datatable))--}}
    {!! $html->scripts() !!}
    {{--    @endif--}}
@endsection

@section('scripts')
    @if(isset($datatable))

        <script>


            window.addEventListener('DOMContentLoaded', event => {

                @isset($datatable['route']['deleteData'])
                $(document).on('click', '#delete', function () {
                    let id = $(this).attr('data-id')
                    if (confirm('estas seguro de querer eliminar este registro?, se eliminara permanentenmente del sistema.')) {
                        $.ajax({
                            "url": '{{ route($datatable['route']['deleteData']) }}',
                            "data": {'id': id, 'model': '{{$model}}'},
                            success: function (data) {
                                console.log(data)
                                $('#dataTableBuilder').DataTable().ajax.reload();
                            },

                        });
                    }
                })
                @endisset
                @isset($datatable['route']['editData'])
                $(document).on('click', '#edit', function () {
                    let id = $(this).attr('data-id')

                    // window.location = '/admin/{{ $datatable['route']['editData'] }}/'+id+'/edit';

                    $.ajax({
                        "url": '{{ route('edit.resource') }}',
                        "data": {'id': id, 'route': '{{ $datatable['route']['editData'] }}', 'model': "{{$model}}"},
                        success: function (data) {
                            console.log(data)
                            window.location = data;
                        }
                    });


                });
                @endisset
            });
        </script>

    @endif

@endsection
