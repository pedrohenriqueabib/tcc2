<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AcessoController;

use App\Http\Controllers\ControleLogin;
use App\Http\Controllers\ControleCriarAtividade;
use App\Http\Controllers\ControleCriarEvento;
use App\Http\Controllers\ControleEvento;
use App\Http\Controllers\CadastroControle;
use App\Http\Controllers\ControleLogout;


/**
 * Rotas para AcessoController
 */
Route::prefix('acesso')->group(function () {

    // Rota para autenticar usuario
    Route::get('/login', [AcessoController::class, 'login'])->name('site.login');

    // Rota para autenticar usuario
    Route::post('/auth', [AcessoController::class, 'auth'])->name('autenticar');

    // Rota para formulário de cadastro de login
    Route::get('/signup', [AcessoController::class, 'signup'])->name('signup');

    // Rota para exibir o formulário para alteração de senha
    Route::get('forgetPassword', [AcessoController::class, 'forgetPassword'])->name('forgetPassword');

    // Rota para salvar um novo funcionário (via método POST)
    Route::post('/', [AcessoController::class, 'save'])->name('saveUser');

    // Rota para atualizar um funcionário existente (via método PUT)
    //Route::put('/', [FuncionariosController::class, 'update']);

    // Rota para verificar se um CPF já está cadastrado
    //Route::get('checkCPF', [FuncionariosController::class, 'checkCPF'])->name('cpfJaCadastrado');
});



Route::get('/', function(){
    return view('site.home');
})->name('site.home');


Route::get('/login', function(){
    return view('site.login');
})->name('site.login');

Route::get('/cadastro', function(){
    return view('site.cadastro');
})->name('site.cadastro');

Route::get('/criarEvento', function(){
    return view('site.criarEvento');
})->name('site.criarEvento');

Route::get('/criarAtividade', function(){
    return view('site.criarAtividade');
})->name('site.criarAtividade');

Route::get('/perfil', function(){
    return view('site.perfil');
})->name('site.perfil');

Route::get('/atividade', function(){
    return view('site.atividade');
})->name('site.atividade');

Route::get('/evento', function(){
    return view('site.evento');
})->name('site.evento');

Route::get('/criarComite', function(){
    return view('site.criarComite');
})->name('site.criarComite');

Route::post('/controleCriarAtividade', [ControleCriarAtividade::class, 'index'])->name('controleCriarAtividade');
Route::post('/controleCriarEvento', [ControleCriarEvento::class, 'create'])->name('controleCriarEvento');
Route::match(['get', 'post'], '/cadastroControle', [CadastroControle::class, 'create'])->name('controleCadastro');
Route::get('/controleLogin', [ControleLogin::class, 'index'])->name('controleLogin');
Route::get('/controleEvento', [ControleEvento::class, 'teste'])->name('controleEvento');
Route::get('/logout', [ControleLogout::class, 'index'])->name('controleLogout');
