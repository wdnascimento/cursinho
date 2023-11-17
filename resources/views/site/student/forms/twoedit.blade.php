<div class="step">
    <div class="card-body ">
        @if(isset($preload['selective_process']))
            <h3 class="w-100 text-center"><strong>Processo Seletivo: </strong>{{ $preload['selective_process']->title }} </h3>
            <hr>
                <x-form :action="((isset($data['student_id'])) ? route('student.update.two',$data['student_id']) : route('student.store.two') )"
                            id="form-student" :method="((isset($data['student_id'])) ? 'put' : 'post')">
                @if ($errors->any())
                    <h5>
                        <div class="alert alert-danger">
                            Você precisa preencher todos os campos obrigatórios!
                        </div>
                    </h5>
                @endif
                {{-- id, user_id, social_name, rg, cpf, marital_status, nationality , color, birthdate--}}
                <div class="row">
                    @foreach ($preload['questions'] as $item)

                        @switch($item->type)
                            @case(1)
                            <div class="form-group col-12">
                                    <h3>{{  $item->order }} - {{  $item->text }}</h3>
                                        <x-form-group name="question_{{ $item->id }}" >
                                        @foreach ($item->responses as $options )
                                            @php
                                                if(isset($data[$item->id]["optvalue"])){
                                                    $optvalue = ($options->id == $data[$item->id]["optvalue"]) ? true : false;
                                                }else{
                                                    $optvalue = false;
                                                }
                                            @endphp
                                            <x-form-radio name="question_{{ $item->id }}" :checked="$optvalue" class="{{ $options->class }}" value="{{ $options->id }}" label="{{ $options->text }}" />
                                        @endforeach
                                        </x-form-group>
                                    </div>
                            @break
                            @case(2)
                                <div class="form-group col-12">
                                    <h3>{{  $item->order }} - {{  $item->text }}</h3>
                                    <x-form-group name="question_{{ $item->id }}" >
                                    @foreach ($item->responses as $options )
                                        @if($options->type != 2)
                                            @php
                                                if(isset($data[$item->id]["optvalue"])){
                                                    $optvalue = ($data[$item->id]["optvalue"] ==  $options->value) ? true : false;
                                                }else{
                                                    $optvalue = false;
                                                }
                                            @endphp
                                            <x-form-radio name="question_{{ $item->id }}" :checked="$optvalue" class="{{ $options->class }}" value="{{ $options->value }}" label="{{ $options->text }}" />
                                        @endif
                                    @endforeach
                                    </x-form-group>
                                    @foreach ($item->responses as $options )
                                        @if($options->type == 2)
                                            @php
                                                if(isset($data[$item->id]["textvalue"])){
                                                    $tmp = json_decode($data[$item->id]["textvalue"],true);
                                                    $textvalue = (is_array($tmp) && isset($tmp[$options->id])) ? $tmp[$options->id] : '';
                                                }else{
                                                    $textvalue = '';
                                                }
                                            @endphp
                                            <x-form-input name="response_{{ $item->id }}_{{ $options->id }}" :value="$textvalue" class="{{ $options->class }}"  placeholder="{{ $options->text }}"/>
                                        @endif
                                    @endforeach
                                </div>
                                @break
                            @case(3)
                                <div class="form-group col-12">
                                    <h3>{{  $item->order }} - {{  $item->text }}</h3>
                                    <div class="row">
                                        @foreach ($item->responses as $options )

                                            @if($options->type == 2)
                                            @php
                                                if(isset($data[$item->id]["textvalue"])){
                                                    $tmp = json_decode($data[$item->id]["textvalue"],true);
                                                    $textvalue = (is_array($tmp) && isset($tmp[$options->id])) ? $tmp[$options->id] : '';
                                                }else{
                                                    $textvalue = '';
                                                }
                                            @endphp
                                            <div class="form-group col-12 col-md-6 py-1">
                                                <x-form-input name="response_{{ $item->id }}_{{ $options->id }}" :value="$textvalue" class="{{ $options->class }}" placeholder="{{ $options->text }}"/>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                @break
                            @default

                        @endswitch

                    @endforeach
                    @if(isset($data['selective_processes']) && ($data['selective_processes']->studentSelectiveProcesses->isEmpty()))
                    <div class="row py-3">
                        <div class="form-group d-flex justify-content-end">
                            <x-form-submit class="btn btn-success btn-lg d-flex ">Salvar</x-form-submit>
                        </div>
                    </div>
                    @else
                    <div class="row py-3">
                        <div class="form-group d-flex text-center">
                            <div class="alert-danger">
                                Você não pode editar este cadastro por estar inscrito em um processo seletivo ativo.
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </x-form>
        @else
        <h5>
            <div class="alert alert-danger">
                Nenhum processo seletivo em Aberto no momento!
            </div>
        </h5>
        @endif
    </div>
</div>

