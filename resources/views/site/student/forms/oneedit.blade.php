<div class="step">
    <div class="card-body ">
        <x-form :action="route('student.update',$data['id'])"  id="form-student" method="put">
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
                    <label for="social_name">Nome Social</label>
                    <x-form-input name="social_name" :value="$data['social_name']"  placeholder="Nome Social"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="cpf">CPF</label>
                    <x-form-input name="cpf" :value="$data['cpf']"  class="form-control cpf" placeholder="CPF"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="rg">RG</label>
                    <x-form-input name="rg" :value="$data['rg']"  class="rg" placeholder="RG"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="marital_status">Estado Civil</label>
                    <x-form-select  class="form-control"  name="marital_status" selected="{{ $data['marital_status'] }}"  :options="$preload['marital_status']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="nationality">Nacionalidade</label>
                    <x-form-select  class="form-control" name="nationality" selected="$data['nationality']"  :options="$preload['nationality']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="color">Cor / Raça</label>
                    <x-form-select  class="form-control" name="color" :selected="$data['color']"  :options="$preload['color']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="birthdate">Data Nascimento</label>
                    <x-form-input name="birthdate" :value="$data['birthdate']"  type="date"  class="form-control" />
                </div>
            {{-- , birthcity, birthstate, housephone, officephone, cellphone, messagephone, sex, --}}
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="birthcity">Cidade Nascimento</label>
                    <x-form-input name="birthcity" :value="$data['birthcity']"   class="form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="birthstate">Estado Nascimento</label>
                    <x-form-select class="form-control" name="birthstate" :value="$data['birthstate']"  :options="$preload['birthstate']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="housephone">Tel. Residencial</label>
                    <x-form-input name="housephone" :value="$data['housephone']"    class="housephone form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="officephone">Tel. Comercial</label>
                    <x-form-input name="officephone" :value="$data['officephone']"   class="officephone form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="cellphone">Celular</label>
                    <x-form-input name="cellphone" :value="$data['cellphone']"    class="cellphone form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="messagephone">Tel. Recado</label>
                    <x-form-input name="messagephone" :value="$data['messagephone']"   class="messagephone form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="sex">Sexo</label>
                    <x-form-select  class="form-control" name="sex" :value="$data['sex']"  :options="$preload['sex']" />
                </div>
                <div class="col-12 py-3">
                    <h3>Dados de Endereço</h3>
                </div>
                {{-- cep, logradouro, bairro, numero, localidade, uf, complemento --}}
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="cep">CEP</label>
                    <x-form-input name="cep" :value="$data['cep']"  class="form-control cep"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="logradouro">Rua</label>
                    <x-form-input name="logradouro" :value="$data['logradouro']"   class="form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="numero">Número</label>
                    <x-form-input name="numero" :value="$data['numero']"    class="form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="bairro">Bairro</label>
                    <x-form-input name="bairro" :value="$data['bairro']"    class="form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="localidade">Cidade</label>
                    <x-form-input name="localidade" :value="$data['localidade']"    class="form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="uf">UF</label>
                    <x-form-input name="uf" :value="$data['uf']"    class="form-control"/>
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="complemento">Complemento</label>
                    <x-form-input name="complemento" :value="$data['complemento']"    class="form-control"/>
                </div>

                {{-- father, mother, worker, time_work , saturday_work, saturday_time, place_study, specialneed, descriptionneed, quota, --}}
                <div class="col-12 py-3">
                    <h3>Informações Adicionais</h3>
                </div>

                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="father">Nome do Pai</label>
                    <x-form-input name="father" :value="$data['father']"   class="form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="mother">Nome da Mãe</label>
                    <x-form-input name="mother" :value="$data['mother']"   class="form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="worker">Você Trabalha?</label>
                    <x-form-select class="form-control" name="worker" :value="$data['worker']"  :options="$preload['flag']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="time_work">Qual Horário?</label>
                    <x-form-select class="form-control" name="time_work" :value="$data['time_work']"  :options="$preload['time_work']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="saturday_work">Trabalha Sábado?</label>
                    <x-form-select class="form-control" name="saturday_work" :value="$data['saturday_work']"  :options="$preload['flag']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="saturday_time">Qual Horário?</label>
                    <x-form-select class="form-control" name="saturday_time" :value="$data['saturday_time']"  :options="$preload['time_work']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="place_study">Onde pretende estudar?</label>
                    <x-form-select class="form-control" name="place_study" :value="$data['place_study']"  :options="$preload['place_study']" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="specialneed">Pessoa Com Deficiência?</label>
                    <x-form-select class="form-control" name="specialneed" :value="$data['specialneed']"  :options="$preload['flag']" />
                </div>

                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="descriptionneed">Se sim, qual?</label>
                    <x-form-input name="descriptionneed" :value="$data['descriptionneed']"   class="form-control" />
                </div>
                <div class="form-group col-12 col-md-6 col-lg-4">
                    <label for="quota">Cotista?</label>
                    <x-form-select class="form-control" name="quota" :value="$data['quota']"  :options="$preload['flag']" />
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
