<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Adm;
use App\Models\Reserva;

class AdmController extends Controller
{

    public function telaAdm()
    {
        return view('adm.insert');
    }


    public function reservas_geral(Request $request)
    {
        $status = $request->query('status', 'todas');
        $query = DB::table('reservas')
            ->join('usuarios', 'reservas.usuario_id', '=', 'usuarios.id')
            ->join('equipamentos', 'reservas.equipamento_id', '=', 'equipamentos.id')
            ->select(
                'reservas.status as status',
                'reservas.usuario_id',
                'usuarios.nome_usuario',
                'equipamentos.nome_equipamento',
                'reservas.data_reserva'
            );
        if ($status !== 'todas') {
            $query->where('reservas.status', $status);
        }

        $reservas = $query->get();

        // Passe ambas as variáveis para a view
        return view('adm.dashboard', compact(
            'reservas',
            'status'
        ));
    }



    public function dashBoard(Request $request)
    {
        $status = $request->query('status', 'todas');
        // retorna as reservas feitas essa semana
        $inicio_semana = Carbon::now()->startOfWeek(); // segunda-feira
        $fim_semana    = Carbon::now()->endOfWeek();   // domingo

        $reservas = DB::table('reservas')
            ->where('status', 'Pendente')
            ->whereBetween('data_reserva', [$inicio_semana, $fim_semana])
            ->get();
        $qtd_reservas = $reservas->count();



        // quantidade de reservas desse mes em andamento
        $mes_atual = Carbon::now()->month; // número do mês atual
        $ano_atual = Carbon::now()->year;  // ano atual
        $qtd_reservas_mes_andamento = DB::table('reservas')
            ->where('status', 'Em Andamento') // opcional, se quiser só aprovadas
            ->whereMonth('data_reserva', $mes_atual)
            ->whereYear('data_reserva', $ano_atual)
            ->count();
        // quantidade de reservas desse mes concluidas
        $mes_atual = Carbon::now()->month; // número do mês atual
        $ano_atual = Carbon::now()->year;  // ano atual
        $qtd_reservas_mes_concluida = DB::table('reservas')
            ->where('status', 'Concluida') // opcional, se quiser só aprovadas
            ->whereMonth('data_reserva', $mes_atual)
            ->whereYear('data_reserva', $ano_atual)
            ->count();
        // quantidade de reservas desse mes canceladas
        $mes_atual = Carbon::now()->month; // número do mês atual
        $ano_atual = Carbon::now()->year;  // ano atual
        $qtd_reservas_mes_cancelada = DB::table('reservas')
            ->where('status', 'Reprovado') // opcional, se quiser só aprovadas
            ->whereMonth('data_reserva', $mes_atual)
            ->whereYear('data_reserva', $ano_atual)
            ->count();


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
            ->where('reservas.status', 'Pendente')
            ->select(
                'usuarios.nome_usuario as nome_usuario',
                'reservas.data_reserva as data_reserva',
                'equipamentos.nome_equipamento as nome_equipamento'
            )->orderBy('reservas.data_reserva', 'desc')
            ->first();


        // retorna o ultimo usuario penalizado 
        $ultima_penalidade = DB::table('punicoes')
            ->join('usuarios', 'punicoes.usuario_id', '=', 'usuarios.id')
            ->where('punicoes.status', 'Ativa')
            ->select(
                'usuarios.nome_usuario as nome_usuario',
                'punicoes.tipo_penalidade as tipo_penalidade',
                'punicoes.tipo_punicao as tipo_punicao'
            )
            ->orderBy('punicoes.data_punicao', 'desc')
            ->first();

        // retorna o ultimo usuario bloqueado 
        $ultimo_bloqueado = DB::table('punicoes')
            ->join('usuarios', 'punicoes.usuario_id', '=', 'usuarios.id')
            ->where('punicoes.status', 'Ativa')
            ->where('punicoes.tipo_penalidade', 'Banimento')
            ->select(
                'usuarios.nome_usuario as nome_usuario',
                'punicoes.tipo_penalidade as tipo_penalidade',
                'punicoes.tipo_punicao as tipo_punicao'
            )
            ->orderBy('punicoes.data_punicao', 'desc')
            ->first();

        return view('adm.dashboard', [
            'reservas' => $reservas,
            'status' => $status,
            'qtd_reservas' => 0,
            'qtd_penalidades_ativas' => 0,
            'qtd_tipo_penalidade' => 0,
            'ultima_reserva' => null,
            'qtd_reservas_mes_andamento' => 0,
            'qtd_reservas_mes_concluida' => 0,
            'qtd_reservas_mes_cancelada' => 0,
            'ultima_penalidade' => null,
            'ultimo_bloqueado' => null,
        ]);
    }


    public function inserirEquipamento(Request $request)
    {


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



    public function listarReservasDosUsuarios(){

        $reservas = DB::table('reservas')
        ->join('usuarios', 'usuarios.id', '=', 'reservas.usuario_id')
        ->join('equipamentos', 'equipamentos.id', '=','reservas.equipamento_id')
        ->select('usuarios.id', 'usuarios.nome_usuario', 'equipamentos.nome_equipamento', 'reservas.data_fim', 'reservas.status')
        ->get();

        return view('adm.dashboard', compact('reservas'));

    }
}
