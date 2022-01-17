@extends('auth.layout')

@php($login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login'))
@php($register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register'))

@if (config('adminlte.use_route_url', false))
    @php($login_url = $login_url ? route($login_url) : '')
    @php($register_url = $register_url ? route($register_url) : '')
@else
    @php($login_url = $login_url ? url($login_url) : '')
    @php($register_url = $register_url ? url($register_url) : '')
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('content')
    <div class="col-12">
        <form action="{{ $register_url  }}" method="post">
            {{ csrf_field() }}
@if(request('Xtoken') && request('Xtoken') =='true')
<input type="text" hidden name="xtoken" value='true' id="">
@endif
            {{-- Name field --}}
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10 mb-3 px-4">
                    <label class="form-label col-md-12 text-light mb-2" for="name">{{ __('adminlte::adminlte.full_name') }}</label>
                    <br>
                    <input type="text" name="name"
                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           value="{{ old('name') }}" placeholder=""
                           autofocus>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Email field --}}
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10 mb-3 px-4">
                    <label class="form-label col-md-12 text-light mb-2" for="email">{{ __('adminlte::adminlte.email') }}</label>
                    <br>
                    <input type="email" name="email"
                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}" placeholder="">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Password field --}}
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10 mb-3 px-4">
                    <label class="form-label col-md-12 text-light mb-2" for="password">{{ __('adminlte::adminlte.password') }}</label>
                    <br>
                    <input type="password" name="password"
                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Confirm password field --}}
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10 mb-3 px-4">
                    <label class="form-label col-md-12 text-light mb-2" for="password_confirmation">{{ __('adminlte::adminlte.retype_password') }}</label>
                    <br>
                    <input type="password" name="password_confirmation"
                           class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                           placeholder="">
                    @if ($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Register button --}}
            <div class="row mt-4 mb-1">
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit"
                            class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                        {{ __('adminlte::adminlte.register') }}
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
            <div class="col-12 login-footer">
                {{-- Register link --}}
                @if($login_url)
                    <p class="text-center text-light text-decoration-none mb-0">
                        {{-- already have account link --}}
                        <a class="link-danger text-decoration-none" href="{{ $login_url }}">
                            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
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
