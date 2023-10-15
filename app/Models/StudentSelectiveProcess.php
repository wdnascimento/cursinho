<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSelectiveProcess extends Model
{
    use HasFactory;

    // id, student_id, selective_process_id, payment, date, created_at, updated_at
    // id, student_id, selective_process_id, payment, date, created_at, updated_at
    protected $fillable = ['student_id', 'selective_process_id', 'payment', 'agreeterms' ,  'date'];

    public function selectiveProcess()
    {
        return $this->belongsTo(SelectiveProcess::class, 'selective_process_id', 'id');
    }
}
