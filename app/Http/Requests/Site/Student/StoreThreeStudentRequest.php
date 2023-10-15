<?php

namespace App\Http\Requests\Site\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreThreeStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'agreeterms' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'agreeterms.required' =>'Você precisa concordar com os termos do Edital',
        ];
    }


}
