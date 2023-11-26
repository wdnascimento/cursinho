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
                                <div class="col-xs-12 col-sm-6 col-md-8 pt-3">
                                        {{Form::select('selective_process_id',
                                            $preload['selective_process_id'],
                                            ((isset($preload['selective_process'])) ? $preload['selective_process'] : null),
                                            ['id'=>'selective_process_id','class' =>'form-control'])}}
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 pt-3 d-flex">
                                    {{ Form::submit('Buscar',['class'=>'btn btn-primary btn-sm d-flex']) }}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                    <!-- /.card-header -->

                <div class="card-body table-responsive p-2">

                    @if(isset($data) && count($data))
                        @foreach ( $data as $item)
                            <chart-component title="{{ $item['text'] }}" responses="{{ json_encode($item['responses']) }}"  ></chart-component>
                        @endforeach
                    @endif
                </div>
                <!-- /.card-body -->
                <!-- /.card-body -->
              </div>


    </div>
    </section>
    <style>
        form{
            margin: 0;
            padding: 0;
        }
    </style>
@stop

@section('js')
    <script src="{{ asset('js/admin/app.js') }}"></script>
    <script>
        $('#selective_process_id').on('change', function(){
            $('#form_filtro').submit();
        });

    </script>
@stop
