<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ensalament\EnsalamentInsertRequest;
use App\Models\Ensalament;
use App\Models\SelectiveProcess;

class EnsalamentController extends Controller
{
    private $params, $data, $ensalament, $selective_process;
    public function __construct(Ensalament $ensalaments, SelectiveProcess $selective_processes )
    {

        $this->ensalament = $ensalaments;
        $this->selective_process = $selective_processes;
        // Default values
        $this->params['titulo']='Arquivos';
        $this->params['main_route']='admin.ensalament';

    }

    public function index()
    {
        // PARAMS DEFAULT
        $this->params['subtitulo']='Arquivos Cadastrados';
        $this->params['arvore'][0] = [
                    'url' => 'admin/ensalament',
                    'titulo' => 'Arquivos'
        ];

        // id, year, title, startdate, enddate, extramessage, url, terms, paymentfinaldate, taxvalue

        $params = $this->params;
        $data = $this->ensalament->with('selectiveProcess')->get();
        return view('admin.ensalament.index',compact('params','data'));
    }

    public function create()
    {
        // PARAMS DEFAULT
        $this->params['subtitulo']='Cadastrar';
        $this->params['arvore']=[
           [
               'url' => 'admin/ensalament',
               'titulo' => 'Arquivos'
           ],
           [
               'url' => '',
               'titulo' => 'Cadastrar'
           ]];
       $params = $this->params;

       $preload['selective_process_id'] = $this->selective_process->select('id','title')->get()->pluck('title','id');
       return view('admin.ensalament.create',compact('params','preload'));
    }

    public function store(EnsalamentInsertRequest $request)
    {

        if(! $request->hasFile('url')) {
            return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao carregar o arquivo.']);
        }else{
            $fileName = date('YmdHis').'.'.$request->file('url')->getClientOriginalExtension();
            $filePath = $request->file('url')->storeAs('_ensalament', $fileName,'public');

            $dataForm = $request->all();
            $dataForm['url'] = $filePath;

            // id, selective_process_id, title, url, created_at, updated_at

            $insert = $this->ensalament->create($dataForm);
            if($insert){
                return redirect()->route($this->params['main_route'].'.index');
            }else{
                return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao fazer Inserir.']);
            }
        }
    }

    public function show($id)
    {
        $this->params['subtitulo']='Deletar Arquivo';
        $this->params['arvore']=[
           [
               'url' => 'admin/ensalament',
               'titulo' => 'Arquivo'
           ],
           [
               'url' => '',
               'titulo' => 'Deletar'
           ]];
        $params = $this->params;

        $data = $this->ensalament->find($id);
        $preload['selective_process_id'] = $this->selective_process->select('id','title')->get()->pluck('title','id');
        return view('admin.ensalament.show',compact('params','data','preload'));
    }

    public function destroy($id)
    {
        $data = $this->ensalament->find($id);

        if(file_exists(public_path('storage/'.$data['url']))){
            unlink(public_path('storage/'.$data['url']));
        }
        if($data->delete()){
            return redirect()->route($this->params['main_route'].'.index');
        }else{
            return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao deletar.']);
        }
    }
}
