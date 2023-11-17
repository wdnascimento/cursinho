<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\SelectiveProcess;
use App\Models\Student;
use App\Models\StudentResponse;
use App\Models\StudentSelectiveProcess;
use App\Models\TableCode;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;

use DB;

class StudentController extends Controller
{
    private $student, $params, $preload, $data , $paginate = 50, $selective_process, $selective_process_id;

    public function __construct(Student $students, SelectiveProcess $selective_processes, TableCode $table_codes)
    {
        $this->student = $students;
        $this->selective_process = $selective_processes;
        $this->table_code = $table_codes;

        // Default values
        $this->params['titulo']='Estudantes';
        $this->params['main_route']='admin.student';
        $this->style['head'] = [
                                'alignment' => [
                                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                                    'vertical' => Alignment::VERTICAL_CENTER,
                                ],
                                'font' => [
                                    'bold' => true,
                                    'size' => 14,
                                    'color' => ['rgb' => 'FFFFFF'],
                                ],
                                'fill' => [
                                    'fillType' => Fill::FILL_SOLID,
                                    'startColor' => ['rgb' => '000000'],
                                ],
                                'borders' => [
                                    'allBorders' => [
                                        'borderStyle' => Border::BORDER_THIN,
                                        'color' => ['rgb' => '000000'],
                                    ],
                                ],
                            ];
        $this->style['title'] = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '808080'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => 'FFFFFF'],
            ],
        ];

        $this->style['subtitle'] = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => '000000'],
            ],
        ];

        $this->style['text'] = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => false,
                'size' => 12,
                'color' => ['rgb' => '000000'],
            ],
        ];
        $this->style['text_selected'] = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_LEFT,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '000000'],
            ],
            'font' => [
                'bold' => false,
                'size' => 12,
                'color' => ['rgb' => 'FFFFFF'],
            ],
        ];

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
                                        ->join('student_selective_processes as ssp', function($join){
                                            $join->on('ssp.student_id', 'students.id');
                                            $join->where('ssp.selective_process_id', $this->selective_process_id);
                                        })
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

    public function print($student_id , $selective_process_id){

        $questions = new Question();
        $preload['questions'] = $questions->with('responses')->get();
        $responses = new StudentResponse();
        // id, student_id, response_id, textvalue, optvalue, created_at, updated_at
        $data = $responses->select('response_id','textvalue','optvalue')->where('student_id',$student_id)->get();
        foreach($data as $i => $v){
            $tmp[$v['response_id']]['textvalue']= $v['textvalue'];
            $tmp[$v['response_id']]['optvalue']= $v['optvalue'];
        }


        $data = $tmp;

        $data['student_id'] = $student_id;

        $data['student'] = $this->student->where('id',$student_id)->first();

        $selective_processes = new SelectiveProcess();
        $data['selective_processes'] = $selective_processes
                            ->where('startdate','<=',\Carbon\Carbon::now())
                            ->Where('enddate','>=',\Carbon\Carbon::now())
                            ->with('studentSelectiveProcesses')
                            ->first();
        return view('admin._global.print',compact('data','preload'));
        // return PDF::loadView('admin._global.print',compact('data'))->setPaper('A4', 'portrait')->download('inscricao.pdf','_blank');
    }

    public function makexls($student_id , $selective_process_id){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // GET DATA
        $student = $this->student->find($student_id)->toArray();

        $selective_processes = new SelectiveProcess();
        $selective_process= $selective_processes->find($selective_process_id)->toArray();

        // Adicione seus dados ao objeto $sheet
        $sheet->mergeCells('A1:B1');
        $sheet->getStyle('A1:B1')->applyFromArray($this->style['head']);
        $sheet->setCellValue('A1', $selective_process['title'].' - ALUNO: '.$student['id'].' - '.$student['social_name']);
        $sheet->setCellValue('A2', 'Pergunta');
        $sheet->getStyle('A2')->applyFromArray($this->style['title']);
        $sheet->setCellValue('B2', 'Resposta');
        $sheet->getStyle('B2')->applyFromArray($this->style['title']);

        // ------------------------------
        // FORMULARIO
        // ------------------------------

        $row = 3; // Começa da linha 2
        $description = $this->student->desc_fill;

        foreach ($student as $key => $value) {
            if(isset($description[$key]) ){
                $sheet->setCellValue('A' . $row, $description[$key]);
                $sheet->getStyle('A' . $row)->applyFromArray($this->style['subtitle']);
                $sheet->setCellValue('B' . $row, $value);
                $sheet->getStyle('B' . $row)->applyFromArray($this->style['text']);
                $row++;
            }
        }
        // GERANDO O ARQUIVO

        // ------------------------------
        // QUESTIONÁRIO
        // ------------------------------

        // SKIP A LINE
        $row++;
        $sheet->mergeCells('A'.$row.':B'.$row);
        $sheet->getStyle('A'.$row.':B'.$row)->applyFromArray($this->style['head']);
        $sheet->setCellValue('A'.$row, 'Questionário');
        $row++;

        $sheet->setCellValue('A'.$row, 'Pergunta');
        $sheet->getStyle('A'.$row)->applyFromArray($this->style['title']);
        $sheet->setCellValue('B'.$row, 'Resposta');
        $sheet->getStyle('B'.$row)->applyFromArray($this->style['title']);
        $row++;


        $questions = new Question();
        $question = $questions->with('responses')->orderBy('order')->get();

        $responses = new StudentResponse();
        // id, student_id, response_id, textvalue, optvalue, created_at, updated_at
        $data = $responses  ->select('response_id','textvalue','optvalue')
                            ->where('student_id',$student_id)
                            ->where('selective_process_id',$selective_process_id)
                            ->get();
        foreach($data as $v){
            $tmp[$v['response_id']]['textvalue']= $v['textvalue'];
            $tmp[$v['response_id']]['optvalue']= $v['optvalue'];
        }

        $data = $tmp;

        foreach ($question as $item){
            switch($item->type){
                case 1 :
                    $sheet->setCellValue('A' . $row, $item->order." - ".$item->text);
                    $sheet->getStyle('A' . $row)->applyFromArray($this->style['subtitle']);
                    foreach ($item->responses as $options ){
                        $optvalue = ($options->id == $data[$item->id]["optvalue"]) ? true : false;
                        $sheet->setCellValue('B' . $row, $options->text);
                        if($optvalue){
                            $sheet->getStyle('B' . $row)->applyFromArray($this->style['text_selected']);
                        }else{
                            $sheet->getStyle('B' . $row)->applyFromArray($this->style['text']);
                        }
                        $row++;
                    }
                break;
                case 2 :
                    $sheet->setCellValue('A' . $row, $item->order." - ".$item->text);
                    $sheet->getStyle('A' . $row)->applyFromArray($this->style['subtitle']);
                    foreach ($item->responses as $options){
                        if($options->type != 2){
                            $sheet->setCellValue('B' . $row, $options->text);
                            $optvalue = ($data[$item->id]["optvalue"] ==  $options->value) ? true : false;
                            if($optvalue){
                                $sheet->getStyle('B' . $row)->applyFromArray($this->style['text_selected']);
                            }else{
                                $sheet->getStyle('B' . $row)->applyFromArray($this->style['text']);
                            }
                            $row++;
                        }
                    }
                    foreach ($item->responses as $options ){
                        if($options->type == 2){
                            $tmp = json_decode($data[$item->id]["textvalue"],true);
                            $textvalue = (is_array($tmp) && isset($tmp[$options->id])) ? $tmp[$options->id] : '';
                            if($textvalue != ''){
                                $sheet->setCellValue('B' . $row, $options->text .': '.$textvalue );
                                $sheet->getStyle('B' . $row)->applyFromArray($this->style['text_selected']);
                                $row++;
                            }
                        }

                    }
                    break;
                    case 3 :
                        $sheet->setCellValue('A' . $row, $item->order." - ".$item->text);
                        $sheet->getStyle('A' . $row)->applyFromArray($this->style['subtitle']);
                        foreach ($item->responses as $options){
                            if($options->type == 2){
                                $tmp = json_decode($data[$item->id]["textvalue"],true);
                                $textvalue = (is_array($tmp) && isset($tmp[$options->id])) ? $tmp[$options->id] : '';
                                $sheet->setCellValue('B' . $row, $options->text .': '.$textvalue );
                                $sheet->getStyle('B' . $row)->applyFromArray($this->style['text']);
                                $row++;
                            }
                        }
                    break;
                }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'INSCRICAO_'.$student_id.'.xlsx';

        // Cabeçalhos para definir o tipo de conteúdo e o nome do arquivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }


    public function reportxls(Request $request){

        // REQUEST
        $tmpForm = $request->only('report_selective_process_id','report_social_name','report_cpf');

        $dataForm['selective_process_id'] = $tmpForm['report_selective_process_id'];
        $dataForm['social_name'] = $tmpForm['report_social_name'];
        $dataForm['cpf'] = $tmpForm['report_cpf'];

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
                $data = $this->student  ->select('students.*')
                                        ->join('student_selective_processes as ssp', function($join){
                                            $join->on('ssp.student_id', 'students.id');
                                            $join->where('ssp.selective_process_id', $this->selective_process_id);
                                        })
                                        ->where('social_name','LIKE','%'.$social_name.'%')
                                        ->where('cpf','LIKE','%'.$cpf.'%')
                                        ->get();
            }else{
                $data = $this->student  ->select('students.*')
                                        ->join('student_selective_processes as ssp', function($join){
                                            $join->on('ssp.student_id', 'students.id');
                                            $join->where('ssp.selective_process_id', $this->selective_process_id);
                                        })
                                        ->get();
            }
        }else{
            exit;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $description = $this->student->desc_fill;
        $row = 1;

        foreach($data as $i => $v){
            $tmp = $v->toArray();
            $column = 'A';
            foreach ($tmp as $key => $value) {
                if(isset($description[$key]) ){
                    if($row === 1){
                        $sheet->setCellValue($column.$row, $description[$key]);
                        $sheet->getStyle($column.$row)->applyFromArray($this->style['title']);
                        $sheet->setCellValue($column.($row+1), $value);
                        $sheet->getStyle($column.($row+1))->applyFromArray($this->style['text']);
                    }else{
                        $sheet->setCellValue($column.$row, $value);
                        $sheet->getStyle($column.$row)->applyFromArray($this->style['text']);
                    }
                    $column++;
                }
            }
            if($row === 1){
                $row++;
            }
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'INSCRICOES.xlsx';

        // Cabeçalhos para definir o tipo de conteúdo e o nome do arquivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function reportxlsnotstudent(Request $request){

        // REQUEST
        $tmpForm = $request->only('report_selective_process_id','report_social_name','report_cpf');

        $dataForm['selective_process_id'] = $tmpForm['report_selective_process_id'];
        $dataForm['social_name'] = $tmpForm['report_social_name'];
        $dataForm['cpf'] = $tmpForm['report_cpf'];

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
                                        ->get();
            }else{
                $data = $this->student  ->notRegistred($this->selective_process_id)
                                        ->get();
            }
        }else{
            exit;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $description = $this->student->desc_fill;
        $row = 1;
        $columns = array();

        foreach($data as $i => $v){
            $tmp = $v->toArray();
            $column = 'A';
            foreach ($tmp as $key => $value) {
                if(isset($description[$key]) ){
                    if($row === 1){
                        $sheet->setCellValue($column.$row, $description[$key]);
                        $sheet->getStyle($column.$row)->applyFromArray($this->style['title']);
                        $sheet->setCellValue($column.($row+1), $value);
                        $sheet->getStyle($column.($row+1))->applyFromArray($this->style['text']);
                    }else{
                        $sheet->setCellValue($column.$row, $value);
                        $sheet->getStyle($column.$row)->applyFromArray($this->style['text']);
                    }
                    $column++;
                }
            }
            if($row === 1){
                $row++;
            }
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'INSCRICOES.xlsx';

        // Cabeçalhos para definir o tipo de conteúdo e o nome do arquivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

}
