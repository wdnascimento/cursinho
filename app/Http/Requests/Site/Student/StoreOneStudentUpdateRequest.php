<?php

namespace App\Http\Requests\Site\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreOneStudentUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // id, user_id, cpf, social_name, rg,  marital_status, nationality, color, birthdate, birthcity
            'cpf' => 'required|cpf|unique:students,cpf,'.$this->id,
            // 'user_id' => 'required',
            'social_name' => 'required',
            'rg' => 'required',
            'marital_status' => 'required',
            'nationality' => 'required',
            'color' => 'required',
            'birthdate' => 'required|date',
            'birthcity' => 'required',

            // , birthstate, housephone, officephone, cellphone, messagephone, sex
            'birthstate' => 'required',
            'housephone' => 'required',
            'cellphone' => 'required',
            'sex' => 'required',

            // , cep, logradouro, bairro, numero, localidade, uf, complemento
            'cep' => 'required',
            'logradouro' => 'required',
            'bairro' => 'required',
            'numero' => 'required',
            'localidade' => 'required',
            'uf' => 'required',

            // // , father, mother, worker, time_work, saturday_work, saturday_time, place_study, specialneed, descriptionneed, quota, registrationstep
            'father' => 'required',
            'mother' => 'required',
            'worker' => 'required',
            'saturday_work' => 'required',
            'place_study' => 'required',
            'specialneed' => 'required',
            'descriptionneed' => 'required_if:specialneed,1',
            'quota' => 'required'
        ];

    }

    public function messages()
    {
        return [

            'cpf.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'cpf.cpf' =>':attribute Inválido, digite um número valido',
            'cpf.unique' =>':attribute já cadastrado',

            'user_id.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'social_name.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'rg.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'marital_status.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'nationality.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'color.required' =>'O campo :attribute é de preenchimento obrigatório!',

            'birthdate.date' =>'O campo :attribute precisa ser uma dada válida!',
            'birthcity.required' =>'O campo :attribute é de preenchimento obrigatório!',

            // , birthstate, housephone, officephone, cellphone, messagephone, sex
            'birthstate.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'housephone.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'cellphone.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'sex.required' =>'O campo :attribute é de preenchimento obrigatório!',

            // , cep, logradouro, bairro, numero, localidade, uf, complemento
            'cep.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'logradouro.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'bairro.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'numero.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'localidade.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'uf.required' =>'O campo :attribute é de preenchimento obrigatório!',

            // // , father, mother, worker, time_work, saturday_work, saturday_time, place_study, specialneed, descriptionneed, quota, registrationstep
            'father.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'mother.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'worker.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'saturday_work.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'place_study.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'specialneed.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'specialneed.required' =>'O campo :attribute é obrigatório quando PNE for SIM.!',
            'quota.required' =>'O campo :attribute é de preenchimento obrigatório!',
        ];
    }

    public function attributes()
    {
        return [

            // id, user_id, cpf, social_name, rg,  marital_status, nationality, color, birthdate, birthcity
            'cpf' => 'CPF',
            'user_id' => 'Usuário',
            'social_name' => 'Nome Social',
            'rg' => 'RG',
            'marital_status' => 'Estado Civíl',
            'nationality' => 'Nacionalidade',
            'color' => 'Cor / Raça',
            'birthdate' => 'Data de Nascimento',
            'birthcity' => 'Cidade de Nascimento',

            // , birthstate, housephone, officephone, cellphone, messagephone, sex
            'birthstate' => 'Estado de Nascimento',
            'housephone' => 'Telefone Residencial',
            'cellphone' => 'Celular',
            'sex' => 'Sexo',

            // , cep, logradouro, bairro, numero, localidade, uf, complemento
            'cep' => 'CEP',
            'logradouro' => 'Logradouro',
            'bairro' => 'Bairro',
            'numero' => 'Número',
            'localidade' => 'Localidade',
            'uf' => 'UF',

            // // , father, mother, worker, time_work, saturday_work, saturday_time, place_study, specialneed, descriptionneed, quota, registrationstep
            'father' => 'Pai',
            'mother' => 'Mãe',
            'worker' => 'Trabalha?',
            'saturday_work' => 'Trabalha Sábado',
            'place_study' => 'Onde quer Estudar',
            'specialneed' => 'PNE',
            'descriptionneed' => 'Descrição',
            'quota' => 'Cotista',
        ];
    }
}
