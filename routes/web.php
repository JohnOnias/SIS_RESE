<?php

use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get("/", function(){
    return redirect()->route("telaLogin");
});

Route::get("user/login", [UsuarioController::class, 'telaLogin'])->name("telaLogin");
Route::get('user/cadastro', [UsuarioController::class, 'telaCadastro'])->name('telaCadastro');
Route::get("user/home", [UsuarioController::class, 'home'])->name('home');
Route::get("user/home", [EquipamentoController::class, 'listarEquipamentos'])->name('home');

Route::post('user/cadastro', [UsuarioController::class, 'cadastrar'])->name('cadastrarUsuario');
Route::post("user/login", [UsuarioController::class, 'verificar']);





