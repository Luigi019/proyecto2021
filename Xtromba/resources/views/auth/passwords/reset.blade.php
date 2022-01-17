@extends('auth.layout')

@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.password_reset_message'))

@section('content')
    <div class="col-12">
        <form action="{{ $password_reset_url }}" method="post">
            {{ csrf_field() }}

            {{-- Token field --}}
            <input type="hidden" name="token" value="{{ $token }}">

            {{-- Email field --}}
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10 mb-3 px-4">
                    <label class="form-label col-md-12 text-light mb-2" for="email">Correo</label>
                    <br>
                    <input type="email" name="email"
                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>
                    @if($errors->has('email'))
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
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Password confirmation field --}}
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10 mb-3 px-4">
                    <label class="form-label col-md-12 text-light mb-2" for="password_confirmation">{{ __('adminlte::adminlte.retype_password') }}</label>
                    <br>
                    <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                    @if($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Confirm password reset button --}}
            <div class="row mt-4 mb-1">
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit"
                            class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                        <span class="fas fa-sync-alt"></span>
                        {{ __('adminlte::adminlte.reset_password')}}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
