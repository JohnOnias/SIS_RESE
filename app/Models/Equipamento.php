<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'nome_equipamento', 
        'descricao_equipamento', 
        'quantidade_equipamento', 
        'quantidade_disponivel_equipamento'
    ];
}
