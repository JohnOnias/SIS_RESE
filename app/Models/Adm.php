<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Adm extends Model{

   protected $table = 'equipamentos'; 
    public $timestamps = true;

   
    protected $fillable = [
        'nome_equipamento',
        'descricao_equipamento',
        'quantidade_equipamento',
        'quantidade_disponivel_equipamento',
    ];

}