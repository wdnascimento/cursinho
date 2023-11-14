<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento A4</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <style >
        @media print{
            .no-print{
                display:none !important;
            }
        }

        @page{
            size: A4;
            margin: 0mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 13px;

        }
        p{
            font-size: 13px;
        }
        .quebra-pagina {
            page-break-before: always;
        }

        h5{
            font-weight: bold;
        }

    </style>
</head>
<body class="container pt-4">
        <div class="row">
            <div class="col-12 py-3">
                <h3>Dados Pessoais</h3>
                <hr>
            </div>
            <div class="col-4">
                <h5 class="w-100">Nome Social</h5>
                <p class="w-100"> {{ $data['student']['social_name'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">CPF</h5>
                <p class="w-100"> {{ $data['student']['cpf'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">RG</h5>
                <p class="w-100"> {{ $data['student']['rg'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Estado Civil</h5>
                <p class="w-100" > {{ $data['student']['desc_marital_status'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Nacionalidade</h5>
                <p class="w-100" > {{ $data['student']['desc_nationality'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Cor / Raça</h5>
                <p class="w-100" > {{ $data['student']['desc_color'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Data Nascimento</h5>
                <p class="w-100"> {{ \Carbon\Carbon::parse($data['student']['birthdate'])->format('d/m/Y') }}  </p>
            </div>
        {{-- , birthcity, birthstate, housephone, officephone, cellphone, messagephone, sex, --}}
            <div class="col-4">
                <h5 class="w-100">Cidade Nascimento</h5>
                <p class="w-100"> {{ $data['student']['birthcity'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Estado Nascimento</h5>
                <p class="w-100" > {{ $data['student']['desc_birthstate'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Tel. Residencial</h5>
                <p class="w-100"> {{ $data['student']['housephone'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Tel. Comercial</h5>
                <p class="w-100"> {{ $data['student']['officephone'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Celular</h5>
                <p class="w-100"> {{ $data['student']['cellphone'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Tel. Recado</h5>
                <p class="w-100"> {{ $data['student']['messagephone'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Sexo</h5>
                <p class="w-100" > {{ $data['student']['desc_sex'] }} </p>
            </div>
            <div class="col-12 py-3">
                <h3>Dados de Endereço</h3>
                <hr>
            </div>
            {{-- cep, logradouro, bairro, numero, localidade, uf, complemento --}}
            <div class="col-4">
                <h5 class="w-100">CEP</h5>
                <p class="w-100"> {{ $data['student']['cep'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Rua</h5>
                <p class="w-100"> {{ $data['student']['logradouro'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Número</h5>
                <p class="w-100"> {{ $data['student']['numero'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Bairro</h5>
                <p class="w-100"> {{ $data['student']['bairro'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Cidade</h5>
                <p class="w-100"> {{ $data['student']['localidade'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">UF</h5>
                <p class="w-100"> {{ $data['student']['uf'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Complemento</h5>
                <p class="w-100"> {{ $data['student']['complemento'] }} </p>
            </div>

            {{-- father, mother, worker, time_work , saturday_work, saturday_time, place_study, specialneed, descriptionneed, quota, --}}
            <div class="col-12 py-3">
                <h3>Informações Adicionais</h3>
                <hr>
            </div>

            <div class="col-4">
                <h5 class="w-100">Nome do Pai</h5>
                <p class="w-100"> {{ $data['student']['father'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Nome da Mãe</h5>
                <p class="w-100"> {{ $data['student']['mother'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Você Trabalha?</h5>
                <p class="w-100" > {{ $data['student']['desc_worker'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Qual Horário?</h5>
                <p class="w-100" > {{ $data['student']['desc_time_work'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Trabalha Sábado?</h5>
                <p class="w-100" > {{ $data['student']['desc_saturday_work'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Qual Horário?</h5>
                <p class="w-100" > {{ $data['student']['desc_saturday_time'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Onde pretende estuda?</h5>
                <p class="w-100" > {{ $data['student']['desc_place_study'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Necessita de atendimento especial?</h5>
                <p class="w-100" > {{ $data['student']['desc_specialneed'] }} </p>
            </div>

            <div class="col-4">
                <h5 class="w-100">Se sim qual?</h5>
                <p class="w-100"> {{ $data['student']['descriptionneed'] }} </p>
            </div>
            <div class="col-4">
                <h5 class="w-100">Cotista?</h5>
                <p class="w-100" > {{ $data['student']['desc_quota'] }} </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-3">
                <h3>Questionário</h3>
                <hr>
            </div>
            @foreach ($preload['questions'] as $item)
                @switch($item->type)
                    @case(1)
                    <div class="col-12">
                        <h5  class="pt-2">{{  $item->order }} - {{  $item->text }}</h5>
                        @foreach ($item->responses as $options )
                            @php
                                $optvalue = ($options->id == $data[$item->id]["optvalue"]) ? true : false;
                            @endphp
                            <p class="p-0 m-0">
                            @if($optvalue)
                                <i class="far fa-check-square"></i>
                            @else
                                <i class="far fa-square"></i>
                            @endif
                            {{ $options->text }}
                            </p>
                        @endforeach
                    </div>
                    @break
                    @case(2)
                    <div class="col-12">
                        <h5 class="pt-2">{{  $item->order }} - {{  $item->text }}</h5>
                        @foreach ($item->responses as $options )
                            @if($options->type != 2)
                                @php
                                    $optvalue = ($data[$item->id]["optvalue"] ==  $options->value) ? true : false;
                                @endphp
                                <p class="p-0 m-0">
                                @if($optvalue)
                                    <i class="far fa-check-square"></i>
                                @else
                                    <i class="far fa-square"></i>
                                @endif
                                {{ $options->text }}
                                </p>
                            @endif
                        @endforeach
                        @foreach ($item->responses as $options )
                            @if($options->type == 2)
                                @php
                                    $tmp = json_decode($data[$item->id]["textvalue"],true);
                                    $textvalue = (is_array($tmp) && isset($tmp[$options->id])) ? $tmp[$options->id] : '';
                                @endphp
                                @if($textvalue != '')
                                <p class="p-0 m-0">
                                    <strong>{{ $options->text }}: </strong>{{ $textvalue }}
                                </p>
                                @endif
                            @endif
                        @endforeach
                    </div>
                    @break
                    @case(3)
                    <div class="col-12">
                        <h5  class="pt-2">{{  $item->order }} - {{  $item->text }}</h5>
                        <div class="row">
                            @foreach ($item->responses as $options )
                                @if($options->type == 2)
                                @php
                                    $tmp = json_decode($data[$item->id]["textvalue"],true);
                                    $textvalue = (is_array($tmp) && isset($tmp[$options->id])) ? $tmp[$options->id] : '';
                                @endphp
                                <div class="col-12 col-md-6 py-1">
                                    <p class="p-0 m-0 w-100"><strong>{{ $options->text }}: </strong>{{ $textvalue }}</p>
                                    {{-- <x-form-input name="response_{{ $item->id }}_{{ $options->id }}" :value="$textvalue" class="{{ $options->class }}" placeholder="{{ $options->text }}"/> --}}
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @break
                    @default
                    @break
                @endswitch
            @endforeach
        </div>
        <div class="no-print row py-4">
            <div class="no-print d-flex col-6 justify-content-start">
                <button class="no-print btn btn-primary btn-sm d-flex" onclick="window.location.href='{{ route('admin.student.index') }}'" >VOLTAR</button>
            </div>
            <div class="no-print d-flex col-6 justify-content-end">
                <button class="no-print btn btn-primary btn-sm d-flex" onclick="window.print();">IMPRIMIR</button>
            </div>
        </div>

    </body>
</html>
