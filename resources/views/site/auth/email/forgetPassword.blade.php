<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="w-100 d-flex pb-3 justify-content-center">
    <a href="{{ asset(''); }}" class="d-flex w-100 text-center justify-content-center py-3">
      <img src="{{ asset('assets/img/logo.png')}}" alt="Cursinho Solidário" class="" width="50%" height="auto">
    </a>
</div>

<h1>Bem Vindo ao Cursinho Solidário</h1>

   Para recuperar sua senha clique no link a seguir:

<a href="{{ route('reset.password.get', $token) }} " class="btn-lg btn-primary p-3">Resetar Senha</a>
