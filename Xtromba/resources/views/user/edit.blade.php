@extends('layouts.app')

@section('title', 'Editar mi Cuenta')

@section('content')
<section class="container-fluid p-3  mt-5">
    <div>
        <div class='form-responsive'>
         <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                @include ('user.inc.form', ['modo'=>'Editar'])
            </form>
            
            <br>
        </div>
    </div>

</section>

    @endsection