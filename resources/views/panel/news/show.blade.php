@extends('layouts.app')
@extends('panel.layouts.master')
@section('title',' Show News')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Noticia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.news.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $news->title }}
                        </div>
                        <div class="form-group">
                            <strong>Contenido:</strong>
                            {!! $news->body !!}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <img src="{{asset($news->getFile("new" , "first"))}}" class="img-responsive w-100" alt="{{$news->title}}" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
