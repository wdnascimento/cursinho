<?php

namespace App\Http\Requests\Admin\SelectiveProcess;

use App\Rules\Admin\SelectiveProcess\SelectiveProcessDateValidade;
use Illuminate\Foundation\Http\FormRequest;

class SelectiveProcessUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // id, year, title, startdate, enddate, paymentfinaldate, instructionurl , taxvalue
            'year' => 'required|min:4',
            'title' => 'required',
            'startdate' => ['required','date', new SelectiveProcessDateValidade($this->id) ],
            'enddate' => ['required','date','after:startdate', new SelectiveProcessDateValidade($this->id)],
            'paymentfinaldate' => 'required|date|after_or_equal:enddate',
            'taxvalue' => 'required',
            'instructionurl' =>'mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'year.required' =>'O campo :attribute é obrigatório!',
            'year.min' =>'O campo :attribute precisa ser no formato (AAAA)!',
            'title.required' =>'O campo :attribute é obrigatório!',
            'startdate.required' =>'O campo :attribute é obrigatório!',
            'startdate.date' =>'O campo :attribute precisa ser uma data válida!',
            'enddate.required' =>'O campo :attribute é obrigatório!',
            'enddate.date' =>'O campo :attribute precisa ser uma data válida!',
            'enddate.after' =>'O :attribute precisa ser maior que a data inicial!',
            'paymentfinaldate.required' =>'O campo :attribute é obrigatório!',
            'paymentfinaldate.date' =>'O campo :attribute precisa ser uma data válida!',
            'paymentfinaldate.after_or_equal' =>'O :attribute deve ser maior ou igual que a data final!',
            'taxvalue.required' =>'O campo :attribute é obrigatório!',
            'instructionurl.mimes' =>'O campo :attribute precisa respeitar os formatos (PDF)!',
        ];
    }

    public function attributes()
    {
        // id, year, title, startdate, enddate, paymentfinaldate, instructionurl , taxvalue
        return [
            'year' => 'Ano',
            'title' => 'Título',
            'startdate' => 'Início',
            'paymentfinaldate' => 'Limite de Pagamento',
            'enddate' => 'Fim',
            'instructionurl' => 'Intruções',
            'taxvalue' => 'Valor da Inscrição',
        ];
    }
}
