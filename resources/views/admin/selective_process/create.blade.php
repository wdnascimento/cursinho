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

                    @if( isset($data))
                        {{
                            Form::model($data,[
                                'route' => [$params['main_route'].'.update',$data->id]
                                ,'class' => 'form'
                                ,'method' => 'put'
                                ,'enctype' =>'multipart/form-data'
                            ])
                        }}
                    @else
                        {{ Form::open(['route' => $params['main_route'].'.store','method' =>'post', 'enctype' =>'multipart/form-data']) }}
                    @endif

                    <div class="row">
                        {{--
                            id, year, title, startdate, enddate, extramessage, instructionurl, terms, paymentfinaldate, taxvalue
                            --}}
                        <div class="form-group col-12">
                            {{Form::label('title', 'Título')}}
                            {{Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Título'])}}
                        </div>
                        <div class="form-group col-sm-6 col-md-6 col-lg-3">
                            {{Form::label('year', 'Ano (AAAA)')}}
                            {{Form::text('year',null,['class' => 'form-control', 'type' => 'year', 'placeholder' => 'Ex. 2024'])}}
                        </div>
                        <div class="form-group col-sm-6 col-md-6 col-lg-3">
                            {{Form::label('startdate', 'Início')}}
                            {{Form::date('startdate',null,['class' => 'form-control', 'type' => 'date' , 'placeholder' => 'Início'])}}
                        </div>
                        <div class="form-group col-sm-6 col-md-6 col-lg-3">
                            {{Form::label('enddate', 'Fim')}}
                            {{Form::date('enddate',null,['class' => 'form-control', 'type' => 'date' , 'placeholder' => 'Fim'])}}
                        </div>
                        <div class="form-group col-sm-6 col-md-6 col-lg-3">
                            {{Form::label('paymentfinaldate', 'Data Final Pagamento')}}
                            {{Form::date('paymentfinaldate',null,['class' => 'form-control', 'type' => 'date' , 'placeholder' => 'Pagamento'])}}
                        </div>
                        <div class="form-group col-sm-6 col-md-6 col-lg-3">
                            {{Form::label('taxvalue', 'Valor da Inscrição')}}
                            {{Form::text('taxvalue',null,['class' => 'form-control moneyReal',  'placeholder' => 'Valor'])}}
                        </div>


                        <div class="form-group col-12">
                            {{Form::label('instructionurl', 'Arquivo de instruções em PDF')}}
                            {{Form::file('instructionurl',null,['class' => 'form-control','width' => '150', 'placeholder' => 'Arquivo'])}}
                        </div>
                        @if( isset($data->instructionurl))
                        <div class="form-group">
                            <a href="{{ asset('storage/'.$data->instructionurl); }}" target="_blank">Instruções</a>
                        </div>
                        @endif
                        <div class="form-group col-12">
                            {{Form::label('terms', 'Arquivo de Termos de Uso')}}
                            {{Form::file('terms',null,['class' => 'form-control','width' => '150', 'placeholder' => 'Termos'])}}
                        </div>
                        @if( isset($data->terms))
                        <div class="form-group">
                            <a href="{{ asset('storage/'.$data->terms); }}" target="_blank">Termos</a>
                        </div>
                        @endif
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
