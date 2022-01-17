@extends('auth.layout')
@section('auth_header', __('adminlte::adminlte.verify_message'))
@section('content')
    <div class="col-12">
        @if(session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('adminlte::adminlte.verify_email_sent') }}
            </div>
        @endif
            {{ __('adminlte::adminlte.verify_check_your_email') }}
            {{ __('adminlte::adminlte.verify_if_not_recieved') }}

            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                    {{ __('adminlte::adminlte.verify_request_another') }}
                </button>.
            </form>
    </div>

    {{-- Divider --}}
    <div class="col-12 d-flex justify-content-center my-4">
        <hr class="divider w-75">
    </div>

    <div class="col-12">
        <div class="row p-0">
            <div class="col-12 login-footer mt-2">
                <div class="mt-2">
                    <p class="text-center text-light text-decoration-none mb-1"> Inicia sesión con </p>
                    <p class="social-login text-center"><i class="bi bi-facebook link-danger"></i>&nbsp;&nbsp;<i
                            class="bi bi-google link-danger"></i></p>
                </div>
            </div>
        </div>
    </div>
@endsection
