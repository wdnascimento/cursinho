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
                        <div class="col-10">

                            @if($preload['notRegistred'] == 1)
                            {{ Form::open(['route' => [$params['main_route'].'.notstudent',((isset($preload['selective_process'])) ? $preload['selective_process'] : '')],'method' =>'GET', 'id' => 'form_filtro']) }}
                            @else
                            {{ Form::open(['route' => [$params['main_route'].'.index',((isset($preload['selective_process'])) ? $preload['selective_process'] : '')],'method' =>'GET', 'id' => 'form_filtro']) }}
                            @endif
                            <div class="row">
                                <div class="col-3 pt-3">
                                        {{Form::select('selective_process_id',
                                            $preload['selective_process_id'],
                                            ((isset($preload['selective_process'])) ? $preload['selective_process'] : null),
                                            ['id'=>'selective_process_id','class' =>'form-control'])}}
                                </div>
                                <div class="col-3 pt-3">
                                    {{ Form::text('social_name',(isset($searchFields['social_name']) ? $searchFields['social_name'] : ''), ['class' => 'form-control', 'id' => 'social_name', 'placeholder' => 'Nome'])}}
                                </div>
                                <div class="col-3 pt-3">
                                    {{ Form::text('cpf',(isset($searchFields['cpf']) ? $searchFields['cpf'] : ''), ['class' => 'form-control', 'id' => 'cpf',  'placeholder' => 'CPF'])}}
                                </div>
                                <div class="col-3 d-flex pt-3 ">
                                    {{ Form::submit('Buscar',['class'=>'btn btn-primary btn-sm d-flex']) }}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                        <div class="col-2 d-flex align-content-center justify-content-end pt-3">
                            @if($preload['notRegistred'] == 1)
                                {{ Form::open(['route' => [$params['main_route'].'.reportxls-notstudent',((isset($preload['selective_process'])) ? $preload['selective_process'] : '')],'method' =>'GET', 'id' => 'form_report']) }}
                            @else
                                {{ Form::open(['route' => [$params['main_route'].'.reportxls',((isset($preload['selective_process'])) ? $preload['selective_process'] : '')],'method' =>'GET', 'id' => 'form_report']) }}
                            @endif
                            {{ Form::hidden('report_selective_process_id', (isset($preload['selective_process']) ? $preload['selective_process'] : null) , [ 'id' => 'report_selective_process_id'])}}
                            {{ Form::hidden('report_social_name', (isset($searchFields['social_name']) ? $searchFields['social_name'] : ''), [ 'id' => 'report_social_name'])}}
                            {{ Form::hidden('report_cpf',(isset($searchFields['social_name']) ? $searchFields['social_name'] : ''), [ 'id' => 'report_cpf'])}}
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
                                {{-- id, user_id, cpf, social_name, rg, marital_status, nationality, color, birthdate, birthcity
                                    , birthstate, housephone, officephone, cellphone, messagephone, sex, cep, logradouro, bairro, numero
                                    , localidade, uf, complemento, father, mother, worker, time_work, saturday_work
                                    , saturday_time, place_study, specialneed, descriptionneed, quota, registrationstep
                                     --}}
                                <tr>
                                    <th>Numero</th>
                                    <th>CPF</th>
                                    <th>Nome Social</th>

                                    <th>Nascimento</th>
                                    <th>Cidade</th>
                                    <th>A. Esp</th>

                                    <th>Qual?</th>
                                    <th>Cotista?</th>
                                    @if($preload['notRegistred'] == 0)
                                    <th>Pagamento</th>
                                    <th colspan="3"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td >{{ $item['id']}}</td>
                                        <td >{{ $item['cpf']}}</td>
                                        <td >{{ $item['social_name']}}</td>

                                        <td>{{ \Carbon\Carbon::parse($item["birthdate"])->format('d/m/Y') }}</td>
                                        <td >{{ $item['localidade']}}</td>
                                        <td @if($item['specialneed']) class="bg-danger" @endif>{{ $item['desc_specialneed']}}</td>

                                        <td >{{ (($item['descriptionneed'] != '')? $item['descriptionneed'] :  '-') }}</td>
                                        <td >{{ $item['desc_quota']}}</td>
                                        @if($preload['notRegistred'] == 0)
                                        <td id="payment_status_{{ $item['id'] }}" >{{ $item['payment']}}</td>
                                        <td>
                                            <button-payment-component student_id="{{ $item['id'] }}" selective_process_id="{{ $preload['selective_process'] }}" name="{{ $item['social_name'] }}" ></button-payment-component>
                                        </td>
                                        {{-- <td >
                                            <button-student-component student_id="{{ $item['id'] }}" selective_process_id="{{ $preload['selective_process'] }}" name="{{ $item['social_name'] }}" ></button-student-component>
                                        </td> --}}
                                        <td>
                                            <a id="btn-print" href="{{ route($params['main_route'].'.print', [ 'student_id' => $item['id'], 'selective_process_id' => $preload['selective_process'] ] ) }}" data-toggle="tooltip" title="Imprimir">
                                                <i class="fas fa-print"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a id="btn-makexls" href="{{ route($params['main_route'].'.makexls', [ 'student_id' => $item['id'], 'selective_process_id' => $preload['selective_process'] ] ) }}" data-toggle="tooltip" title="Salvar Excel">
                                                <i class="fas fa-file-excel"></i>
                                            </a>
                                        </td>
                                        @endif
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

          <modal-payment-component root_url="{{ asset('') }}" ></modal-payment-component>
          {{-- <modal-student-component root_url="{{ asset('') }}" ></modal-student-component> --}}
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
        $('#selective_process_id').on('change', function(){
            $('#form_filtro').submit();
        });

        $('#btn-export').click(function() {
            $('#report_cpf').val($('#cpf').val());
            $('#report_selective_process_id').val($('#selective_process_id option:selected').val());
            $('#report_social_name').val($('#social_name').val());
            $('#form_report').submit();
        });

    </script>
@stop
