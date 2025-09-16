<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    
    public function listarEquipamentos(){
        $equipamentos = Equipamento::all();

        return view("user.index", compact('equipamentos'));
    }

}
