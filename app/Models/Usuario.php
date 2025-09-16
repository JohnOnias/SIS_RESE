<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; 
    public $timestamps = true;

   
    protected $fillable = [
        'id',
        'nome_usuario',
        'email_usuario',
        'matricula_usuario',
        'telefone_usuario',
        'tipo_usuario',
        'senha_usuario',
    ];

    // Esconde senha ao serializar
    protected $hidden = [
        'senha_usuario',
    ];
    
}
