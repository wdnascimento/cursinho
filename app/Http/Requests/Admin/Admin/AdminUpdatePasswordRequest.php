<?php

namespace App\Http\Requests\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'password.required' =>'O campo :attribute é de preenchimento obrigatório!',
            'password.confirmed' =>'O campo :attribute precisa ser confirmado',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Senha',
        ];
    }
}
