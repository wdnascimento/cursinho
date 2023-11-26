<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SelectiveProcess;
use Illuminate\Http\Request;
use DB;

class StatisticController extends Controller
{
    private $params, $data , $selective_process, $selective_process_id;

    public function __construct(SelectiveProcess $selective_processes)
    {
        $this->selective_process = $selective_processes;
        // Default values
        $this->params['titulo']='Estatísticas';
        $this->params['main_route']='admin.statistic';
    }

    public function index(Request $request)
    {
        // PARAMS DEFAULT
        $this->params['subtitulo']='Estatísticas';
        $this->params['arvore'][0] = [
                    'url' => 'admin/statistic',
                    'titulo' => 'Estatísticas'
        ];

        $searchFields = [];

        // REQUEST
        $dataForm = $request->only('selective_process_id');
        // dd($selective_process);
        $preload['selective_process_id'] = $this->selective_process->select('id','title')->get()->pluck('title','id');

        if(isset($dataForm['selective_process_id']) && (intval($dataForm['selective_process_id']))){
            $this->selective_process_id = intval($dataForm['selective_process_id']);
        }else{
            $this->selective_process_id = array_key_first($preload['selective_process_id']->toArray());
        }

        if($this->selective_process_id){
            $preload['selective_process']= $this->selective_process_id;
            $data = DB::table('questions as q')
                                ->select('q.id as question_id', 'q.text as question_text', 'r.id as response_id', 'r.text as response_text', DB::raw('count(sr.optvalue) as count_value'))
                                ->join('responses as r', function ($join) {
                                    $join->on('r.question_id', '=', 'q.id')
                                    ->where('q.type', '=', 1);
                                    })
                                    ->leftJoin('student_responses as sr', function ($leftJoin) {
                                        $leftJoin->on('sr.response_id', '=', 'q.id')
                                            ->on('sr.optvalue', '=', 'r.id')
                                            ->where('sr.selective_process_id', '=', $this->selective_process_id );
                                    })
                                    ->groupBy('q.id', 'r.id','q.text','r.text')
                                    ->orderBy('q.order')
                                    ->get();
            $tmp= [];
            foreach ($data as $i => $v){
                $tmp[$v->question_id]['text'] = $v->question_text;
                $tmp[$v->question_id]['responses'][$v->response_id]["text"]=$v->response_text;
                $tmp[$v->question_id]['responses'][$v->response_id]["count_value"]=$v->count_value;
            }
            $data = $tmp;
        }else{
            $data = null;
        }
        $params = $this->params;
        return view('admin.statistic.index',compact('params','data','preload','searchFields'));
    }


}
