<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'equipamento_id', 'data_reserva', 'data_inicio', 'data_fim', 'status'];

}
