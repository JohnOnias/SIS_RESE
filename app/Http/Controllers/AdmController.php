<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Adm;



class AdmController extends Controller
{

    public function telaAdm(){
        return view('adm.insert');
    }


    public function dashBoard(){

        // retorna as reservas feitas hoje
       $inicio_semana = Carbon::now()->startOfWeek(); // segunda-feira
        $fim_semana    = Carbon::now()->endOfWeek();   // domingo

        $reservas = DB::table('reservas')
            ->where('status', 'Aprovado')
            ->whereBetween('data_reserva', [$inicio_semana, $fim_semana])
            ->get();
        $qtd_reservas = $reservas->count();

        // retorna a quantidade de puniçoes ativas
        $penalidades_ativas = DB::table('punicoes')->where('status', 'Ativa'); 
        $qtd_penalidades_ativas = $penalidades_ativas->count(); 
        // retorna a quantidade de banimentos
        $tipo_penalidade = DB::table('punicoes')->where('tipo_penalidade', 'Banimento'); 
        $qtd_tipo_penalidade = $tipo_penalidade->count(); 
        // retorna a ultima reserva feita 
                $ultima_reserva = DB::table('usuarios')
                ->join('reservas', 'usuarios.id', '=', 'reservas.usuario_id')
                ->join('equipamentos', 'reservas.equipamento_id', '=', 'equipamentos.id')
                ->where('reservas.status', 'Aprovado')
                ->select(
                    'usuarios.nome_usuario as nome_usuario',
                    'reservas.data_reserva as data_reserva',
                    'equipamentos.nome_equipamento as nome_equipamento'
                )->orderBy('reservas.data_reserva', 'desc')
                ->first();
                        

        return view('adm.dashboard', compact('reservas', 'qtd_reservas', 'qtd_penalidades_ativas', 'qtd_tipo_penalidade', 'ultima_reserva'));

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
            'quantidade_disponivel_equipamento' => $request->quantidade_equipamento,

        ]);
        return redirect()->route('adm')->with('success', 'Cadastro realizado com sucesso!');
    
    }

}
