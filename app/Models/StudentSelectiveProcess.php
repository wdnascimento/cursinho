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

    public function hasRegistration($selective_process_id, $student_id){
        $tmp = $this->select('id')->where('student_id',$student_id)->where('selective_process_id', $selective_process_id)->first();
        return ($tmp) ? $tmp['id'] : NULL;
    }
}
