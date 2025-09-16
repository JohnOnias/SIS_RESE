<?php

use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdmController;
use Illuminate\Support\Facades\Route;

Route::get("/", function(){
    return redirect()->route("telaLogin");
});

// rotas get
Route::get("user/login", [UsuarioController::class, 'telaLogin'])->name("telaLogin");
Route::get('user/cadastro', [UsuarioController::class, 'telaCadastro'])->name('telaCadastro');
Route::get("user/home", [UsuarioController::class, 'home'])->name('home');
Route::get("user/home", [EquipamentoController::class, 'listarEquipamentos'])->name('home');

Route::get("adm/home", [AdmController::class, 'telaAdm'])->name('adm'); 


// rotas post


Route::post('/adm/inserir', [AdmController::class, 'inserirEquipamento'])->name('insertEquipamento');
Route::post('user/cadastro', [UsuarioController::class, 'cadastrar'])->name('cadastrarUsuario');
Route::post("user/login", [UsuarioController::class, 'verificar']);





