@extends('layouts.app')
@extends('panel.layouts.master')
@section('title',' Show Gallery ')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Imagen</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.galleries.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $gallery->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $gallery->description }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <img src="{{asset($gallery->getFile("gallery" , "first"))}}" class="img-responsive w-100" alt="{{$gallery->name}}" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
