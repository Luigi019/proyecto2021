@extends('layouts.app')
@extends('panel.layouts.master')
@section('title','News  ')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div  class="div-panel-justify">

                            <span id="card_title">
                                {{ __('Noticias') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
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
                                        <th>No</th>
                                        
										<th>Titulo</th>
										<th>Contenido</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $news)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $news->title }}</td>
											<td>{!! Str::limit($news->body,80) !!}</td>

                                            <td>
                                                <form action="{{ route('admin.news.destroy',$news->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.news.show',$news->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.news.edit',$news->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {{-- {!! $news->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
