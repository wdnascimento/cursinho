<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectiveProcess extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'title', 'startdate', 'enddate', 'extramessage', 'instructionurl', 'terms', 'paymentfinaldate'] ;

    public function studentSelectiveProcesses()
    {
        return $this->hasMany(StudentSelectiveProcess::class, 'selective_process_id', 'id');
    }
}
