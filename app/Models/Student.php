<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function getRegistrationStep($user_id){
        $step = $this   ->select('registrationstep')
                        ->where('user_id',$user_id)
                        ->first();
        return ($step == null) ? 1 : $step['registrationstep'];
    }

    public function responses()
    {
        return $this->belongsToMany(Response::class, 'student_responses', 'student_id', 'response_id');
    }

}

