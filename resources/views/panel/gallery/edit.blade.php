@extends('layouts.app')
@extends('panel.layouts.master')
@section('title',' Update Gallery ')


@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar las imagenes de la Galería</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.galleries.update', $gallery->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('panel.gallery.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
