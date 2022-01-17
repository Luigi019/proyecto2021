@extends('auth.layout')
@php( $password_email_url = View::getSection('password_email_url') ?? config('adminlte.password_email_url', 'password/email') )
@if (config('adminlte.use_route_url', false))
    @php( $password_email_url = $password_email_url ? route($password_email_url) : '' )
@else
    @php( $password_email_url = $password_email_url ? url($password_email_url) : '' )
@endif
@section('auth_header', __('adminlte::adminlte.password_reset_message'))

@section('content')

    <div class="col-12">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ $password_email_url }}" method="post">

            {{ csrf_field() }}

            <div class="row d-flex justify-content-center">
                {{-- Email field --}}
                <div class="col-12 col-md-10 mb-3 px-4">
                    <label class="form-label col-md-12 text-light mb-2" for="email">Correo</label>
                    <br>
                    <input type="email" name="email"
                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}" autofocus>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Send reset link button --}}
            <div class="row mt-4 mb-1">
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit"
                            class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                        <span class="fas fa-share-square"></span>
                        {{ __('adminlte::adminlte.send_password_reset_link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
