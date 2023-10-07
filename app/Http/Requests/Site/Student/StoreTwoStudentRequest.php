<?php

namespace App\Http\Requests\Site\Student;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;

class StoreTwoStudentRequest extends FormRequest
{
    private $questions;

    public function __construct(Question $questions)
    {
        $this->question = $questions;
    }


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $data = $this->question->where('required',1)->with('responses')->orderBy('order')->get();
        $validade= Array();
        foreach($data as $q){
            switch($q->type){
                case 1 :
                    $validade['question_'.$q['id']] = "required" ;
                break;
                case 2 :
                    $validade['question_'.$q['id']] = "required" ;
                    foreach($q->responses as $r){
                        if($r->type == 2 &&  $r->required == 1){
                            $validade['response_'.$q['id'].'_'.$r['id']] = "required_if:question_".$q['id'].",1" ;
                        }
                    }
                break;
                case 3 :
                    foreach($q->responses as $r){
                        if($r->required == 1 )
                            $validade['response_'.$q['id'].'_'.$r['id']] = "required" ;
                    }

                break;
            }

        }
        return $validade;
    }

    public function messages()
    {
        $data = $this->question->where('required',1)->with('responses')->orderBy('order')->get();
        $validade= Array();
        foreach($data as $q){
            switch($q->type){
                case 1 :
                    $validade['question_'.$q['id'].'.required'] = 'O campo Questão '.$q['id'].' é de preenchimento obrigatório!' ;
                    break;
                case 2 :
                    $validade['question_'.$q['id'].'.required'] = 'O campo Questão '.$q['id'].' é de preenchimento obrigatório!' ;
                    foreach($q->responses as $r){
                        if($r->type == 2 &&  $r->required == 1){
                            $validade['response_'.$q['id'].'_'.$r['id'].'.required_if'] = 'O '.$r->text.' é de preenchimento obrigatório!' ;
                        }
                    }
                break;
                case 3 :
                    foreach($q->responses as $r){
                        if($r->required == 1 )
                            $validade['response_'.$q['id'].'_'.$r['id'].'.required'] = 'O '.$r->text.' é de preenchimento obrigatório!' ;
                    }

                break;
            }

        }

        return $validade;
    }


}
