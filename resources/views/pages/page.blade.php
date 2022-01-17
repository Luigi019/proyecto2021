@extends('layouts.app')

@section('title', '{{$page->page}}')

@section('header')

    <div class="mt-4"></div>
    <div class="mt-4"></div>
    <div class="mt-4"></div>
    <div class="mt-4"></div>

@endsection

@section('css')

@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{$page->titlePage}}</h4>
        <p class="card-text mt-4">{{$page->description}}</p>
    </div>
</div>



  @endsection