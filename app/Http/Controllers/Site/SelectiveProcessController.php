<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\SelectiveProcess\SelectiveProcessRequest;
use App\Models\Student;
use App\Models\StudentSelectiveProcess;
use Illuminate\Support\Facades\Auth;

class SelectiveProcessController extends Controller
{
    protected $selective_process;
    public function __construct(StudentSelectiveProcess $selective_processes)
    {
        $this->selective_process = $selective_processes;
    }

    public function store(SelectiveProcessRequest $request)
    {
        $dataForm = $request->all();
        $student = new Student();
        $tmp = $student->select('id')->where('user_id',Auth::user()->id)->first();
        $student_id = ($tmp) ? $tmp['id'] : null;

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }


        $dataForm['student_id'] = $student_id;
        $dataForm['date'] = \Carbon\Carbon::now();
        $dataForm['payment'] = 'Aguardando Pagamento.';
        $dataForm['agreeterms'] = "Os termos foram aceitos às ".$dataForm['date']." sob o IP.: ". $_SERVER['REMOTE_ADDR'];
        // id, student_id, selective_process_id, payment, agreeterms, date, created_at, updated_at
        $insert = $this->selective_process->create($dataForm);
        if($insert){
            return redirect()->route('student.form.edit',3);
        }else{
            return back()->withErrors(['Erro no Cadastro']);
        }
    }

}
