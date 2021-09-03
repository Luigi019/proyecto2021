@extends('layouts.app')
@extends('panel.layouts.master')
@section('title','Show Company')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Empresa con sello INMOBILIARIA</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.companies.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $company->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $company->description }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <img src="{{asset($company->getFile("company" , "first"))}}" class="img-responsive w-100" alt="{{$company->name}}" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
