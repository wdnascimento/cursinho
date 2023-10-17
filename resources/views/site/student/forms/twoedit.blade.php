<div class="step">
    <div class="card-body ">
        <x-form :action="route('student.update.two',$data['student_id'])" id="form-student" method="put">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Você precisa preencher todos os campos obrigatórios!
                </div>
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
                                            $optvalue = ($options->id == $data[$item->id]["optvalue"]) ? true : false;
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
                                            $optvalue = ($data[$item->id]["optvalue"] ==  $options->value) ? true : false;
                                        @endphp
                                        <x-form-radio name="question_{{ $item->id }}" :checked="$optvalue" class="{{ $options->class }}" value="{{ $options->value }}" label="{{ $options->text }}" />
                                    @endif
                                @endforeach
                                </x-form-group>
                                @foreach ($item->responses as $options )
                                    @if($options->type == 2)
                                        @php
                                            $tmp = json_decode($data[$item->id]["textvalue"],true);
                                            $textvalue = (is_array($tmp) && isset($tmp[$options->id])) ? $tmp[$options->id] : '';
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
                                            $tmp = json_decode($data[$item->id]["textvalue"],true);
                                            $textvalue = (is_array($tmp) && isset($tmp[$options->id])) ? $tmp[$options->id] : '';
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
    </div>
</div>

