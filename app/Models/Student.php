<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Student extends Model
{
    use HasFactory;

    protected $fillable =
        [   'user_id', 'social_name', 'rg', 'cpf', 'marital_status', 'nationality', 'color', 'birthdate'
            , 'birthcity', 'birthstate', 'housephone', 'officephone', 'cellphone', 'messagephone'
            , 'sex', 'cep', 'logradouro', 'bairro', 'numero', 'localidade', 'uf', 'complemento'
            , 'father', 'mother', 'worker', 'time_work', 'saturday_work', 'saturday_time', 'place_study'
            , 'specialneed', 'descriptionneed', 'quota', 'registrationstep'
        ];

    public function getStep(){
        $step = $this   ->select('registrationstep')
                        ->where('user_id',Auth::user()->id)
                        ->first();
        if($step != null){
            $step = $step['registrationstep'] + 1;
        }else{
            $step = 1;
        }
        Session::put('step',$step);
        return $step;
    }

}

