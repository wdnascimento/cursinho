<?php

namespace App\Http\Requests\Api\Student;

use Illuminate\Foundation\Http\FormRequest;

class PaymentUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required',
            'payment' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'id.required' =>'Você precisa preencher o id',
            'payment.required' =>'Você precisa preencher a informação de pagamento',
        ];
    }
}
