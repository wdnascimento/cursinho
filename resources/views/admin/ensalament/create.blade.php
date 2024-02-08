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
                            <a href="{{ route($params['main_route'].'.index')}}" class="btn btn-primary btn-xs"><span class="fas fa-arrow-left"></span>  Voltar</a>
                        </div>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0 ">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ Form::open(['route' => $params['main_route'].'.store','method' =>'post', 'enctype' =>'multipart/form-data']) }}

                    <div class="row">
                        {{--
                            id, year, title, startdate, enddate, extramessage, instructionurl, terms, paymentfinaldate, taxvalue
                            --}}
                        <div class="col-xs-12 col-sm-6 col-md-6 pt-3">
                            {{Form::label('title', 'Processo Seletivo')}}
                                {{Form::select('selective_process_id',
                                    $preload['selective_process_id'],
                                    ((isset($preload['selective_process'])) ? $preload['selective_process'] : null),
                                    ['id'=>'selective_process_id','class' =>'form-control'])}}
                        </div>

                        <div class="form-group col-sm-6 col-md-6 pt-3">
                            {{Form::label('title', 'Título')}}
                            {{Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Título'])}}
                        </div>
                        <div class="form-group col-12">
                            {{Form::label('url', 'Arquivo para Download')}}
                            {{Form::file('url',null,['class' => 'form-control','width' => '150', 'placeholder' => 'Arquivo'])}}
                        </div>
                        <div class="form-group col-12 col-md-12 col-lg-12 pt-2">
                            {{Form::submit('Salvar',['class'=>'btn btn-success btn-sm'])}}
                        </div>

                    </div>
                    {{ Form::close() }}
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
    <script src="{{ asset('js/scripts.js')}}" ></script>
    <script src="{{ asset('js/mask.js')}}" ></script>
@stop
