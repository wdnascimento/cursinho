<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SelectiveProcess\SelectiveProcessInsertRequest;
use App\Http\Requests\Admin\SelectiveProcess\SelectiveProcessUpdateRequest;
use App\Models\SelectiveProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SelectiveProcessController extends Controller
{
    private $params, $data, $selective_process;
    public function __construct(SelectiveProcess $selective_processes)
    {

        $this->selective_process = $selective_processes;
        // Default values
        $this->params['titulo']='Processo Seletivo';
        $this->params['main_route']='admin.selective_process';

    }

    public function index()
    {
        // PARAMS DEFAULT
        $this->params['subtitulo']='Processos Seletivo Cadastrados';
        $this->params['arvore'][0] = [
                    'url' => 'admin/selective_process',
                    'titulo' => 'Processo Seletivo'
        ];

        // id, year, title, startdate, enddate, extramessage, instructionurl, terms, paymentfinaldate, taxvalue

        $params = $this->params;
        $data = $this->selective_process->orderBy('year','desc')->get();
        return view('admin.selective_process.index',compact('params','data'));
    }

    public function create()
    {
        // PARAMS DEFAULT
        $this->params['subtitulo']='Cadastrar';
        $this->params['arvore']=[
           [
               'url' => 'admin/selective_process',
               'titulo' => 'Processo Seletivo'
           ],
           [
               'url' => '',
               'titulo' => 'Cadastrar'
           ]];
       $params = $this->params;

       $preload = null;
       return view('admin.selective_process.create',compact('params','preload'));
    }

    public function store(SelectiveProcessInsertRequest $request)
    {

        if(! $request->hasFile('instructionurl')) {
            return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao carregar o arquivo.']);
        }else{
            if(! $request->hasFile('terms')) {
                return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao carregar o arquivo.']);
            }else{
                $fileName = date('YmdHis').'.'.$request->file('instructionurl')->getClientOriginalExtension();
                $filePath = $request->file('instructionurl')->storeAs('uploads', $fileName,'public');

                $dataForm = $request->all();
                $dataForm['instructionurl'] = $filePath;

                $fileName = date('YmdHis').'.'.$request->file('terms')->getClientOriginalExtension();
                $filePath = $request->file('terms')->storeAs('uploads', $fileName,'public');

                $dataForm = $request->all();
                $dataForm['terms'] = $filePath;

                $dataForm['taxvalue'] = number_format(str_replace(",", ".",str_replace(".", "",$dataForm['taxvalue'])), 2, '.', '');


                // id, year, title, startdate, enddate, extramessage, instructionurl, terms, paymentfinaldate, taxvalue

                $insert = $this->selective_process->create($dataForm);
                if($insert){
                    return redirect()->route($this->params['main_route'].'.index');
                }else{
                    return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao fazer Inserir.']);
                }
            }

        }
    }

    public function edit($id)
    {

        $this->params['subtitulo']='Editar Processo Seletivo';
        $this->params['arvore']=[
           [
               'url' => 'admin/admin',
               'titulo' => 'Processo Seletivo'
           ],
           [
               'url' => '',
               'titulo' => 'Editar'
           ]];
        $params = $this->params;
        $data = $this->selective_process->find($id);

        return view($this->params['main_route'].'.create',compact('params', 'data'));
    }

    public function update(SelectiveProcessUpdateRequest $request, $id)
    {
        $data = $this->selective_process->find($id);

        $dataForm  = $request->all();
        $dataForm['taxvalue'] = number_format(str_replace(",", ".",str_replace(".", "",$dataForm['taxvalue'])), 2, '.', '');
        if($request->hasFile('instructionurl')) {
            $fileName = date('YmdHis').'.'.$request->file('instructionurl')->getClientOriginalExtension();
            $filePath = $request->file('instructionurl')->storeAs('uploads', $fileName,'public');
            $dataForm['instructionurl'] = $filePath;
            if (Storage::exists('public/'.$data['instructionurl'])) {
                // Delete the file
                Storage::delete('public/'.$data['instructionurl']);
                echo "File deleted successfully.";
            } else {
                echo "File not found.";
            }
        }

        if($request->hasFile('terms')) {
            $fileName = date('YmdHis').'.'.$request->file('terms')->getClientOriginalExtension();
            $filePath = $request->file('terms')->storeAs('uploads', $fileName,'public');
            $dataForm['terms'] = $filePath;
            if (Storage::exists('public/'.$data['terms'])) {
                // Delete the file
                Storage::delete('public/'.$data['terms']);
                echo "File deleted successfully.";
            } else {
                echo "File not found.";
            }
        }

        if($data->update($dataForm)){
            return redirect()->route($this->params['main_route'].'.index');
        }else{
            return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao editar.']);
        }
    }

    public function destroy($id)
    {
        $data = $this->selective_process->find($id);

        if($data->delete()){
            return redirect()->route($this->params['main_route'].'.index');
        }else{
            return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao deletar.']);
        }
    }
}
