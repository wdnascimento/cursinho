@extends('adminlte::master')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@stop

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
              <h3>Esqueceu a Senha</h3>
              <p class="mb-4">Preencha seu e-mail de cadastro</p>
            </div>
            <form action="{{ route('forget.password.post') }}" method="post">
              @csrf
                @if ($errors->any())
                    <div class="alert alert-danger pb-0">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li class="pb-2">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="form-group d-flex mb-2">
                  <input type="text" name="email" class="form-control d-flex" id="email" placeholder="E-mail">
                </div>
                <input type="submit" value="Enviar" class="btn btn-block btn-primary">
                <div class="w-100">
                  <hr class="py-2">
                  <a class="btn btn-block btn-primary text-white py-2" href="{{ asset('login')}}" role="button">Login</a>
                </div>
             </form>
          </div>
        </div>

      </div>
    </div>


  </div>


{{--
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>--}}
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
  @stop

