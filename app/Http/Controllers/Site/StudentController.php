<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Student\StoreStudentRequest;
use App\Http\Requests\Site\Student\StoreTwoStudentRequest;
use App\Models\Question;
use App\Models\Student;
use App\Models\TableCode;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    private $student, $table_code;

    function __construct(Student $students, TableCode $table_codes)
    {
        $this->student = $students;
        $this->table_code = $table_codes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Session::has('step')){
            $step = $this->student->getStep();
        }else{
            $step = Session::get('step');
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
                return view('site.student.create',compact('preload','step'));
                break;
                case 2:
                    $questions = new Question();
                    $data['questions'] = $questions->with('responses')->get();
                return view('site.student.create',compact('step','data'));
            break;
            case 3:
                break;
            default:
            break;
        }


    }

    public function store(StoreStudentRequest $request)
    {
        @dd($request);
        $dataForm = $request->all();
        $dataForm['registrationstep'] = 1;
        $dataForm['user_id'] = Auth::user()->id;
        $insert = $this->student->create($dataForm);

        if($insert){

            return redirect()->route('cadastro');
        }else{
            return redirect()->route('index');
        }
    }

    public function storeTwo(StoreTwoStudentRequest $request)
    {
        $dataForm = $request->all();

        $data = $this->question->where('required',1)->with('responses')->orderBy('order')->get();
        foreach($data as $q){
            switch($q->type){
                case 1 :
                    $validade['question_'.$q['id'].'.required'] = 'O campo Questão '.$q['id'].' é de preenchimento obrigatório!' ;
                    break;
                case 2 :
                    $validade['question_'.$q['id'].'.required'] = 'O campo Questão '.$q['id'].' é de preenchimento obrigatório!' ;
                    foreach($q->responses as $r){
                        if($r->type == 2 &&  $r->required == 1){
                            $validade['response_'.$q['id'].'_'.$r['id'].'.required_if'] = 'O '.$r->text.' é de preenchimento obrigatório!' ;
                        }
                    }
                break;
                case 3 :
                    foreach($q->responses as $r){
                        if($r->required == 1 )
                            $validade['response_'.$q['id'].'_'.$r['id'].'.required'] = 'O '.$r->text.' é de preenchimento obrigatório!' ;
                    }

                break;
            }

        }


        $dataForm['registrationstep'] = 1;
        $dataForm['user_id'] = Auth::user()->id;
        $insert = $this->student->create($dataForm);

        if($insert){

            return redirect()->route('cadastro');
        }else{
            return redirect()->route('index');
        }
    }


    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student)
    {
        //
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    public function destroy(Student $student)
    {
        //
    }
}
