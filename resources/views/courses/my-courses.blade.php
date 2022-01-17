@extends('layouts.app')

@section('title', 'Mis formaciones')

@section('content')

    <div class="p-5 mb-4 h-50 bg-light rounded-3">
        <div class="container-fluid pt-4 px-5">
            <div class="container">
                <h2 class="display-5">Mis formaciones</h2>
            </div>
            
            <div class="container">
                <nav class="nav mynav">
                    <ul>
                        <li class="nav-item active"><a class="nav-link active" href="">Todas las formaciones</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Listas</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Wishlist</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Archivados</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> 

    {{-- section filter --}}
    @include('search.inc.filters')
    {{-- endsection --}}         

    <div class="container-fluid mb-2 align-items-center cards" style="height: 280px">

        <div class="row align-items-center">

            <div class="wrapper" style="display: grid;
                                        grid-template-columns: repeat(5, 1fr);
                                        grid-auto-rows: 280px;">  

                {{-- courses cards --}}
                <x-card>
                    @include('courses.inc.courses')
                </x-card>
                {{-- end courses cards --}}

            </div>
        </div>
    </div>
    
@endsection