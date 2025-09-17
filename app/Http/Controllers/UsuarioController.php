<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\select;

class UsuarioController extends Controller
{

    public function telaCadastro()
    {
        return view('user.register'); // crie a view user/cadastro.blade.php
    }

     // Tela de login
    public function telaLogin()
    {
        return view('user.login'); // crie a view user/login.blade.php
    }

    public function home(){
        return view('user.index');
    }

    // Salvar cadastro
    public function cadastrar(Request $request)
    {
        $request->validate([
            'nome_usuario' => 'required|string|max:255',
            'email_usuario' => 'required|email|unique:usuarios,email_usuario',
            'matricula_usuario' => 'required|string|unique:usuarios,matricula_usuario',
            'telefone_usuario' => 'nullable|string|max:20',
            'senha_usuario' => 'required|string|min:6|confirmed', // campo senha + confirmação
        ]);

        $usuario = Usuario::create([
            'nome_usuario' => $request->nome_usuario,
            'email_usuario' => $request->email_usuario,
            'matricula_usuario' => $request->matricula_usuario, 
            'telefone_usuario' => $request->telefone_usuario,
            'tipo_usuario' => 'Aluno',
            'senha_usuario' => Hash::make($request->senha_usuario), // hash da senha
        ]);

        $dados = $usuario->only(['id', 'nome_usuario']);

        $nome_usuario = $dados['nome_usuario'];
        $id_usuario = $dados['id'];


        $request->session()->put('id_usuario', $id_usuario);
        $request->session()->put('nome_usuario', $nome_usuario);

        return redirect()->route('home');
    }

   


    public function verificar(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        $usuario = Usuario::where('email_usuario', $request->email)
                    ->first();

        if ($usuario && Hash::check($request->senha, $usuario->senha_usuario)) {
        
            //salvando a sessão usuário
            $request->session()->put('id_usuario', $usuario->id);
            $request->session()->put('nome_usuario', $usuario->nome_usuario);



            return redirect()->route('home'); // redirecionar para a área logada
            
        }

        return redirect()->route('telaLogin')->with('error', "Email ou senha incompatível");
    }

    public function reservarEquipamento(Request $request){
        date_default_timezone_set("America/Sao_Paulo");

        $request->validate([
            'equipamento_id' => 'required',
            'data_inicio' => 'required',
            'data_fim' => 'required',
        ]);

        $usuarioId = $request->session()->get("id_usuario");
        $dataReserva = date("Y-m-d h:m:s");
        $equipamentoId = $request->equipamento_id;
        $dataInicio = $request->data_inicio;
        $dataFim = $request->data_fim;


        $reserva = Reserva::create([
            'usuario_id' => $usuarioId,
            'equipamento_id' => $equipamentoId,
            'data_reserva' => $dataReserva,
            'data_inicio' => $dataInicio, 
            'data_fim' => $dataFim,
            'status'=> 'Pendente'
        ]);



        if(!$reserva){
           return redirect()->route('home')->with('error', "Equipamento não foi reservado");
        }

        return redirect()->route('home')->with('success', "Equipamento reservado com sucesso");

        
    }

    public function listarEquipamentosReservados(Request $request){
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

        return view('user.index', compact('dados'));
    }


}
