<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ensalament;
use App\Models\SelectiveProcess;

class IndexController extends Controller
{

    public function __construct(SelectiveProcess $selective_processes, Ensalament $ensalaments)
    {
        $this->selective_process = $selective_processes;
        $this->ensalament = $ensalaments;
    }

    public function index()
    {
        $data['selective_processes'] = $this->selective_process->current();
        return view('index', compact('data'));
    }

    public function ensalament()
    {
        $data['ensalaments'] = $this->selective_process->with('ensalaments')->get();
        $data['selective_processes'] = $this->selective_process->current();

        return view('ensalament', compact('data'));
    }

    public function leads()
    {
        $data['ensalaments'] = $this->selective_process->with('ensalaments')->get();
        $data['selective_processes'] = $this->selective_process->current();

        if($data['selective_processes'] == NULL){
            return view('lead', compact('data'));
        }else{
            return redirect()->route('cadastro');
        }

    }


}
