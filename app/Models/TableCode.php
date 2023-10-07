<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableCode extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'pai', 'item', 'valor', 'descricao'];

    public function select($pai, $flag = NULL){
        if($flag !== NULL){
            return $this->where('pai',$pai)->where('flag',$flag)->where('item','<>',0)->orderBy('descricao')->get()->pluck('descricao','valor');
        }else{
            return $this->where('pai',$pai)->where('item','<>',0)->orderBy('descricao')->get()->pluck('descricao','valor');
        }

    }

    public function selectExcept($pai,$item){
        return $this->where('pai',$pai)->where('item','<>',0)->where('item','<>',$item)->orderBy('descricao')->get()->pluck('descricao','valor');
    }

    public function getDescricaoById($pai,$valor){
        $tmp = $this->where('pai',$pai)->where('item','<>',0)->where('valor',$valor)->select('descricao')->first();
        return $tmp["descricao"];
    }
}
