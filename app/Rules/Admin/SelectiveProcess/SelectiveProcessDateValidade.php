<?php

namespace App\Rules\Admin\SelectiveProcess;

use App\Models\SelectiveProcess;
use Illuminate\Contracts\Validation\Rule;

class SelectiveProcessDateValidade implements Rule
{
    protected $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }
    public function passes($attribute, $value)
    {
        $data = new SelectiveProcess();
        $data = SelectiveProcess::where('startdate', '<=', $value)
            ->where('enddate', '>=', $value)
            ->where('id', '<>', $this->id)
            ->first();

        return $data ? false : true;
    }

    public function message()
    {
        return 'Na data :attribute já existe um processo seletivo.' ;
    }
}
