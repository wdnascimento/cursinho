@extends('adminlte::page')

@section('title', config('admin.title'))

@section('content_header')
    @include('admin.layouts.header')
@stop

@section('content')
<section  class="content" >
    <div id="app" class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row p-2">
                        <div class="col-6">
                            <h3 class="card-title font-weight-bold">{{$params['subtitulo']}}</h3>
                        </div>
                        <div class="col-6 text-right">
                            {{-- <a href="{{ route($params['main_route'].'.create') }}" class="btn btn-primary btn-xs"><span class="fas fa-plus"></span> Novo Cadastro</a> --}}
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-10">

                            {{ Form::open(['route' => [$params['main_route'].'.index',((isset($preload['selective_process'])) ? $preload['selective_process'] : '')],'method' =>'GET', 'id' => 'form_filtro']) }}
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-3 pt-3">
                                    {{ Form::date('date_start',(isset($searchFields['date_start']) ? $searchFields['date_start'] : ''), ['class' => 'form-control' ,'type' => 'date', 'id' => 'date_start', 'placeholder' => 'dd/mm/yyyy'])}}
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 pt-3">
                                    {{ Form::date('date_end',(isset($searchFields['date_end']) ? $searchFields['date_end'] : ''), ['class' => 'form-control' ,'type' => 'date', 'id' => 'date_end', 'placeholder' => 'dd/mm/yyyy'])}}
                                </div>
                                <div class="col-xs-12 col-sm-4d-flex col-md-1 pt-3 ">
                                    {{ Form::submit('Buscar',['class'=>'btn btn-primary btn-sm d-flex']) }}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 d-flex align-content-center justify-content-end pt-3">
                            {{ Form::open(['route' => [$params['main_route'].'.reportlead'],'method' =>'GET', 'id' => 'form_report']) }}
                            {{ Form::hidden('report_date_start', (isset($searchFields['date_start']) ? $searchFields['date_start'] : ''), [ 'id' => 'report_date_start'])}}
                            {{ Form::hidden('report_date_end', (isset($searchFields['date_end']) ? $searchFields['date_end'] : ''), [ 'id' => 'report_date_end'])}}
                            <div class="row d-flex justify-content-end align-content-center ">
                                <button id="btn-export" class="btn btn-success btn-sm d-flex justify-content-center align-content-center" >
                                    <i  class="d-flex p-1 fas fa-file-excel"></i><span class="d-flex"> Exportar</span>
                                </button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                    <!-- /.card-header -->

                <div class="card-body table-responsive p-2">

                    @if(isset($data) && count($data))
                        <table class="table table-striped table-hover smallTable">
                            <thead>
                                {{-- id, name, email, phone, course, created_at, updated_at --}}
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Celular</th>
                                    <th>Curso Pretendido</th>
                                    <th>Data de Cadastro</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item['name']}}</td>
                                        <td>{{ $item['email']}}</td>
                                        <td>{{ $item['phone']}}</td>
                                        <td>{{ $item['course']}}</td>
                                        <td>{{ \Carbon\Carbon::parse($item['created_at'])->format('d/m/Y')}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-success m-2" role="alert">
                            Nenhuma informação cadastrada.
                        </div>
                    @endif
                </div>
                <!-- /.card-body -->
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $data->withQueryString()->links('pagination::bootstrap-4') }}
                </div>
              </div>
    </div>
    </section>
    <style>
        .line:hover{
            cursor: pointer;
        }
        .smallTable td, .smallTable th{
            padding: .3em !important;
            font-size: .8em !important;
        }

        .hiddenResume{
            width: 0;
            height: 0;
            overflow: hidden;
        }
        form{
            margin: 0;
            padding: 0;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
    <script>
        $('#btn-export').click(function() {
            $('#report_date_start').val($('#date_start').val());
            $('#report_date_end').val($('#date_end').val());
            $('#form_report').submit();
        });
    </script>
@stop
