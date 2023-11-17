@extends('adminlte::page')

@section('title', config('admin.title'))

@section('content_header')
    @include('admin.layouts.header')
@stop

@section('content')
    <section class="content" >
       <div class="row">
           <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title">{{$params['subtitulo']}}</h3>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route($params['main_route'].'.create')}}" class="btn btn-primary btn-xs"><span class="fas fa-plus"></span> Novo Cadastro</a>
                        </div>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0 ">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(isset($data) && count($data))
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                {{-- // id, year, title, startdate, enddate, extramessage, instructionurl, terms, paymentfinaldate, taxvalue --}}
                                <th>Ano</th>
                                <th>Título</th>
                                <th>Início</th>
                                <th>Final</th>
                                <th>Limite Pagamento</th>
                                <th>Operações</th>
                            </tr>
                            </thead>
                            <tbody>
                                <!-- id, titulo, data_hora, importado, usuario, deleted_at, created_at, updated_at -->
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->year}}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->startdate)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->enddate)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->paymentfinaldate)->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route($params['main_route'].'.edit', $item->id) }}" class="btn btn-info btn-xs"><span class="fas fa-edit"></span> Editar</a>
                                    </td>
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
              </div>


           </div>
       </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
