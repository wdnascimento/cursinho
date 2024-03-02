<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/icon/apple-touch-icon.png'); }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon-32x32.png'); }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon-16x16.png'); }}">
    <link rel="manifest" href="{{ asset('assets/site.webmanifest'); }}">


    <!-- Vendor CSS Files -->
    <link href="{{ asset('home/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('home/assets/css/style.css') }}" rel="stylesheet">


</head>
<body>
    <main >
        <body>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <!-- ======= Header ======= -->
            <header id="header" class="fixed-top">
                @include('site.layouts.header');
            </header><!-- End Header -->

            <!-- ======= Hero Section ======= -->
            <section id="hero-internal" class="d-flex justify-content-center align-items-center">

            </section><!-- End Hero -->


            <main id="main">

              <!-- ======= Cource Details Section ======= -->
              <section id="ensalament" class="p-0" >
                <div class="container" data-aos="fade-up">
                  <div class="row">

                            <h1>PRÉ CADASTRO</h1>
                            <h6>Cadastre-se e fique por dentro dos nossos processos seletivos</h6>
                            <hr class="pb-2">
                            <x-form :action="route('home.leads.post')"  id="form-student" method="post">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        Você precisa preencher todos os campos obrigatórios!
                                    </div>
                                @endif
                                @if (session('message') )
                                    <div class="alert alert-danger">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                {{-- id, user_id, name, rg, cpf, marital_status, nationality , color, birthdate--}}
                                <div class="row">
                                    <div class="form-group col-12 col-md-6 col-lg-6">
                                        <label for="name"><strong>Nome Completo</strong></label>
                                        <x-form-input name="name" placeholder="Nome Completo"/>
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-6">
                                        <label for="phone"><strong>Celular</strong></label>
                                        <x-form-input name="phone" class="form-control cellphone" placeholder="(00) 00000-0000"/>
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-6">
                                        <label for="email"><strong>E-mail</strong></label>
                                        <x-form-input name="email"   class="email form-control" placeholder="e-mail"/>
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-6">
                                        <label for="course"><strong>Curso Pretendido</strong></label>
                                        <x-form-input name="course"   class="form-control"  placeholder="Curso Pretendido"/>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6 py-2">
                                        <div class="g-recaptcha" data-sitekey="6Lc2AmkpAAAAAPT4z_Yn6XDADVpnyR-3QVupFA4f"></div>
                                        @if ($errors->has('g-recaptcha-response') )
                                        <div class="invalid pb-3">
                                            {{ $errors->first('g-recaptcha-response')}}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-lg-6 d-flex justify-content-end align-items-center">
                                        <x-form-submit class="btn btn-success btn-lg">Salvar</x-form-submit>
                                    </div>
                                </div>
                            </x-form>



                  </div>
                    <div class="py-2 pt-4 d-flex justify-content-end">
                        <div class="d-flex ">
                            <a href="{{ asset(''); }}" class="get-started-btn d-flex m-0">VOLTAR</a>
                        </div>
                    </div>
                </div>
              </section><!-- End Cource Details Section -->


              <!-- ======= About Section ======= -->
              <section id="about" class="about">
                <div class="container" data-aos="fade-up">

                    <div class="row">
                        <div class="col-xs-12 px-2 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center align-items-center">
                            <img class="img-responsive logo-max"  src="{{ asset('home/assets/img/logo-fundacao-solidaria.png'); }}" >
                        </div>
                        <div class="col-xs-12 px-2 col-sm-12 col-md-12 col-lg-12 ">
                            <p class="w-100 text-center text-white">
                                Instagram: @cursinhosolidario
                                <br>
                                E-mail: contato@formacaosolidaria.org.br
                                <br>
                                WhatsApp: (41) 99887-2098.
                                <br>
                            </p>
                        </div>

                    </div>

                </div>
              </section><!-- End About Section -->

            </main><!-- End #main -->

            <!-- ======= Footer ======= -->
            <footer id="footer" class="container-fluid m-0 p-0">

              <div class="footer-top bg-black">
                <div class="container">
                  <div class="text-center">
                    <h5><strong>Apoio:</strong></h5>
                  </div>
                  <div class="row d-flex justify-content-center justify-content-between align-items-center footer-brands">
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/LogoCC.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/sponte.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/nosclen.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/hipergraf.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/rotary.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/gracia.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/gsvioli.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/curso positivo.png'); }}" class="img-responsive">
                    </div>
                    <div class="d-flex col-6 col-sm-6 py-2 col-md-4 col-lg-1 justify-content-center">
                      <img src="{{ asset('home/assets/img/Sistema Positivo.png'); }}" class="d-flex img-responsive">
                    </div>
                  <div>
                  <div class="text-center pt-4">
                      &copy; Copyright <strong><span>All Rights Reserved</span></strong>
                  </div>
                </div>
              </div>
            </footer><!-- End Footer -->


          </body>
    </main>
    <a href="https://api.whatsapp.com/send?phone=5541998872098&amp;text=Olá!%20Esta%20é%20uma%20mensagem%20e%20vinda%20do%20site." class="float-whats" target="_blank" onclick="goog_report_conversion('https://api.whatsapp.com/send?phone=554130952535&amp;text=Olá!%20Esta%20é%20uma%20mensagem%20do%20site.')">
        <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSI1MTIiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iNTEyIiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOmNjPSJodHRwOi8vY3JlYXRpdmVjb21tb25zLm9yZy9ucyMiIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6aW5rc2NhcGU9Imh0dHA6Ly93d3cuaW5rc2NhcGUub3JnL25hbWVzcGFjZXMvaW5rc2NhcGUiIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyIgeG1sbnM6c29kaXBvZGk9Imh0dHA6Ly9zb2RpcG9kaS5zb3VyY2Vmb3JnZS5uZXQvRFREL3NvZGlwb2RpLTAuZHRkIiB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcyBpZD0iZGVmczEyIi8+PGcgaWQ9Imc1MTI0Ij48cmVjdCBoZWlnaHQ9IjUxMiIgaWQ9InJlY3QyOTg3IiByeD0iNjQiIHJ5PSI2NCIgc3R5bGU9ImZpbGw6IzY1YmM1NDtmaWxsLW9wYWNpdHk6MTtmaWxsLXJ1bGU6bm9uemVybztzdHJva2U6bm9uZSIgd2lkdGg9IjUxMiIgeD0iMCIgeT0iMCIvPjxwYXRoIGQ9Im0gNDU2LDI1MC44NTI2NiBjIDAsMTA3LjYwOTA0IC04Ny45MTI2LDE5NC44NDQyIC0xOTYuMzYzOTcsMTk0Ljg0NDIgLTM0LjQzMDY2LDAgLTY2Ljc3Njc3LC04LjgwMTY4IC05NC45MTk5LC0yNC4yNDE2MiBMIDU2LjAwMDAwNSw0NTYgOTEuNDM3NzQ1LDM1MS40NTU4NCBDIDczLjU1OTcxNSwzMjIuMDg4NzIgNjMuMjY1MDI1LDI4Ny42NTUyMyA2My4yNjUwMjUsMjUwLjg1MTI0IDYzLjI2NTAyNSwxNDMuMjM1MTYgMTUxLjE4MDQ5LDU2IDI1OS42MzQ2Myw1NiAzNjguMDg3NCw1Ni4wMDEgNDU2LDE0My4yMzY1NyA0NTYsMjUwLjg1MjY2IHogTSAyNTkuNjM2MDMsODcuMDMxOTYgYyAtOTEuMDQwOTIsMCAtMTY1LjA5Mzk2NSw3My40OTI0OCAtMTY1LjA5Mzk2NSwxNjMuODIwNyAwLDM1Ljg0MDU2IDExLjY4MzQ2NSw2OS4wNDE2MiAzMS40NDYwNTUsOTYuMDQ1MjkgbCAtMjAuNjIxNzcsNjAuODMxNTEgNjMuNDQyODUsLTIwLjE2NDAzIGMgMjYuMDcxMjYsMTcuMTEzMjMgNTcuMjkxOTYsMjcuMDk4MDUgOTAuODI1NDMsMjcuMDk4MDUgOTEuMDI5NjUsMCAxNjUuMDkzOTYsLTczLjQ4NTQzIDE2NS4wOTM5NiwtMTYzLjgxMjI0IDAsLTkwLjMyNjggLTc0LjA2MjkyLC0xNjMuODE5MjggLTE2NS4wOTI1NiwtMTYzLjgxOTI4IHogbSA5OS4xNTUyNiwyMDguNjg5NzIgYyAtMS4yMDk4OSwtMS45ODg3OSAtNC40MTg1LC0zLjE4NjAyIC05LjIyNDI0LC01LjU3MDYgLTQuODE3MDUsLTIuMzg3NCAtMjguNDg5NjQsLTEzLjk0NTUxIC0zMi44OTQsLTE1LjUzNDI5IC00LjQxODQ1LC0xLjU5MzAxIC03LjYzMTIyLC0yLjM5MzA0IC0xMC44MzgzOCwyLjM4NDU4IC0zLjIwNDMyLDQuNzkwMjggLTEyLjQyODU2LDE1LjUzNDI5IC0xNS4yNDI3MywxOC43MjAzMSAtMi44MDg1MywzLjE5MTY2IC01LjYwODYzLDMuNTkwMjYgLTEwLjQyNTY5LDEuMjAwMDMgLTQuODA1NzgsLTIuMzg3MzkgLTIwLjMyMTc3LC03LjQyODQgLTM4LjcwODI2LC0yMy43MDIxNSAtMTQuMzA3NDksLTEyLjY1ODE1IC0yMy45Njk3OCwtMjguMjg1NCAtMjYuNzc4MzEsLTMzLjA3MTQ3IC0yLjgwODU0LC00Ljc3OTAzIC0wLjI5NzIsLTcuMzYyMiAyLjEwOTkzLC05LjczOTc1IDIuMTY2MjYsLTIuMTQ3OTYgNC44MTQyMywtNS41ODE4NiA3LjIyNDE2LC04LjM2MzY0IDIuNDA3MTIsLTIuNzk0NDcgMy4yMDcxNSwtNC43ODE4NCA0LjgwODYxLC03Ljk2OTI2IDEuNjEyNzIsLTMuMTg4ODQgMC44MDAwMiwtNS45NzQ4NSAtMC4zOTg2LC04LjM3MDcgLTEuMjAyODYsLTIuMzgzMTcgLTEwLjgzMjc0LC0yNS44ODk1NSAtMTQuODQ0MTUsLTM1LjQ0OSAtNC4wMTEzOCwtOS41NTk0NyAtOC4wMTE1LC03Ljk2NjQ2IC0xMC44MjU2OCwtNy45NjY0NiAtMi44MDk5NiwwIC02LjAxNTY5LC0wLjQwMDAyIC05LjIyOTg3LC0wLjQwMDAyIC0zLjIwOTk3LDAgLTguNDI3MDMsMS4xOTg2NCAtMTIuODM1NjIsNS45NzM0NCAtNC40MTAwMSw0Ljc4MzI1IC0xNi44NDEzOCwxNi4zMzI5MSAtMTYuODQxMzgsMzkuODMzNjUgMCwyMy41MDQ5NyAxNy4yNDI3OSw0Ni4yMTEzMyAxOS42NTI3Myw0OS4zOTU5NCAyLjQwNDMxLDMuMTc3NTYgMzMuMjg4MzgsNTIuOTcyMSA4Mi4yMTgxMSw3Mi4xMDIyOCA0OC45NDgwMiwxOS4xMTMyOCA0OC45NDgwMiwxMi43NDQwNyA1Ny43NzM2NSwxMS45MzcgOC44MTQzNywtMC43ODczNSAyOC40Njk5MiwtMTEuNTQ0MDMgMzIuNDg4MzIsLTIyLjcwMDcyIDQuMDA4NiwtMTEuMTQ5NjQgNC4wMDg2LC0yMC43MTg5NiAyLjgxMTQsLTIyLjcwOTE3IHoiIGlkPSJXaGF0c0FwcF8yXyIgc3R5bGU9ImZpbGw6I2ZmZmZmZjtmaWxsLXJ1bGU6ZXZlbm9kZCIvPjwvZz48cGF0aCBkPSJtIDE4LjY5NTc0LDQ5My4yODc1MSBjIDExLjU2Nzk4LDExLjU2NzkgMjcuNTc2MDYsMTguNzEyNSA0NS4zMDQwNCwxOC43MTI1IGwgMzg0LjAxMjU1LC0wLjAyOSBjIDM1LjQ1NiwwIDYzLjk4NzcsLTI4LjUzMTYgNjMuOTg3NywtNjMuOTg3NTkgbCAwLC0zODMuOTgzNjg1IGMgMCwtMTcuNzI3OTggLTcuMTQ0NiwtMzMuNzM2MDMgLTE4LjcxMjYsLTQ1LjMwNDAzIEwgMTguNjk1NzQsNDkzLjI4NzUxIHoiIGlkPSJyZWN0Mjk4NC0xIiBzdHlsZT0iZmlsbDojMDAwMDAwO2ZpbGwtb3BhY2l0eTowLjMwMTk2MDc4O2ZpbGwtcnVsZTpub256ZXJvO3N0cm9rZTpub25lIi8+PC9zdmc+" alt="" width="45px">
    </a>
    <style>
        .float-whats {
            left: 25px;
            position: fixed;
            width: 50px;
            height: 50px;
            bottom: 25px;
            text-align: center;
            z-index: 100;
        }

        .invalid{
            width: 100%;
            margin-top: .25rem;
            font-size: .875em;
            color: var(--bs-form-invalid-color);
        }
    </style>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('home/assets/vendor/aos/aos.js'); }}"></script>
    <script src="{{ asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>
    <script src="{{ asset('home/assets/vendor/swiper/swiper-bundle.min.js'); }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('home/assets/js/main.js'); }}"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-THSBEF9P7X"></script>
    <script src="{{ asset('js/mask.js') }}"></script>
    <script>
       window.dataLayer = window.dataLayer || [];
       function gtag(){
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config','G-THSBEF9P7X' , {
                'cookie_domain': 'cursinhosolidario.org.br'
        });

    </script>
</body>
</html>
