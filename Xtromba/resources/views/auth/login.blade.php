@extends('auth.layout')

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.login_message'))

@section('content')
    <div class="col-12">
        <form action="{{ $login_url }}" method="post">
            {{ csrf_field() }}

            <div class="row d-flex justify-content-center">
                {{-- Email field --}}
                <div class="col-12 col-md-10 mb-3 px-4">
                    <label class="form-label col-md-12 text-light mb-2" for="email">Correo</label>
                    <br>
                    <input type="email" name="email"
                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}"
                           autofocus>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                {{-- Password field --}}
                <div class="col-12 col-md-10 mb-3 px-4">
                    <label class="form-label col-md-12 text-light mb-2" for="email">Contraseña</label>
                    <br>
                    <input type="password" name="password"
                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Login field --}}
            <div class="row mt-4 mb-1">
                <div class="col-12 d-flex justify-content-center">
                    <button type=submit
                            class="btn btn-block rounded {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                        <span class="fas fa-sign-in-alt"></span>
                        Iniciar sesión
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- Divider --}}
    <div class="col-12 d-flex justify-content-center my-4">
        <hr class="divider w-75">
    </div>

    <div class="col-12">
        <div class="row p-0">
            <div class="col-12">
                {{-- Password reset link --}}
                @if($password_reset_url)
                    <p class="text-center text-light text-decoration-none mb-0">
                        <a class="link-danger text-decoration-none" href="{{ $password_reset_url }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </p>
                @endif
            </div>
            <div class="col-12 login-footer mt-2">
                {{-- Register link --}}
                @if($register_url)
                    <p class="text-center text-light text-decoration-none mb-0">
                        ¿Aún no tienes una cuenta?
                        <a class="link-danger text-decoration-none" href="{{ $register_url }}">
                            Regístrate
                        </a>
                    </p>
                @endif
                <div class="mt-2">
                    <p class="text-center text-light text-decoration-none mb-1"> Inicia sesión con </p>
                    <p class="social-login text-center"><i class="bi bi-facebook link-danger"></i>&nbsp;&nbsp;<i
                            class="bi bi-google link-danger"></i></p>
                </div>
            </div>
        </div>
    </div>
@endsection
