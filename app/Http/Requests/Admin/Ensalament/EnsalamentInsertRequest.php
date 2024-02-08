<?php

namespace App\Http\Requests\Admin\Ensalament;

use Illuminate\Foundation\Http\FormRequest;

class EnsalamentInsertRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // id, year, title, startdate, enddate, paymentfinaldate, instructionurl , taxvalue
            'title' => 'required',
            'selective_process_id' => 'required',
            'url' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>'O campo :attribute é obrigatório!',
            'selective_process_id.required' =>'O campo :attribute é obrigatório!',
            'url.required' =>'O campo :attribute é obrigatório!',
        ];
    }

    public function attributes()
    {
        // id, year, title, startdate, enddate, paymentfinaldate, instructionurl , taxvalue
        return [
            'title' => 'Título',
            'selective_process_id' => 'Processo Seletivo',
            'instructionurl' => 'Arquivo',
        ];
    }
}
