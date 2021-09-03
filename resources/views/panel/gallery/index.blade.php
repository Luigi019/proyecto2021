@extends('layouts.app')
@extends('panel.layouts.master')
@section('title',' Gallery ')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div  class="div-panel-justify">

                            <span id="card_title">
                                {{ __('Galeria') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                       <th>ID</th>
                                        
                                        <th>Nombre</th>
                                        <th>Descripción</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $gallery)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $gallery->name }}</td>
											<td>{{ $gallery->description }}</td>

                                            <td>
                                                <form action="{{ route('admin.galleries.destroy',$gallery->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.galleries.show',$gallery->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.galleries.edit',$gallery->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $galleries->links() !!}
            </div>
        </div>
    </div>
@endsection
