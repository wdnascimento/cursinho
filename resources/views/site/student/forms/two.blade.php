<div class="step">
    <div class="card-body ">
        @if(isset($preload['selective_process']))
        <h3 class="w-100 text-center"><strong>Processo Seletivo: </strong>{{ $preload['selective_process']->title }} </h3>
        <hr>
        <x-form :action="route('student.store.two')" id="form-student" method="post">
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
                                    <x-form-radio name="question_{{ $item->id }}" class="{{ $options->class }}" value="{{ $options->id }}" label="{{ $options->text }}" />
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
                                        <x-form-radio name="question_{{ $item->id }}" class="{{ $options->class }}" value="{{ $options->value }}" label="{{ $options->text }}" />
                                    @endif
                                @endforeach
                                </x-form-group>
                                @foreach ($item->responses as $options )
                                    @if($options->type == 2)
                                        <x-form-input name="response_{{ $item->id }}_{{ $options->id }}" class="mb-2 {{ $options->class }}"  placeholder="{{ $options->text }}"/>
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
                                        <div class="form-group col-12 col-md-6 py-1">
                                            <x-form-input name="response_{{ $item->id }}_{{ $options->id }}" class="mb-2 {{ $options->class }}" placeholder="{{ $options->text }}"/>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @break
                        @default

                    @endswitch

                @endforeach
                <div class="row py-3">
                    <div class="form-group d-flex justify-content-end">
                        <x-form-submit class="btn btn-success btn-lg d-flex ">Salvar</x-form-submit>
                    </div>
                </div>
            </div>
        </x-form>
        @else
        <h3 class="w-100 alert alert-danger">
            Nenhum Processo Seletivo aberto no momento.
        </h3>
        @endif
    </div>
</div>

