<?php
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;



Route::get('/register', [UsuarioController::class, 'telaCadastro'])->name('telaCadastro');

Route::post('/register', [UsuarioController::class, 'telaCadastro'])->name('cadastrarUsuario');

Route::get('/login', [UsuarioController::class, 'telaLogin'])->name('telaLogin');
Route::post('/login', [UsuarioController::class, 'login'])->name('loginUsuario');


Route::get('/', function () {
    return redirect()->route('telaLogin');
});


Route::get('/index', function(){
        return view('index'); 
}); 
