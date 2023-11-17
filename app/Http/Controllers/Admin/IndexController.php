<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SelectiveProcess;
use App\Models\Student;
use App\Models\User;

class IndexController extends Controller
{
    private $admin, $student, $selective_process;

    public function __construct(SelectiveProcess $selective_processes, Student $students)
    {
        $this->middleware('auth:admin');
        $this->selective_process = $selective_processes;
        $this->student = $students;
    }

    public function index()
    {
        $selective_process_id = $this->selective_process->current();

        if($selective_process_id){
            $data['open_selective_process'] = 1;
            $data['student'] = $this->student
            ->join('student_selective_processes as ssp', function($join) use ($selective_process_id){
                $join->on('ssp.student_id', 'students.id');
                $join->where('ssp.selective_process_id', $selective_process_id->id);
            })->count();
            $data['notstudent'] = $this->student->notRegistred($selective_process_id)->count();
        }else{
            $data['open_selective_process'] = 0;
            $data['student'] = $this->student->count();
            $data['notstudent'] = $this->student->count();
        }
        $data['selective_process'] = $this->selective_process->count();

        return view('admin.home', compact('data'));
    }

    }
