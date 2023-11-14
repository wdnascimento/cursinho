<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Student\PaymentUpdateRequest;
use App\Models\PaymentLog;
use App\Models\Question;
use App\Models\SelectiveProcess;
use App\Models\Student;
use App\Models\StudentResponse;
use App\Models\StudentSelectiveProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    protected $student, $selective_process;
    public function __construct(Student $students, StudentSelectiveProcess $selective_processes)
    {
        $this->student = $students;
        $this->selective_process = $selective_processes;
    }

    public function index()
    {
        return $this->student->get();
    }

    public function studentPayment($student_id , $selective_process_id)
    {
        return $this    ->selective_process
                        ->select('id', 'payment')
                        ->where('student_id',$student_id)
                        ->where('selective_process_id',$selective_process_id)
                        ->with('paymentLogs')
                        ->first();
    }



    public function store(PaymentUpdateRequest $request)
    {
        $data = $request->only('id', 'payment');

        if($this->selective_process->find($data['id'])->update(['payment' => $data['payment']])){
            // student_selective_process_id, payment, date, user
            $log = new PaymentLog();
            $tmp = [];
            $tmp['student_selective_process_id'] = $data['id'];
            $tmp['payment'] =  $data['payment'];
            $tmp['user'] = Auth::user()->name;
            if($log->create($tmp)){
                return true;
            }
            return false;
        }
        return false;
    }

    public function showQuestions(){
        $questions = new Question();
        $data['questions'] = $questions->with('responses')->get();
        return $data;
    }


    public function show($student_id , $selective_process_id)
    {
        $responses = new StudentResponse();
        $data = $responses  ->select('response_id','textvalue','optvalue')
                            ->where('student_id',$student_id)
                            ->where('selective_process_id',$selective_process_id)
                            ->get();
        foreach($data as $i => $v){
            $tmp[$v['response_id']]['textvalue']= $v['textvalue'];
            $tmp[$v['response_id']]['optvalue']= $v['optvalue'];
        }
        $data = $tmp;

        $data['student'] = $this->student->find($student_id);

        $selective_processes = new SelectiveProcess();
        $data['selective_processes'] = $selective_processes
                            ->where('startdate','<=',\Carbon\Carbon::now())
                            ->Where('enddate','>=',\Carbon\Carbon::now())
                            ->with('studentSelectiveProcesses')
                            ->first();

        return $data;
    }

}
