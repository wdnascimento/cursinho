<?php

namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminEditarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$this->id.'',
            'role_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'email.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'role_id.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'email.email' =>'O campo :attribute precisa ser um email válido!',

            'email.unique' =>':attribute já cadastrado',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'email' => 'E-mail',
            'role_id' => 'Papel',
        ];
    }
}
