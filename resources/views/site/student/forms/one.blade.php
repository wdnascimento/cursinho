<div class="step">
    <div class="card-body ">
        <x-form :action="route('student.store')"  id="form-student" method="post">
            @if ($errors->any())
                <div class="alert alert-danger">
                    Você precisa preencher todos os campos obrigatórios!
                </div>
            @endif
            {{-- id, user_id, social_name, rg, cpf, marital_status, nationality , color, birthdate--}}
            <div class="row">
                <div class="col-12 py-3">
                    <h3>Dados Pessoais</h3>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-8">
                    <label for="social_name">Nome Completo</label>
                    <x-form-input name="social_name" placeholder="Nome Completo"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="cpf">CPF</label>
                    <x-form-input name="cpf" class="form-control cpf" placeholder="CPF"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="rg">RG</label>
                    <x-form-input name="rg" class="rg" placeholder="RG"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="marital_status">Estado Civil</label>
                    <x-form-select placeholder="--Selecione--" class="form-control"  name="marital_status" :options="$preload['marital_status']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="nationality">Nacionalidade</label>
                    <x-form-select placeholder="--Selecione--" class="form-control" name="nationality" :options="$preload['nationality']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="color">Cor / Raça</label>
                    <x-form-select placeholder="--Selecione--" class="form-control" name="color" :options="$preload['color']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="birthdate">Data Nascimento</label>
                    <x-form-input name="birthdate" type="date"  class="form-control" />
                </div>
            {{-- , birthcity, birthstate, housephone, officephone, cellphone, messagephone, sex, --}}
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="birthcity">Cidade Nascimento</label>
                    <x-form-input name="birthcity"  class="form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="birthstate">Estado Nascimento</label>
                    <x-form-select placeholder="--Selecione--" class="form-control" name="birthstate" :options="$preload['birthstate']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="housephone">Tel. Residencial</label>
                    <x-form-input name="housephone"   class="housephone form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="officephone">Tel. Comercial</label>
                    <x-form-input name="officephone"  class="officephone form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="cellphone">Celular</label>
                    <x-form-input name="cellphone"   class="cellphone form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="messagephone">Tel. Recado</label>
                    <x-form-input name="messagephone"  class="messagephone form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="sex">Sexo</label>
                    <x-form-select placeholder="--Selecione--"  class="form-control" name="sex" :options="$preload['sex']" />
                </div>
                <div class="col-12 py-3">
                    <h3>Dados de Endereço</h3>
                </div>
                {{-- cep, logradouro, bairro, numero, localidade, uf, complemento --}}
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="cep">CEP</label>
                    <x-form-input name="cep" class="form-control cep"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="logradouro">Rua</label>
                    <x-form-input name="logradouro"  class="form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="numero">Número</label>
                    <x-form-input name="numero"   class="form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="bairro">Bairro</label>
                    <x-form-input name="bairro"   class="form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="localidade">Cidade</label>
                    <x-form-input name="localidade"   class="form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="uf">UF</label>
                    <x-form-input name="uf"   class="form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="complemento">Complemento</label>
                    <x-form-input name="complemento"   class="form-control"/>
                </div>

                {{-- father, mother, worker, time_work , saturday_work, saturday_time, place_study, specialneed, descriptionneed, quota, --}}
                <div class="col-12 py-3">
                    <h3>Informações Adicionais</h3>
                </div>

                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="father">Nome do Pai</label>
                    <x-form-input name="father"  class="form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="mother">Nome da Mãe</label>
                    <x-form-input name="mother"  class="form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="worker">Você Trabalha?</label>
                    <x-form-select placeholder="--Selecione--" class="form-control" name="worker" :options="$preload['flag']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="time_work">Qual Horário?</label>
                    <x-form-select placeholder="--Selecione--" class="form-control" name="time_work" :options="$preload['time_work']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="saturday_work">Trabalha Sábado?</label>
                    <x-form-select placeholder="--Selecione--" class="form-control" name="saturday_work" :options="$preload['flag']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="saturday_time">Qual Horário?</label>
                    <x-form-select placeholder="--Selecione--" class="form-control" name="saturday_time" :options="$preload['time_work']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="place_study">Onde pretende estudar?</label>
                    <x-form-select placeholder="--Selecione--" class="form-control" name="place_study" :options="$preload['place_study']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="specialneed">Necessita de atendimento especial?</label>
                    <x-form-select placeholder="--Selecione--" class="form-control" name="specialneed" :options="$preload['flag']" />
                </div>

                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="descriptionneed">Se sim, qual?</label>
                    <x-form-input name="descriptionneed"  class="form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="quota">Cotista?</label>
                    <x-form-select placeholder="--Selecione--" class="form-control" name="quota" :options="$preload['flag']" />
                </div>
                <div class="row py-3">
                    <div class="form-group d-flex justify-content-end">
                        <x-form-submit class="btn btn-success btn-lg d-flex ">Salvar</x-form-submit>
                    </div>
                </div>
            </div>
        </x-form>
    </div>
</div>
