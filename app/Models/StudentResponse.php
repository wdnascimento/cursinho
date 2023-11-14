<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResponse extends Model
{
    use HasFactory;
    // id, student_id, response_id, textvalue, optvalue, created_at, updated_at
    protected $fillable =['student_id', 'response_id', 'textvalue', 'optvalue'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

}
