<div class="step">
    <div class="card-body ">
        @if($data['selective_processes'])
            @if ($data['selective_processes']->studentSelectiveProcesses->isEmpty())
                <h2 class="w-100">
                    PROCESSO ABERTO: {{ $data['selective_processes']->title }}
                </h2>
                <div class="row pb-3">
                    <div class="col-12 col-md-6">
                        INÍCIO DAS INSCRIÇÃO: {{  \Carbon\Carbon::parse($data['selective_processes']->startdate)->format('d/m/Y') }}
                    </div>
                    <div class="col-12 col-md-6">
                        TÉRMINO DAS INSCRIÇÃO: {{  \Carbon\Carbon::parse($data['selective_processes']->enddate)->format('d/m/Y') }}
                    </div>
                </div>
                <h5>
                </h5>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item w-100 vh-50"  src="{{ asset($data['selective_processes']->instructionurl) }}"  allowfullscreen></iframe>
                </div>
                <x-form :action="route('selective_processes.store')" id="form-student" method="post">
                    <x-form-input type="hidden" name="selective_process_id" :value="$data['selective_processes']->id"/>
                    <x-form-group>
                        <x-form-checkbox name="agreeterms" label="Li e concordo com os termos deste edital" />
                    </x-form-group>
                    <div class="row py-3">
                        <div class="form-group d-flex justify-content-end">
                            <x-form-submit class="btn btn-success btn-lg d-flex ">Realizar Inscrição</x-form-submit>
                        </div>
                    </div>
                </x-form>
                <style>
                    .vh-50{
                        height: 50vh;
                    }
                </style>
            @else
            <div class="row">
                <div class="col-12 col-md-6  pt-4">
                @foreach ($data['selective_processes']->studentSelectiveProcesses as $item )

                    <div class="card p-0 ">
                        <div class="card-header">
                            <h2 class="w-100 text-center pb-2">
                                {{ $data['selective_processes']->title }}
                            </h2>
                        </div>
                        <div class="card-body">
                            <h6 class="w-100  text-center">
                                INÍCIO DAS INSCRIÇÃO: {{  \Carbon\Carbon::parse($data['selective_processes']->startdate)->format('d/m/Y') }}
                                <br>
                                TÉRMINO DAS INSCRIÇÃO: {{  \Carbon\Carbon::parse($data['selective_processes']->enddate)->format('d/m/Y') }}
                            </h6>
                            <h6 class="w-100  text-center">
                                Para efetuar sua inscrição você precisa fazer um PIX para a chave
                                <br>
                                <br>
                                <strong>
                                CNPJ: 06.219.736/0001-31
                                <br>
                                Razão Social: FORMACAO SOLIDARIA
                                </strong>
                                <br>
                                <br>
                                <strong>
                                    Valor: R$ {{  $data['selective_processes']->taxvalue  }}
                                </strong>
                            </h6>
                        </div>
                        <div class="card-footer">
                            <h6 class="w-100  text-center">
                                <strong>DATA DA SUA INSCRIÇÃO: </strong> {{  \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}
                            </h6>
                            <h6 class="w-100  text-center">
                                <strong>STATUS DO PAGAMENTO: </strong> {{  $item->payment }}
                            </h6>
                            <h6 class="w-100  text-center">
                                <a class="btn btn-sm btn-primary" href="{{ asset($data['selective_processes']->instructionurl) }}">LINK DO EDITAL</a>
                            </h6>
                        </div>


                    </div>
                @endforeach
                </div>

            @endif
        @else
            <h5>
                <div class="alert alert-danger">
                    Nenhum processo em Aberto no momento!!
                </div>
            </h5>
        @endif
    </div>
</div>
