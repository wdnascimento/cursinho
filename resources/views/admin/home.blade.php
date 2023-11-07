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

                        @canany(['webmaster','admin'])
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $data['users']}}</h3>
                                    <p>Usuários Cadastrados</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-fw fa-user"></i>
                                </div>
                                <a href="{{ asset('admin/admin') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        @endcan
                        {{-- resumes --}}
                        @canany(['webmaster','admin','recrutador', 'recepcao'])
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $data['resumes']}}</h3>
                                    <p>Currículos Cadastrados</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-fw fa-file"></i>
                                </div>
                                <a href="{{ asset('admin/resumes') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        @endcan
                        {{-- active_resumes --}}
                        @canany(['webmaster','recrutador','admin'])
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $data['active_resumes']}}</h3>
                                    <p>Currículos Ativos</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-fw fa-file "></i>
                                </div>
                                <a href="{{ asset('admin/resumes') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        @endcan
                        {{--  recent_resumes --}}
                        @canany(['webmaster','recrutador','admin'])
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $data['recent_resumes']}}</h3>
                                    <p>Currículos Atualizados em 24h</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-fw fa-file "></i>
                                </div>
                                <a href="{{ asset('admin/resumes') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        @endcan
                        {{--  jobs --}}

                        @canany(['webmaster','recrutador','admin','comercial'])
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $data['jobs']}}</h3>
                                    <p>Vagas Ativas</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-list "></i>
                                </div>
                                <a href="{{ asset('admin/job') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        @endcan
                        {{--  month_resume_jobs --}}
                        @canany(['webmaster','recrutador','admin','recepcao'])
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $data['month_resume_jobs']}}</h3>
                                    <p>Candidaturas em 30 dias</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-fw fa-file"></i>
                                </div>
                                <a href="{{ asset('admin/resume_jobs') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        @endcan
                        {{--  recent_resume_jobs --}}
                        @canany(['webmaster','recrutador','admin','recepcao'])
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $data['recent_resume_jobs']}}</h3>
                                        <p>Candidaturas em 24h</p>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-fw fa-file"></i>
                                    </div>
                                    <a href="{{ asset('admin/resume_jobs') }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endcan
                        @canany(['recrutador','admin','webmaster'])
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $data['resumes_my_jobs']}}</h3>
                                        <p>Candidaturas (Suas Vagas) 24h</p>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-fw fa-file"></i>
                                    </div>
                                    <a href="{{ asset('admin/resume_jobs?owner=') }}{{ @Auth::user()->id }}" class="small-box-footer">Ver Mais <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
