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
@stop

@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop

@section('body')
    <div class="{{ $auth_type ?? 'login' }}-box">

        {{-- Logo --}}
        <div class="{{ $auth_type ?? 'login' }}-logo">
            <a href="{{ $dashboard_url }}">

                {{-- Logo Image --}}
                @if (config('adminlte.auth_logo.enabled', false))
                    <img src="{{ asset(config('adminlte.auth_logo.img.path')) }}"
                         alt="{{ config('adminlte.auth_logo.img.alt') }}"
                         @if (config('adminlte.auth_logo.img.class', null))
                            class="{{ config('adminlte.auth_logo.img.class') }}"
                         @endif
                         @if (config('adminlte.auth_logo.img.width', null))
                            width="{{ config('adminlte.auth_logo.img.width') }}"
                         @endif
                         @if (config('adminlte.auth_logo.img.height', null))
                            height="{{ config('adminlte.auth_logo.img.height') }}"
                         @endif>
                @else
                    <img src="{{ asset(config('adminlte.logo_img')) }}"
                         alt="{{ config('adminlte.logo_img_alt') }}" height="50">
                @endif

                {{-- Logo Label --}}
                {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}

            </a>
        </div>

        {{-- Card Box --}}
        <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}">

            {{-- Card Header --}}
            @hasSection('auth_header')
                <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                    <h3 class="card-title float-none text-center">
                        @yield('auth_header')
                    </h3>
                </div>
            @endif

            {{-- Card Body --}}
            <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                @yield('auth_body')
            </div>

            {{-- Card Footer --}}
            @hasSection('auth_footer')
                <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                    @yield('auth_footer')
                </div>
            @endif

        </div>

    </div>
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
    </style>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
