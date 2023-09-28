@extends('adminlte::master')

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

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

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

@section('body')

  <body >

  <div class="d-flex half">
    <div class="bg order-1 order-md-1 order-sm-2" style="background-image: url('{{ asset("assets/img/bannerCursinho.jpg") }}');">
    </div>
    <div class="contents order-2 order-md-2 order-sm-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="w-100 d-flex pb-3 justify-content-center">
              <a href="{{ asset(''); }}" class="d-flex w-100 text-center justify-content-center py-3">
                <img src="{{ asset('assets/img/logo.png')}}" alt="{{ config('APP_NAME') }}" class="" width="50%" height="auto">
              </a>
            </div>

            <div class="mb-4">
              <h3>Entre com Seus Dados</h3>
            </div>
            <form action="{{ $login_url }}" method="post">
                @csrf

                {{-- Email field --}}
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Password field --}}
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           placeholder="{{ __('adminlte::adminlte.password') }}">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12 text-right">
                    <p class="my-3">
                        <a href="{{ route('forget.password.get') }}" class="font-weight-bold">
                            Esqueci a Senha
                        </a>
                    </p>
                </div>


                {{-- Login field --}}
                <div class="row">
                    @if ($errors->has('message') )
                        <div class="col-12 text-center pb-3">
                            {{ $errors->first('message')}}
                        </div>
                    @endif
                    <div class="col-12">
                        <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                            <span class="fas fa-sign-in-alt"></span>
                            {{ __('adminlte::adminlte.sign_in') }}
                        </button>
                    </div>
                </div>

                <hr class="pt-5">
                {{-- Register button --}}

                <a href="{{ route('register')}}" class="btn btn-secondary btn-lg active w-100" role="button" aria-pressed="true">Novo Cadastro</a>


            </form>


                {{--
                <span class="d-block text-center my-4 text-muted">&mdash; Cadastre-se usando suas Redes Sociais &mdash;</span>

                <div class="social-login">
                    <a href="{{ url('/facebook/auth/redirect/register')}}" class="facebook btn d-flex justify-content-center align-items-center">
                    <span class="icon-facebook mr-3"></span> Login com Facebook
                    </a>
                    <a href="{{ url('/linkedin/auth/redirect/register')}}" class="linkedin btn d-flex justify-content-center align-items-center">
                    <span class="icon-linkedin mr-3"></span> Login com  LinkedIn
                    </a>
                    <a href="{{ url('/google/auth/redirect/register')}}" class="google btn d-flex justify-content-center align-items-center">
                    <span class="icon-google mr-3"></span> Login com  Google
                    </a>
                </div>
                --}}

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
  </body>
@stop

