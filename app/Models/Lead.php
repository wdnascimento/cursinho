<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = ['id','name', 'email', 'phone','course','created_at'];

    public $desc_fill =
        [
            'name' => 'Nome',
            'email' => 'E-mail',
            'phone' => 'Telefone',
            'course' => 'Curso Pretendido',
            'created_at' => 'Data Cadastro',
        ];
}
