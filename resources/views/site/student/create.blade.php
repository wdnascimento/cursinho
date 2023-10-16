@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container" >
    <div class="card-header">
        @include('site.layouts.header')
    </div>
    <h3 class="w-100">Cadastro de Alunos</h3>
<div id="stepContent">

    <div class="form-header d-flex mb-4">

        @switch($step)
            @case(1)
                <span class="stepIndicator active"><h5>Informações Pessoais</h5></span>
                <span class="stepIndicator"><h5>Formulário Socioeducacional</h5></span>
                <span class="stepIndicator"><h5>Inscrição</h5></span>
            @break

            @case(2)
                <span class="stepIndicator"><h5>Informações Pessoais</h5></span>
                <span class="stepIndicator active"><h5>Formulário Socioeducacional</h5></span>
                <span class="stepIndicator"><h5>Inscrição </h5></span>
            @break
{{--
            @case(3)
                <span class="stepIndicator cursor" onclick="window.location.href='{{ route('student.form.edit',1) ; }}'"><h5>Informações Pessoais</h5></span>
                <span class="stepIndicator cursor" onclick="window.location.href='{{ route('student.form.edit',2) ; }}'"><h5>Formulário Socioeducacional</h5></span>
                <span class="stepIndicator active cursor" onclick="window.location.href='{{ route('student.form.edit',3) ; }}'"><h5>Inscrição</h5></span>
            @break --}}

        @endswitch
    </div>
    @switch($step)
        @case(1)
            @include('site.student.forms.one')
        @break
        @case(2)
            @include('site.student.forms.two')
            @break
        {{-- @case(3)
            @include('site.student.forms.three')
        @break --}}
    @endswitch
</div>
</div>
@endsection
@section('js')
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/mask.js') }}"></script>
@endsection
