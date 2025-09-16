<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adm;



class AdmController extends Controller
{

    public function telaAdm(){
        return view('adm.adm');
    }
    public function inserirEquipamento(Request $request){


      /* $request->validate([
            'nome_equipamento' => 'required|string|max:100',
            'descricao_equipamento' => 'required|string|max:255',
            'quantidade_equipamento' => 'required|integer',
            'quantidade_disponivel_equipamento' => 'required|integer',
            ]);
            */
        Adm::create([
            'nome_equipamento' => $request->nome_equipamento, 
            'descricao_equipamento' => $request->descricao_equipamento, 
            'quantidade_equipamento' => $request->quantidade_equipamento, 
            'quantidade_disponivel_equipamento' => $request->quantidade_disponivel_equipamento,

        ]);
        return redirect()->route('adm')->with('success', 'Cadastro realizado com sucesso!');
    
    }
}
