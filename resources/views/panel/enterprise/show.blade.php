@extends('layouts.app')
@extends('panel.layouts.master')
@section('title', 'Show Enterprise' )

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar empresa que aplica</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.enterprises.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $enterprise->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $enterprise->description }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <img src="{{asset($enterprise->getFile("enterprise" , "first"))}}" class="img-responsive w-100" alt="{{$enterprise->name}}" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
