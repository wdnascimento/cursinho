<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillables = ['question_id', 'text', 'type', 'class',  'required'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
