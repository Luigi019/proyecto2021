@extends('layouts.app')

@section('title', 'Instructores')

@section('content')

<section class="mt-3 ml-3">

        <div class="bg-light">

          <div class="d-flex justify-content-between ml-5 mr-5">
            <h1 class="text-capitalize text-roboto text-black-65 font-weight-bolder m-5">
              <img src="{{asset('img/logo1.png')}}" alt="Inmobiliaria" height="40" width="40">
              <strong>Instructores</strong>
            </h1>

            <form class="form-responsive m-5"
            {{-- style="margin-right: 0;" --}}
            >
              <div class="input-group border border-white rounded shadow-sm" style="background-color: #fff;">
                <input type="text" class="form-control border border-white p-0 rounded"
                placeholder="   Buscar... " aria-label="Buscar... ">
                <button class="btn text-gray border-white py-0 rounded-pill" type="button" id="btn-search" style="background-color: #FFF;">
                  <i class="fa fa-search"></i></button>
              </div>
            </form>

          </div>

          <div class="container">

            <div class="row mx-5 mb-5 mt-2">

              @foreach ( $teachers as $_teacher )
              <div class="col-md-4 px-1 mr">
                <div class="card rounded-lg shadow-sm border-0 mb-4 p-0" style="max-width: 440px; background:#fff">
                  <div class="row no-gutters">
                    <div class="col-md-4 ml-3">
                      <img src="https://picsum.photos/300/300" class="img-fluid w-100 card-img rounded-circle py-4 px-2"
                      alt="Foto de {{ $_teacher->name }}">
                    </div>
                    <div class="col-md-7">
                      <div class="card-body pb-0 pt-4">
                        <h5 class="card-title text-roboto fw-bolder text-truncate mb-0" style="height: 1.8rem;">
                          <strong>{{$_teacher->name}}</strong>
                        </h5>
                        <p class="card-text text-black-50 text-truncate" style="height: 1.5rem;">
                          {{$_teacher->email}}
                        </p>
                      </div>
                      <div class="card-footer border-0 text-center pt-0 pb-4 mt-4" style="background: transparent;">
                        <a  class="btn btn-danger btn-sm rounded-pill" href='{{route('public.user.index' , [$_teacher])}}'>
                          <p class="card-text text-roboto mb-0">

                      <strong>Ver perfil</strong>

                          </p>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @endforeach

            </div>
          </div>
        </div>

</section>

@endsection
