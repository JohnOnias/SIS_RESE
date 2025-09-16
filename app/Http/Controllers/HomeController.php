<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $equipamentos = Equipamento::all();

        $usuarioId = $request->session()->get("id_usuario");

        $dados = DB::table('reservas')
        ->join('usuarios', 'reservas.usuario_id', '=', 'usuarios.id')
        ->join('equipamentos', 'reservas.equipamento_id', '=', 'equipamentos.id')
        ->where('usuarios.id', $usuarioId) // filtra pelo usuário
        ->select(
            'reservas.data_inicio',
            'reservas.data_fim',
            'reservas.status',
            'equipamentos.nome_equipamento as equipamento'
        )
        ->get();

        return view('user.index', compact('equipamentos'),compact('dados'));
    }

}
