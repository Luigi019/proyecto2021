@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )
@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('content')
    <div class="col-12">
        {{-- Lockscreen user name --}}
        <div class="lockscreen-name">
            {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}
        </div>

        {{-- Lockscreen item --}}
        <div class="lockscreen-item">
            <form method="POST" action="{{ route('password.confirm') }}" class="lockscreen-credentials @if(!config('adminlte.usermenu_image'))ml-0 @endif">

                @csrf

                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-10 mb-3 px-4">
                        <label class="form-label col-md-12 text-light mb-2" for="password">{{ __('adminlte::adminlte.password') }}</label>
                        <br>
                        <input id="password" type="password" name="password" autocomplete="current-password"
                               class="form-control @error('password') is-invalid @enderror"
                               required autofocus>
                    </div>
                </div>

                <div class="row mt-4 mb-1">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="submit" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
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
                    {{-- Help block --}}
                    <div class="help-block text-center">
                        {{ __('adminlte::adminlte.confirm_password_message') }}
                    </div>
                </div>
                <div class="col-12">
                    {{-- Password error alert --}}
                    @error('password')
                    <div class="lockscreen-subitem text-center" role="alert">
                        <b class="text-danger">{{ $message }}</b>
                    </div>
                    @enderror
                </div>
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
            </div>
        </div>
    </div>
@endsection

