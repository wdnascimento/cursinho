<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Lead\LeadRequest;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(LeadRequest $request)
    {
        $dataForm = $request->all();
        $lead = new Lead();
        $insert = $lead->create($dataForm);

        if($insert){
            return back()->with('message', 'Inscrição Realizada com sucesso!');
        }else{
            return back()->withErrors(['Erro no Cadastro']);
        }
    }


}
