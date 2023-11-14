@extends('adminlte::page')

@section('title', config('admin.title'))

@section('content_header')
    <h1 class="m-0 text-dark">Bem Vindo - {{  Auth::user()->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {{-- users --}}
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $data['open_selective_process']}}</h3>
                                    <p>Processos Abertos</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-fw fa-user"></i>
                                </div>
                                <a href="{{ asset('admin/user') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $data['student']}}</h3>
                                    <p>Alunos Inscritos</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-fw fa-file"></i>
                                </div>
                                <a href="{{ asset('admin/student') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $data['notstudent'] }}</h3>
                                    <p>Alunos Cadastrados (Não Inscritos)</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-fw fa-file "></i>
                                </div>
                                <a href="{{ asset('admin/notstudent') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $data['selective_process']}}</h3>
                                    <p>Processos Seletivos</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-fw fa-file "></i>
                                </div>
                                <a href="{{ asset('admin/selective_process') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
