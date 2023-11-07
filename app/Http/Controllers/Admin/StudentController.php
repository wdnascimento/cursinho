<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SelectiveProcess;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $student, $params, $preload, $data , $paginate = 50, $selective_process, $selective_process_id;

    public function __construct(Student $students, SelectiveProcess $selective_processes)
    {
        $this->student = $students;
        $this->selective_process = $selective_processes;

        // Default values
        $this->params['titulo']='Estudantes';
        $this->params['main_route']='admin.student';

    }

    public function index(Request $request)
    {
        // PARAMS DEFAULT
        $this->params['subtitulo']='Estudantes Inscritos';
        $this->params['arvore'][0] = [
                    'url' => 'admin/student',
                    'titulo' => 'Estudantes'
        ];

        $searchFields = [];

        // REQUEST
        $dataForm = $request->only('selective_process_id','social_name','cpf');
        // dd($selective_process);
        $preload['selective_process_id'] = $this->selective_process->select('id','title')->get()->pluck('title','id');

        if(isset($dataForm['selective_process_id']) && (intval($dataForm['selective_process_id']))){
            $this->selective_process_id = intval($dataForm['selective_process_id']);
        }else{
            $this->selective_process_id = array_key_first($preload['selective_process_id']->toArray());
        }
        if($this->selective_process_id){
            $preload['selective_process']= $this->selective_process_id;
            if(isset($dataForm['social_name']) || isset($dataForm['cpf'])){
                $social_name = (isset($dataForm['social_name'])) ? $dataForm['social_name'] : '';
                $cpf = (isset($dataForm['cpf'])) ? $dataForm['cpf'] : '';
                $data = $this->student  ->select('students.*','ssp.payment')
                                        ->join('student_selective_processes as ssp','ssp.student_id', 'students.id')
                                        ->where('ssp.selective_process_id', $this->selective_process_id)
                                        ->where('social_name','LIKE','%'.$social_name.'%')
                                        ->where('cpf','LIKE','%'.$cpf.'%')
                                        ->paginate($this->paginate);
                $searchFields['social_name']= $social_name ;
                $searchFields['cpf']= $cpf ;
            }else{
                $data = $this->student  ->select('students.*','ssp.payment')
                                        ->join('student_selective_processes as ssp', function($join){
                                            $join->on('ssp.student_id', 'students.id');
                                            $join->where('ssp.selective_process_id', $this->selective_process_id);
                                        })
                                        ->paginate($this->paginate);
                $searchFields['name']= '';
                $searchFields['cpf']= '' ;
            }
        }else{
            $data = null;
        }
        $params = $this->params;
        $preload['notRegistred'] = 0;
        return view('admin.student.index',compact('params','data','preload','searchFields'));
    }

    public function notRegistred(Request $request)
    {
        // PARAMS DEFAULT
        $this->params['subtitulo']='Estudantes Não Inscritos ';
        $this->params['arvore'][0] = [
                    'url' => 'admin/student',
                    'titulo' => 'Estudantes'
        ];

        $searchFields = [];

        // REQUEST
        $dataForm = $request->only('selective_process_id','social_name','cpf');
        // dd($selective_process);
        $preload['selective_process_id'] = $this->selective_process->select('id','title')->get()->pluck('title','id');

        if(isset($dataForm['selective_process_id']) && (intval($dataForm['selective_process_id']))){
            $this->selective_process_id = intval($dataForm['selective_process_id']);
        }else{
            $this->selective_process_id = array_key_first($preload['selective_process_id']->toArray());
        }
        if($this->selective_process_id){
            $preload['selective_process']= $this->selective_process_id;
            if(isset($dataForm['social_name']) || isset($dataForm['cpf'])){
                $social_name = (isset($dataForm['social_name'])) ? $dataForm['social_name'] : '';
                $cpf = (isset($dataForm['cpf'])) ? $dataForm['cpf'] : '';
                $data = $this->student  ->notRegistred($this->selective_process_id)
                                        ->where('social_name','LIKE','%'.$social_name.'%')
                                        ->where('cpf','LIKE','%'.$cpf.'%')
                                        ->paginate($this->paginate);
                $searchFields['social_name']= $social_name ;
                $searchFields['cpf']= $cpf ;
            }else{
                $data = $this->student  ->notRegistred($this->selective_process_id)
                                        ->paginate($this->paginate);
                $searchFields['name']= '';
                $searchFields['cpf']= '' ;
            }
        }else{
            $data = null;
        }
        $params = $this->params;
        $preload['notRegistred'] = 1;
        return view('admin.student.index',compact('params','data','preload','searchFields'));




        $params = $this->params;

        return view('admin.student.index',compact('params','data'));
    }
}
