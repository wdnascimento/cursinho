<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SelectiveProcess extends Model
{
    use HasFactory;

    // id, year, title, startdate, enddate, extramessage, instructionurl, terms, paymentfinaldate, taxvalue

    protected $fillable = ['year', 'title', 'startdate', 'enddate', 'extramessage', 'instructionurl', 'terms', 'paymentfinaldate', 'taxvalue'] ;

    public function studentSelectiveProcesses()
    {
        $student = new Student();
        $tmp = $student->select('id','registrationstep')->where('user_id',Auth::user()->id)->first();
        $student_id = ($tmp) ? $tmp['id'] : null;
        return $this->hasMany(StudentSelectiveProcess::class, 'selective_process_id', 'id')->where('student_id',$student_id);
    }

    public function activeSelectiveProcess(){
        return $this->where('startdate','<=',\Carbon\Carbon::now())
                    ->Where('enddate','>=',\Carbon\Carbon::now())
                    ->first();
    }
}
