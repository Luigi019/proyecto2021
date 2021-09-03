@extends('layouts.app')
@extends('panel.layouts.master')
@section('title','  Create Gallery ')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear imagenes de la Galería</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.galleries.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('panel.gallery.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
