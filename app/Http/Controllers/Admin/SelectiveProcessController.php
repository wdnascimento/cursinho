<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SelectiveProcess;
use Illuminate\Http\Request;

class SelectiveProcessController extends Controller
{
    private $preload, $params, $data, $selective_processes;
    public function __construct(SelectiveProcess $selective_processes)
    {

        $this->selective_process = $selective_processes;
        // Default values
        $this->params['titulo']='Arquivo Sigep';
        $this->params['main_route']='admin.arquivo_sigep';

    }

    public function index()
    {
        // PARAMS DEFAULT
        $this->params['subtitulo']='Arquivo Sigep Cadastrados';
        $this->params['arvore'][0] = [
                    'url' => 'admin/arquivo_sigep',
                    'titulo' => 'Arquivo Sigep'
        ];

        $params = $this->params;
        $data = $this->arquivo_sigep->orderBy('data_hora','desc')->limit(15)->get();
        return view('admin.arquivo_sigep.index',compact('params','data'));
    }

    public function create()
    {
        // PARAMS DEFAULT
        $this->params['subtitulo']='Cadastrar Arquivo Sigep';
        $this->params['arvore']=[
           [
               'url' => 'admin/arquivo_sigep',
               'titulo' => 'Arquivo Sigep'
           ],
           [
               'url' => '',
               'titulo' => 'Cadastrar'
           ]];
       $params = $this->params;

       $preload = null;
       return view('admin.arquivo_sigep.create',compact('params','preload'));
    }

    public function store(ArquivoSigepRequest $request)
    {

        if($request->file()) {
            $fileName = date('YmdHis').'.'.$request->file->getClientOriginalExtension();
            $filePath = $request->file->storeAs('uploads', $fileName,'public');

            //id, titulo, data_hora, importado, usuario,
            $data['titulo'] = $filePath;
            $data['data_hora'] = \Carbon\Carbon::now()->setTimezone('America/Sao_Paulo');
            $data['importado'] = 0;
            $data['usuario'] =Auth()->user()->email;

            $insert = $this->arquivo_sigep->create($data);
            if($insert){
                return redirect()->route($this->params['main_route'].'.index');
            }else{
                return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao fazer Inserir.']);
            }

        }



    }


