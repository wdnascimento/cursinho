<?php

namespace App\Http\Requests\Site\Lead;

use App\Rules\GoogleRecaptcha;
use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
{
    // id, name, email, phone, course, created_at, updated_at
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           // id, user_id, cpf, social_name, rg,  marital_status, nationality, color, birthdate, birthcity
           'name' => 'required|regex:/^(.*)\s(.*)+.*$/',
           'email' => 'required|email',
           'phone' => 'required|min:15|regex:/^([0-9\s\-\+\(\)]*)$/',
           'course' => 'required',
           'g-recaptcha-response'  =>  ['required',new GoogleRecaptcha],
        ];
    }

    public function messages()
    {
        return [
            'social_name.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'social_name.regex' => 'O campo :attribute deve conter nome e sobrenome!',

            'email.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'email.email' =>'O campo :attribute deve ser um e-mail válido!',

            'phone.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'phone.digits' =>'O campo :attribute deve ser um celular válido!',
            'phone.regex' =>'O campo :attribute deve ser um celular válido Ex: (41) 99999-9999!',
            'course.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'g-recaptcha-response.required' =>'O campo :attribute é obrigatório!',

        ];
    }

    public function attributes()
    {
        return [

            // id, user_id, cpf, social_name, rg,  marital_status, nationality, color, birthdate, birthcity
            'name' => 'Nome Completo',
            'email' => 'E-Mail',
            'phone' => 'Celular',
            'course' => 'Curso Pretendido',
            'g-recaptcha-response'  => 'Google Recaptcha',
        ];
    }
}
