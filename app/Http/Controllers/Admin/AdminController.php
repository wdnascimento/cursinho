<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Http\Requests\Admin\Admin\AdminInsertRequest ;
use App\Http\Requests\Admin\Admin\AdminEditarRequest ;
use App\Http\Requests\Admin\Admin\AdminUpdatePasswordRequest;
use App\Models\Role;
use DB;
use Exception;

class AdminController extends Controller
 {
    public function __construct(Admin $admins,  Role $roles)
    {
        $this->admin = $admins;
        $this->role = $roles;

        // Default values
        $this->params['titulo']='Usuário';
        $this->params['main_route']='admin.admin';

    }

    public function index()
    {
        // PARAMS DEFAULT
        $this->params['subtitulo']='Usuários Cadastrados';
        $this->params['arvore'][0] = [
                    'url' => 'admin/admin',
                    'titulo' => 'Usuários'
        ];

        $params = $this->params;
        $data = $this->admin->get();
        return view('admin.admin.index',compact('params','data'));
    }

    public function create()
    {
        // PARAMS DEFAULT
        $this->params['subtitulo']='Cadastrar Usuário';
        $this->params['arvore']=[
           [
               'url' => 'admin/admin',
               'titulo' => 'Usuário'
           ],
           [
               'url' => '',
               'titulo' => 'Cadastrar'
           ]];
       $params = $this->params;
       $preload['roles'] = $this->role->select('title','id')->get()->pluck('title','id');
       return view('admin.admin.create',compact('params','preload'));
    }

    public function store(AdminInsertRequest $request)
    {
        $dataForm  = $request->all();

        $dataForm['password'] = Hash::make($dataForm['password']);

        $insert = $this->admin->create($dataForm);
        if($insert){
            return redirect()->route($this->params['main_route'].'.index');
        }else{
            return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao fazer Inserir.']);
        }
    }

    public function show($id,Role $roles)
    {
        $this->params['subtitulo']='Deletar Usuário';
        $this->params['arvore']=[
           [
               'url' => 'admin/admin',
               'titulo' => 'Usuário'
           ],
           [
               'url' => '',
               'titulo' => 'Deletar'
           ]];
        $params = $this->params;

        $data = $this->admin->find($id);
        $preload['roles'] = $roles->select('title','id')->get()->pluck('title','id');
        return view('admin.admin.show',compact('params','data','preload'));
    }

    public function edit($id,Role $roles)
    {
        $this->params['subtitulo']='Editar Usuário';
        $this->params['arvore']=[
           [
               'url' => 'admin/admin',
               'titulo' => 'Usuário'
           ],
           [
               'url' => '',
               'titulo' => 'Cadastrar'
           ]];
       $params = $this->params;


       $data = $this->admin->find($id);

       $preload['roles'] = $roles->select('title','id')->get()->pluck('title','id');

       return view('admin.admin.create',compact('params', 'data','preload'));
    }

    public function update(AdminEditarRequest $request, $id)
    {
        $data = $this->admin->find($id);

        $dataForm  = $request->all();

        if($data->update($dataForm)){
            return redirect()->route($this->params['main_route'].'.index');
        }else{
            return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao editar.']);
        }
    }

    public function destroy($id)
    {
        $data = $this->admin->find($id);

        if($data->delete()){
            return redirect()->route($this->params['main_route'].'.index');
        }else{
            return redirect()->route($this->params['main_route'].'.create')->withErrors(['Falha ao deletar.']);
        }
    }

    public function showPassword($id,Role $roles)
    {
        $this->params['subtitulo']='Trocar Senha do Usuário';
        $this->params['arvore']=[
           [
               'url' => 'admin/admin',
               'titulo' => 'Usuário'
           ],
           [
               'url' => '',
               'titulo' => 'Trocar Senha'
           ]];
        $params = $this->params;

        $data = $this->admin->find($id);
        $preload['roles'] = $roles->select('title','id')->get()->pluck('title','id');
        return view('admin.admin.show-password',compact('params','data','preload'));
    }

    public function updatePassword(AdminUpdatePasswordRequest $request, $id)
    {
        $data = $this->admin->find($id);

        $password = $request->only('password');

        $dataForm['password']  = Hash::make($password['password']);

        if($data->update($dataForm)){
            return redirect()->route($this->params['main_route'].'.index');
        }else{
            return redirect()->route($this->params['main_route'].'.show-password')->withErrors(['Falha ao trocar a senha.']);
        }
    }

}