    public function import($id)
    {
        $this->params['subtitulo']='Importar Arquivo Sigep';
        $this->params['arvore']=[
           [
               'url' => 'admin/arquivo_sigep',
               'titulo' => 'Arquivo Sigep'
           ],
           [
               'url' => '',
               'titulo' => 'Cadastrar'
           ]];

        $data = $this->arquivo_sigep->find($id);
        if( $data->importado == 0){
            // galerias
            $GALERIAS = $this->galeria->select(DB::raw('UPPER(titulo) as titulo'))->get()->toArray();

            // LIMPA ALOJAMENTOS
            $desaloja =  $this->preso_alojamento->where('data_saida',NULL)->delete();

            if($desaloja !== NULL){
                $url = Storage::url($data->titulo);

                $streamSSL = stream_context_create(array(
                    "ssl"=>array(
                        "verify_peer"=> false,
                        "verify_peer_name"=> false
                    )
                ));

                $csv = [];

                $file_handle = fopen($url, 'r',false,$streamSSL);
                while (!feof($file_handle)) {
                    $csv[] = fgetcsv($file_handle, 0,',');
                }
                fclose($file_handle);

                $tmp_presos = [];
                $alojamento_preso=[];
                $presos = $this->preso->all();
                array_shift($csv);
                foreach ($csv as $i => $v){
                    $nome_prontuario = preg_split("/[\-]/", $v[0]);
                    $prontuarios[]= trim($nome_prontuario[0]);
                    $tmp_presos[$i]['prontuario'] = trim($nome_prontuario[0]);
                    $tmp_presos[$i]['nome']             = trim($nome_prontuario[1]);
                    $tmp_presos[$i]['rg']               =  trim($v[1]);
                    $tmp_presos[$i]['data_nascimento']  =  \Carbon\Carbon::parse(strtotime(trim($v[2])))->format('Y-m-d') ;
                    $tmp_presos[$i]['mae']              =  trim($v[3]);
                    $tmp_presos[$i]['artigos']           =  trim($v[4]);
                    $tmp_presos[$i]['situacao']  =  trim($v[5]);
                    $alojamento =  preg_split("/(\/\s)/", $v[6]);
                    $tmp_presos[$i]['bloco']            =  trim($alojamento[0]);
                    $tmp_presos[$i]['galeria']          =  trim($alojamento[1]);
                    $tmp_presos[$i]['cubiculo']         =  trim($alojamento[2]);
                    $tmp_presos[$i]['origem']           =  trim($v[7]);
                    $tmp_presos[$i]['data_prisao']      =  \Carbon\Carbon::parse(strtotime(trim($v[8])))->format('Y-m-d') ;
                    $tmp_presos[$i]['data_depen']       =  \Carbon\Carbon::parse(strtotime(trim($v[9])))->format('Y-m-d') ;
                    $tmp_presos[$i]['data_entrada']     =  \Carbon\Carbon::parse(strtotime(trim($v[10])))->format('Y-m-d') ;

                    // VERIFICA SE A GALERIA EXISTE

                    $galerias = array_search(strtoupper($tmp_presos[$i]['galeria']), array_column($GALERIAS, 'titulo'));


                    // presos para alojar

                    if($galerias !== false){


                        // VERIFICA SE O PRESO ESTÁ CADASTRADO

                        $presos = $this->preso->select('id')->where('prontuario',$tmp_presos[$i]['prontuario'])->first();

                        if($presos){
                           // $this->preso->find($presos["id"])->update($tmp_presos[$i]);
                            $tmp_presos[$i]['id'] = $presos["id"];
                        }else{
                            $result = $this->preso->create($tmp_presos[$i]);
                            if($result){
                                $tmp_presos[$i]['id'] = $result->id;
                            }
                        }

                        // ALOJA O PRESO

                         $cubiculo_id =  $this->cubiculo->getCubiculoIdGaleriaCubiculo($tmp_presos[$i]['galeria'] ,$tmp_presos[$i]['cubiculo'])->first();

                        $tmp_alojamento_preso= [];
                        $tmp_alojamento_preso["preso_id"]= $tmp_presos[$i]['id'];
                        $tmp_alojamento_preso["cubiculo_id"]=  $cubiculo_id["id"];
                        $tmp_alojamento_preso["data_entrada"]= \Carbon\Carbon::now()->setTimezone('America/Sao_Paulo');

                        array_push($alojamento_preso,$tmp_alojamento_preso) ;


                    }
                    $i++;

                }
                if(! $this->preso_alojamento->insert($alojamento_preso)){
                    return redirect()->back()->withErrors(['Erro ao criar novo alojamento']);
                }
            }else{
                return redirect()->back()->withErrors(['Erro ao importar, Desalojar os presos já importado anteriormente.']);
            }

        }else{
            return redirect()->back()->withErrors(['Erro ao importar, Arquivo já importado anteriormente.']);

        }
        if(!$data->update(['importado' => 1])){
            return redirect()->back()->withErrors(['Erro modificar status da importação.']);
        }

        return redirect()->route($this->params['main_route'].'.index');
    }

    public function update(ArquivoSigepRequest $request, $id)
    {
        $data = $this->arquivo_sigep->find($id);

        $dataForm  = $request->all();

        if($data->update($dataForm)){
            return redirect()->route($this->params['main_route'].'.index');
        }else{
            return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao editar.']);
        }
    }

    public function destroy($id)
    {
        $data = $this->arquivo_sigep->find($id);

        if($data->delete()){
            return redirect()->route($this->params['main_route'].'.index');
        }else{
            return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao deletar.']);
        }
    }
}
