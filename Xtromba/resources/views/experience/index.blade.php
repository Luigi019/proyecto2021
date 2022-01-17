@extends('layouts.app')

@section('title', 'Formaciones disponibles')

@section('header')

@include('layouts.inc.jumbotron') 

@endsection

@section('content')

    <section class="mt-3">
        <div class="row mb-5">
            <div class="col-md-8">
                <h2 class="text-capitalize text-roboto font-weight-bolder">
                    <img src="{{asset('img/logo1.png')}}" alt="XTROMBA" height="40" width="40">
                    <strong>Videos</strong>
                </h2>
            </div>
            @include('courses.inc.input-search')
        </div>
        <div class='courses'>
            <div class="row">
                @livewire('list-courses', ['data' => $experience, 'var' => 'row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5' ,'modal'=> false, 'type' =>'course'])

            </div>
        </div>
    </section>

@endsection
