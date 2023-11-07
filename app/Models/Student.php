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
            , 'specialneed', 'desc_specialneed', 'descriptionneed', 'quota', 'desc_quota', 'registrationstep'
        ];

    protected $appends = ['desc_specialneed','desc_quota'];

    public function getDescSpecialneedAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(1,$this->specialneed);
    }

    public function getDescQuotaAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(1,$this->quota);
    }

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

    public function studentSelectiveProcess(){
        return $this->hasMany(StudentSelectiveProcess::class);
    }

    public function notRegistred($selective_process_id)
    {
        return  $this->whereDoesntHave('studentSelectiveProcess', function ($query)  use ($selective_process_id) {
            $query->where('selective_process_id',$selective_process_id);
        });
    }


}

