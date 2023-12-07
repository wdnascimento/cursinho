<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensalament extends Model
{
    use HasFactory;
    protected $fillable = ['id','selective_process_id', 'title', 'url'];

    public function selectiveProcess()
    {
        return $this->belongsTo(SelectiveProcess::class, 'selective_process_id');
    }


}
