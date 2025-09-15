<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

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

        Usuario::create([
            'nome_usuario' => $request->nome_usuario,
            'email_usuario' => $request->email_usuario,
            'matricula_usuario' => $request->matricula_usuario, 
            'telefone_usuario' => $request->telefone_usuario,
            'tipo_usuario' => 'Aluno',
            'senha_usuario' => Hash::make($request->senha_usuario), // hash da senha
        ]);

        return redirect()->route('telaCadastro')->with('success', 'Cadastro realizado com sucesso!');
    }

   


    public function verificar(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        $usuario = Usuario::where('email_usuario', $request->email)->first();

        if ($usuario && Hash::check($request->senha, $usuario->senha_usuario)) {
            // Login bem-sucedido, exemplo simples com session
            // session(['usuario_id' => $usuario->id_usuario, 'usuario_nome' => $usuario->nome_usuario]);
            return redirect()->route('home'); // redirecionar para a área logada
        }

        return redirect()->route('telaLogin')->with('error', "Email ou senha incompatível");
    }
}
