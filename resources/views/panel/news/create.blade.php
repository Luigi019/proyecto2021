@extends('layouts.app')
@extends('panel.layouts.master')
@section('title','  Create News ')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Noticia</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.news.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('panel.news.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
