<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSelectiveProcess extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'selective_process_id', 'payment', 'agreeterms' ,  'date'];

    public function selectiveProcess()
    {
        return $this->belongsTo(SelectiveProcess::class, 'selective_process_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }


    public function paymentLogs()
    {
        return $this->hasMany(PaymentLog::class)->orderBy('date','desc');
    }
}
