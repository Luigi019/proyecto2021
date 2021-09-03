@extends('panel.layouts.master')

@section('title','Home')

@section('content_header')
<h1>Panel Administrativo <small>INMOBILIARIA</small> </h1>
@endsection

@section('content')


    
    <div class="row">
        <div class="col-12">
        
			<!-- Small Boxes (Stats Boxes) -->
			<div class="row">
		<div class="col-lg-3 col-xs-6">
		
		<div class="card bg-purple rounded shadow">
			<div class="card-body">
				<div class="d-flex no-block align-items-center">
					<div class="text-white">
						<h2 class="text-white font-weight-bold">
							<a href="{{route('admin.news.index')}}" class="text-white text-bold">
								{{$news->count()}}
							</a>
						</h2>
						<h6 class="text-white">
							<a href="{{route('admin.news.index')}}" class="text-white">
							Noticias activas
							</a>
						</h6>
					</div>
					<div class="ml-auto">
						<span class="text-white display-6">
							<a href="{{route('admin.news.index')}}" class="text-white">
							<i class="far fa-newspaper"></i>
							</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		
	</div>
		
		<div class="col-lg-3 col-xs-6">
		
		<div class="card bg-success rounded shadow">
			<div class="card-body">
				<div class="d-flex no-block align-items-center">
					<div class="text-white">
						<h2 class="text-white font-weight-bold">
							<a href="{{route('admin.companies.index')}}" class="text-white text-bold">
							{{$company->count()}}
							</a>
						</h2>
						<h6 class="text-white">
							<a href="{{route('admin.companies.index')}}" class="text-white">
						Empresas con sello inmobiliaria
							</a>
						</h6>
					</div>
					<div class="ml-auto">
						<span class="text-white display-6">
							<a href="{{route('admin.companies.index')}}" class="text-white">
							<i class="fas fa-building"></i>
							</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="col-lg-3 col-xs-6">
		
		<div class="card bg-danger rounded shadow">
			<div class="card-body">
				<div class="d-flex no-block align-items-center">
					<div class="text-white">
						<h2 class="text-white font-weight-bold">
							<a href="{{ route('admin.galleries.index')}}" class="text-white text-bold">
								{{$gallery->count()}}
							</a>
						</h2>
						<h6 class="text-white">
							<a href="{{ route('admin.galleries.index')}}" class="text-white">
						Imagenes Activas de la Galeria
							</a>
						</h6>
					</div>
					<div class="ml-auto">
						<span class="text-white display-6">
							<a href="{{ route('admin.galleries.index')}}" class="text-white">
							<i class="fas fa-photo-video"></i>
							</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		
	</div>
		
		<div class="col-lg-3 col-xs-6">
		
		<div class="card bg-blue rounded shadow">
			<div class="card-body">
				<div class="d-flex no-block align-items-center">
					<div class="text-white">
						<h2 class="text-white font-weight-bold">
							<a href="{{route('admin.enterprises.index')}}" class="text-white text-bold">
							{{$enterprise->count()}}
							</a>
						</h2>
						<h6 class="text-white">
							<a href="{{route('admin.enterprises.index')}}" class="text-white">
						Empresas que aplican actuales
							</a>
						</h6>
					</div>
					<div class="ml-auto">
						<span class="text-white display-6">
							<a href="{{route('admin.enterprises.index')}}" class="text-white">
							<i class="far fa-building"></i>
							</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		
	</div>

		<div class="col-lg-3 col-xs-6">
		
		<div class="card bg-info rounded shadow">
			<div class="card-body">
				<div class="d-flex no-block align-items-center">
					<div class="text-white">
						<h2 class="text-white font-weight-bold">
							<a href="{{route('admin.users.index')}}" class="text-white text-bold">
							{{ $user->count()}}  
				
							</a>
						</h2>
						<h6 class="text-white">
							<a href="{{route('admin.users.index')}}" class="text-white">
							Usuarios
							</a>
						</h6>
					</div>
					<div class="ml-auto">
						<span class="text-white display-6">
							<a href="{{route('admin.users.index')}}" class="text-white">
							<i class="far fa-user-circle"></i>
							</a>
						</span>
					</div>
				</div>
			</div>
		</div>
		
	</div>
		
    <div class="card bg-yellow text-white rounded shadow">
        <div class="card-body">
            <div class="d-flex no-block align-items-center">
                <div class="text-white">
                    <h2 class="text-white font-weight-bold">
                        <a href="{{route('admin.roles.index')}}" class="text-white text-bold">
                            {{$role->count()}} 
						
                        </a>
                    </h2>
                    <h6 class="text-white">
                        <a href="{{route('admin.roles.index')}}" class="text-white">
                        Roles activos  
                        </a>
                    </h6>
                </div>
                <div class="ml-auto">
                    <span class="text-white display-6">
                        <a href="{{route('admin.roles.index')}}" class="text-white">
                        <i class="fa fa-edit"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
            </div>
    


	
		
        
<footer>
    <div>
        <div class="row gx-4 gx-lg-5 justify-content-center d-flex">
            <div class="col-lg-8 text-center ">
                <p class="text-white-75 mb-4"><i><b>Panel elaborado por  <a href="https://funnywebs.xzy" target="_blank">Funny Webs</a></b></i></p>
               
            </div>
        </div>
    </div>
</footer>
    </div>
</div>

@endsection

@section('css')

@endsection

@section('js')

@endsection
