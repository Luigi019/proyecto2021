@extends("layouts.app")

@section('title', 'Detalle de la formación')

@section('css')
@endsection
@section('content')

    @include('courses.inc.detailsContent' , ['data'=>$course , 'isCourse' => true])

@endsection
@section('js')

@endsection
