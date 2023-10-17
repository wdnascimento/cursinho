<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Student\StoreOneStudentRequest;
use App\Http\Requests\Site\Student\StoreOneStudentUpdateRequest;
use App\Http\Requests\Site\Student\StoreTwoStudentRequest;
use App\Models\Question;
use App\Models\SelectiveProcess;
use App\Models\Student;
use App\Models\StudentResponse;
use App\Models\TableCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    private $student, $table_code, $student_id, $registrationstep;

    function __construct(Student $students, TableCode $table_codes)
    {
        $this->student = $students;
        $this->table_code = $table_codes;
        $this->middleware(function ($request, $next) {
            $tmp = $this->student->select('id','registrationstep')->where('user_id',Auth::user()->id)->first();
            $this->student_id = ($tmp) ? $tmp['id'] : null;
            $this->registrationstep = ($tmp) ? $tmp['registrationstep'] : null;
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function create()
    {
        $step = $this->student->getRegistrationStep(Auth::user()->id);
        switch ($step) {
            case 1:
                $preload['flag'] = $this->table_code->select(1);
                $preload['marital_status'] = $this->table_code->select(2);
                $preload['nationality'] = $this->table_code->select(3);
                $preload['color'] = $this->table_code->select(4);
                $preload['sex'] = $this->table_code->select(5);
                $preload['time_work'] = $this->table_code->select(6);
                $preload['place_study'] = $this->table_code->select(7);
                $preload['birthstate'] = $this->table_code->select(8);
                return view('site.student.create',compact('preload','step'));
                break;
            case 2:
                $questions = new Question();
                $preload['questions'] = $questions->with('responses')->get();
                return view('site.student.create',compact('step','preload'));
            break;
            default:
                return redirect()->route('student.form.edit');
            break;
        }


    }

    public function store(StoreOneStudentRequest $request)
    {
        $dataForm = $request->all();
        $dataForm['registrationstep'] = 2;
        $dataForm['user_id'] = Auth::user()->id;
        $insert = $this->student->create($dataForm);

        if($insert){
            return redirect()->route('cadastro');
        }else{
            return back()->withErrors(['Erro no Cadastro']);
        }
    }

    public function storeTwo(StoreTwoStudentRequest $request)
    {
        $dataForm = $request->all();
        $question = new Question();
        $student = $this->student->select('id')->where('user_id', Auth::user()->id)->first();

        if($student){
            $studentResponse = new StudentResponse();

            DB::beginTransaction();

            $data = $question->where('required',1)->with('responses')->orderBy('order')->get();
            foreach($data as $q){
                switch($q->type){
                    case 1 :
                        // @dd($dataForm[''])
                        // id, student_id, response_id, textvalue, optvalue
                        $tmp_data = [
                            'student_id' => $student['id'],
                            'response_id' => $q->id,
                            'optvalue' => $dataForm['question_'.$q->id],
                        ];

                        if(! $studentResponse->create($tmp_data)){
                            return back()->withErrors(['Erro no Cadastro']);
                        }

                        break;
                    case 2 :
                        $tmp_data = [
                            'student_id' => $student['id'],
                            'response_id' => $q->id,
                            'optvalue' => $dataForm['question_'.$q->id],
                        ];
                        $tmp_array=[];
                        foreach ($dataForm as $chave => $valor) {
                            if (strpos($chave,"response_".$q->id) !== false) {
                                $tmp = explode("_", $chave);
                                if(sizeof($tmp) > 2){
                                    $tmp_array[$tmp[2]]=$valor;
                                }
                            }
                        }
                        $json = ($tmp_array) ? json_encode($tmp_array) : '' ;

                        $tmp_data['textvalue'] =$json;

                        if(! $studentResponse->create($tmp_data)){
                            return back()->withErrors(['Erro no Cadastro']);
                        }
                    break;
                    case 3 :
                        $tmp_data = [
                            'student_id' => $student['id'],
                            'response_id' => $q->id,
                            'optvalue' => null,
                        ];
                        $tmp_array=[];
                        foreach ($dataForm as $chave => $valor) {
                            if (strpos($chave,"response_".$q->id) !== false) {
                                $tmp = explode("_", $chave);
                                if(sizeof($tmp) > 2){
                                    $tmp_array[$tmp[2]]=$valor;
                                }
                            }
                        }
                        $json = ($tmp_array) ? json_encode($tmp_array) : '' ;

                        $tmp_data['textvalue'] =$json;

                        if(! $studentResponse->create($tmp_data)){
                            return back()->withErrors(['Erro no Cadastro']);
                        }
                    break;
                }
            }


            $step['registrationstep'] = 99;
            if(!$this->student->find($student['id'])->update($step)){
                return back()->withErrors(['Erro no Cadastro']);
            }
            DB::commit();
        }
        return redirect()->route('student.form.edit',3);
    }


    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student, $step = 1)
    {
        if($this->student_id == null || $this->registrationstep != 99){
            return redirect()->route('student.form');
        }



        switch ($step) {
            case 1:
                $preload['flag'] = $this->table_code->select(1);
                $preload['marital_status'] = $this->table_code->select(2);
                $preload['nationality'] = $this->table_code->select(3);
                $preload['color'] = $this->table_code->select(4);
                $preload['sex'] = $this->table_code->select(5);
                $preload['time_work'] = $this->table_code->select(6);
                $preload['place_study'] = $this->table_code->select(7);
                $preload['birthstate'] = $this->table_code->select(8);
                $data = $this->student->where('user_id',Auth::user()->id)->first();
                return view('site.student.edit',compact('preload','step', 'data'));
            break;
            case 2:
                $questions = new Question();
                $preload['questions'] = $questions->with('responses')->get();
                $responses = new StudentResponse();
                // id, student_id, response_id, textvalue, optvalue, created_at, updated_at
                $data = $responses->select('response_id','textvalue','optvalue')->where('student_id',$this->student_id)->get();
                foreach($data as $i => $v){
                    $tmp[$v['response_id']]['textvalue']= $v['textvalue'];
                    $tmp[$v['response_id']]['optvalue']= $v['optvalue'];
                }
                $data = $tmp;
                $data['student_id'] = $this->student_id;

                $selective_processes = new SelectiveProcess();
                $data['selective_processes'] = $selective_processes
                                    ->where('startdate','<=',\Carbon\Carbon::now())
                                    ->Where('enddate','>=',\Carbon\Carbon::now())
                                    ->with('studentSelectiveProcesses')
                                    ->first();

                return view('site.student.edit',compact('preload','step', 'data'));
            break;
            default:
                $selective_processes = new SelectiveProcess();
                $data['selective_processes'] = $selective_processes
                                    ->where('startdate','<=',\Carbon\Carbon::now())
                                    ->Where('enddate','>=',\Carbon\Carbon::now())
                                    ->with('studentSelectiveProcesses')
                                    ->first();
                return view('site.student.edit',compact('step','data'));
            break;
        }
    }

    public function update($id, StoreOneStudentUpdateRequest $request)
    {
        $dataForm = $request->all();
        $update = $this->student->find($this->student_id)->update($dataForm);
        if($update){
            return redirect()->route('student.form.edit',2);
        }else{
            return back()->withErrors(['Erro no Cadastro']);
        }
    }

    public function updateTwo($id, StoreTwoStudentRequest $request)
    {

        $dataForm = $request->all();
        $question = new Question();
        $studentResponse = new StudentResponse();

        DB::beginTransaction();

        $data = $question->where('required',1)->with('responses')->orderBy('order')->get();
        foreach($data as $q){
            switch($q->type){
                case 1 :
                    // @dd($dataForm[''])
                    // id, student_id, response_id, textvalue, optvalue

                    $tmp_data = [
                        'optvalue' => $dataForm['question_'.$q->id],
                    ];

                    if(! $studentResponse->where('response_id',$q->id)->where('student_id',$this->student_id)->update($tmp_data)){
                        return back()->withErrors(['Erro ao atualizar o Cadastro']);
                    }
                break;
                case 2 :
                    $tmp_data = [
                        'optvalue' => $dataForm['question_'.$q->id],
                    ];
                    $tmp_array=[];
                    foreach ($dataForm as $chave => $valor) {
                        if (strpos($chave,"response_".$q->id) !== false) {
                            $tmp = explode("_", $chave);
                            if(sizeof($tmp) > 2){
                                $tmp_array[$tmp[2]]=$valor;
                            }
                        }
                    }
                    $json = ($tmp_array) ? json_encode($tmp_array) : '' ;

                    $tmp_data['textvalue'] =$json;

                    if(! $studentResponse->where('response_id',$q->id)->where('student_id',$this->student_id)->update($tmp_data)){
                        return back()->withErrors(['Erro no Cadastro']);
                    }
                break;
                case 3 :
                    $tmp_data = [
                        'optvalue' => null,
                    ];
                    $tmp_array=[];
                    foreach ($dataForm as $chave => $valor) {
                        if (strpos($chave,"response_".$q->id) !== false) {
                            $tmp = explode("_", $chave);
                            if(sizeof($tmp) > 2){
                                $tmp_array[$tmp[2]]=$valor;
                            }
                        }
                    }
                    $json = ($tmp_array) ? json_encode($tmp_array) : '' ;

                    $tmp_data['textvalue'] =$json;

                    if(! $studentResponse->where('response_id',$q->id)->where('student_id',$this->student_id)->update($tmp_data)){
                        return back()->withErrors(['Erro no Cadastro']);
                    }
                break;
            }
        }

        DB::commit();
        return redirect()->route('cadastro');

    }

}
