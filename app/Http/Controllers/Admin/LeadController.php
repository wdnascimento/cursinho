<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;


class LeadController extends Controller
{
    private $lead, $params, $paginate = 50, $style;
    public function __construct(Lead $leads)
    {
        $this->lead = $leads;
        // Default values
        $this->params['titulo']='Pré Cadastros';
        $this->params['main_route']='admin.lead';

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
        $this->params['subtitulo']='Pré Cadastros';
        $this->params['arvore'][0] = [
                    'url' => 'admin/lead',
                    'titulo' => 'Pré Cadastros'
        ];

        $searchFields = [];

        // REQUEST
        $dataForm = $request->only('date_start','date_end');

        $date_start = (isset($dataForm['date_start'])) ? "DATE(created_at) >= DATE('". $dataForm['date_start']. "')" : 'created_at IS NOT NULL';
        $date_end = (isset($dataForm['date_end'])) ? "DATE(created_at) <= DATE('". $dataForm['date_end']."')" : 'created_at IS NOT NULL';
        $data = $this->lead ->whereRaw($date_start)
                            ->whereRaw($date_end)
                            ->paginate($this->paginate);
        $searchFields['date_start']= (isset($dataForm['date_start'])) ? $dataForm['date_start'] : '' ;
        $searchFields['date_end']= (isset($dataForm['date_end'])) ? $dataForm['date_end'] : '' ;
        $params = $this->params;

        return view('admin.lead.index',compact('params','data','searchFields'));
    }


    public function reportlead(Request $request){

        // REQUEST
        $dataForm = $request->only('report_date_start','report_date_end');

        $date_start = (isset($dataForm['report_date_start'])) ? "DATE(created_at) >= DATE('". $dataForm['report_date_start']. "')" : 'created_at IS NOT NULL';
        $date_end = (isset($dataForm['report_date_end'])) ? "DATE(created_at) <= DATE('". $dataForm['report_date_end']."')" : 'created_at IS NOT NULL';
        $data = $this   ->lead
                        ->select('leads.*', DB::raw('DATE(created_at) as created_at'))
                        ->whereRaw($date_start)
                        ->whereRaw($date_end)
                        ->get();

        if(! $data){
            exit;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $description = $this->lead->desc_fill;
        $row = 1;

        foreach($data as $i => $v){
            $tmp = $v->toArray();
            $column = 'A';
            foreach ($tmp as $key => $value) {
                if(isset($description[$key]) ){
                    if($row === 1){
                        $sheet->setCellValue($column.$row, $description[$key]);
                        $sheet->getStyle($column.$row)->applyFromArray($this->style['title']);
                        if($key === 'created_at'){
                            $sheet->setCellValue($column.($row+1), \Carbon\Carbon::parse($value)->format('d/m/Y'));
                        }else{
                            $sheet->setCellValue($column.($row+1), $value);
                        }
                        $sheet->getStyle($column.($row+1))->applyFromArray($this->style['text']);
                    }else{
                        if($key == 'created_at'){
                            $sheet->setCellValue($column.($row), \Carbon\Carbon::parse($value)->format('d/m/Y'));
                        }else{
                            $sheet->setCellValue($column.($row), $value);
                        }
                        $sheet->getStyle($column.($row))->applyFromArray($this->style['text']);
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
        $filename = 'LEADS_'.date('YmdHis').'.xlsx';

        // Cabeçalhos para definir o tipo de conteúdo e o nome do arquivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
