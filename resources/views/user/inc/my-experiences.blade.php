@extends('user.inc.layoutProfile')

@section('mainProfile')

    <div class="row mb-5">
        @include('courses.inc.courses' , ['collects' =>$user->products('Course')->get(), 'var'=>'col-md-3 mb-4' ,
                 'modal'=>false , 'type'=>'course'])
    </div>

    @endsection
