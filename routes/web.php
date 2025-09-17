<?php


use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", function(){
    return redirect()->route("telaLogin");
});


// rotas get
Route::get("user/login", [UsuarioController::class, 'telaLogin'])->name("telaLogin");
Route::get('user/cadastro', [UsuarioController::class, 'telaCadastro'])->name('telaCadastro');
Route::get("user/home", [UsuarioController::class, 'home'])->name('home');
Route::get("user/home", [HomeController::class, 'index'])->name('home');


// Route::get("user/home", [UsuarioController::class, 'listarEquipamentosReservados'])->name('reservas');
Route::get("adm/insert", [AdmController::class, 'telaAdm'])->name('adm'); 
Route::get("adm/dashboard", [AdmController::class, 'dashboard'])->name('dash'); 
Route::get('/adm/dashboard/reservas_geral', [AdmController::class, 'reservas_geral'])->name('reservas_geral');


// rotas post
Route::post('/adm/inserir', [AdmController::class, 'inserirEquipamento'])->name('insertEquipamento');
Route::post('user/cadastro', [UsuarioController::class, 'cadastrar'])->name('cadastrarUsuario');
Route::post("user/login", [UsuarioController::class, 'verificar']);
Route::post('user/home', [UsuarioController::class, 'reservarEquipamento'])->name('reservarEquipamento');
Route::post('/reservar', [App\Http\Controllers\ReservaController::class, 'fazerReserva'])->name('reservar');





