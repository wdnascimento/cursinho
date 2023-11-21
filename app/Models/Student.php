<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable =
        [   'user_id', 'social_name', 'rg', 'cpf', 'marital_status', 'desc_marital_status' , 'nationality', 'desc_nationality'
            , 'color', 'desc_color' , 'birthdate', 'desc_birthdate' , 'birthcity', 'birthstate', 'desc_birthstate' , 'housephone'
            , 'officephone', 'cellphone', 'messagephone' , 'sex' , 'desc_sex' , 'cep', 'logradouro', 'bairro', 'numero'
            , 'localidade', 'uf', 'complemento' , 'father', 'mother', 'worker', 'desc_worker' , 'time_work' , 'desc_time_work'
            , 'saturday_work', 'desc_saturday_work' , 'saturday_time', 'desc_saturday_time', 'place_study' , 'desc_place_study'
            , 'specialneed', 'desc_specialneed', 'descriptionneed', 'quota', 'desc_quota', 'registrationstep'
        ];

    public $desc_fill =
        [
            'id' => 'Nº Inscrição',
            'social_name' => 'Nome Social',
            'rg' => 'RG',
            'cpf' => 'CPF',
            'desc_marital_status' => 'Estado Civil',
            'desc_nationality' => 'Nacionalidade',
            'desc_color' => 'Cor',
            'desc_birthdate' => 'Data de Nascimento',
            'birthcity' => 'Cidade de Nascimento',
            'desc_birthstate' => 'Estado',
            'housephone' => 'Tel. Residêncial',
            'officephone' => 'Tel. Comercial',
            'cellphone' => 'Celular',
            'messagephone' => 'Tel. Recado',
            'desc_sex' => 'Sexo',
            'cep' => 'CEP',
            'logradouro' => 'Rua',
            'bairro' => 'Bairro',
            'numero' => 'Número',
            'localidade' => 'Cidade',
            'uf' => 'Estado',
            'complemento' => 'Complemento',
            'father' => 'Nome do Pai',
            'mother' => 'Nome da Mãe',
            'desc_worker' => 'Trabalha',
            'desc_time_work' => 'Horario de Trabalho',
            'desc_saturday_work' => 'Trabalha Sábado',
            'desc_saturday_time' => 'Horário',
            'desc_place_study' => 'Lugar de Estudo',
            'desc_specialneed' => 'Atendimento Especial?',
            'descriptionneed' => 'Qual',
            'desc_quota' => 'Cotista',
        ];

    protected $appends = ['desc_specialneed','desc_quota','desc_marital_status', 'desc_nationality' ,'desc_color' ,'desc_sex' ,'desc_time_work'
    ,'desc_place_study', 'desc_birthstate', 'desc_worker', 'desc_saturday_work', 'desc_saturday_time', 'desc_birthdate'];

    // WORKER
    public function getDescWorkerAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(1,$this->worker);
    }

    // SATURDAY WORKER
    public function getDescSaturdayWorkAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(1,$this->saturday_work);
    }

    // SATURDAY TIME
    public function getDescSaturdayTimeAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(6,$this->saturday_time);
    }


    // SPECIAL NEED
    public function getDescSpecialneedAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(1,$this->specialneed);
    }

    // QUOTA
    public function getDescQuotaAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(1,$this->quota);
    }

    // MARITAL_STATUS
    public function getDescMaritalStatusAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(2,$this->marital_status);
    }

    // NATIONALITY
    public function getDescNationalityAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(3,$this->nationality);
    }

    // COLOR
    public function getDescColorAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(4,$this->color);
    }

    // SEX
    public function getDescSexAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(5,$this->sex);
    }

    // TIME_WORK
    public function getDescTimeWorkAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(6,$this->time_work);
    }

    // PLACE_STUDY
    public function getDescPlaceStudyAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(7,$this->place_study);
    }

    // BIRTHSTATE
    public function getDescBirthstateAttribute()
    {
        $table = new TableCode();
        return $table->getDescricaoById(8,$this->birthstate);
    }

    // BIRTHDATE
    public function getDescBirthdateAttribute()
    {
        return \Carbon\Carbon::parse($this->birthdate)->format('d/m/Y');
    }

    // REGISTRATION STEP
    public function getRegistrationStep($user_id){
        $step = $this   ->select('registrationstep')
        ->where('user_id',$user_id)
        ->first();
        return ($step == null) ? 1 : $step['registrationstep'];
    }

    // RESPONSE
    public function responses()
    {
        return $this->belongsToMany(Response::class, 'student_responses', 'student_id', 'response_id');
    }

    // STUDENT SELECTIVE PROCESS
    public function studentSelectiveProcess(){
        return $this->hasMany(StudentSelectiveProcess::class);
    }

    // NOT REGISTRATION
    public function notRegistred($selective_process_id)
    {
        return  $this->whereDoesntHave('studentSelectiveProcess', function ($query)  use ($selective_process_id) {
            $query->where('selective_process_id',$selective_process_id);
        });
    }

    // STUDENT RESPONSES
    public function studentResponses(){
        // id, student_id, response_id, selective_process_id, textvalue, optvalue, created_at, updated_at
        return $this->hasMany(StudentResponse::class);
    }
}

