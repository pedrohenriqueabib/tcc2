<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AcessoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AtividadeController;

/*
use App\Http\Controllers\ControleLogin;
use App\Http\Controllers\ControleCriarAtividade;
use App\Http\Controllers\ControleCriarEvento;
use App\Http\Controllers\ControleEvento;
use App\Http\Controllers\CadastroControle;
use App\Http\Controllers\ControleLogout;
*/


/**
 * Rotas para AcessoController
 */
Route::prefix('acesso')->group(function () {

    //Rota exibir eventos do usuário
    Route::get('/listEvents', [AcessoController::class, 'listEvents'])->name('listEvents');

    // Rota para autenticar usuario
    Route::get('/login', [AcessoController::class, 'login'])->name('login');

    // Rota para autenticar usuario
    Route::post('/auth', [AcessoController::class, 'auth'])->name('autenticar');

    // Rota para formulário de cadastro de login
    Route::get('/signup', [AcessoController::class, 'signup'])->name('signup');

    // Rota para exibir o formulário para alteração de senha
    Route::get('forgetPassword', [AcessoController::class, 'forgetPassword'])->name('forgetPassword');

    // Rota para salvar um novo funcionário (via método POST)
    Route::post('/', [AcessoController::class, 'save'])->name('saveUser');

    // Rota para sair da sessão
    Route::get('/logout', [AcessoController::class, 'logout'])->name('logout');

    // Rota para atualizar um funcionário existente (via método PUT)
    //Route::put('/', [FuncionariosController::class, 'update']);

    // Rota para verificar se um CPF já está cadastrado
    //Route::get('checkCPF', [FuncionariosController::class, 'checkCPF'])->name('cpfJaCadastrado');
});

Route::prefix('evento')->group( function(){
    // Rota para exibir evento
    Route::get('/showEvent', [EventoController::class, 'show'])->name('showEvent');
    
    // Rota para formulário de evento
    Route::get('/formEvent', [EventoController::class, 'formEvent'])->name('formEvent');

    // Rota para salvar um evento
    Route::post('/saveEvent', [EventoController::class, 'save'])->name('saveEvent');

    // Rota para atualizar evento
    Route::post('/updateEvent', [EventoController::class, 'update'])->name('updateEvent');



});

Route::prefix('atividade')->group( function (){
    // Rota para criar atividade
    Route::post('saveActivity', [AtividadeController::class, 'save'])->name('saveActivity');

    //Rota para atualizar
    Route::post('updateAtividade', [AtividadeController::class, 'updateAtividade'])->name('updateAtividade');

    //Rota para evibir atividade
    Route::get('showAtividade/{id}', [AtividadeController::class, 'showAtividade'])->name('showAtividade');

    //Rota para exibir horários
    Route::get('showAtividadeHorario/{id}', [AtividadeController::class, 'showAtividadeHorario'])->name('showAtividadeHorario');
});

Route::get('/', function(){
    return view('site.home');
})->name('site.home');

Route::get('/atividade_horario', function(){
    return view('site.atividade_horario');
})->name('site.atividade_horario');

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

// Route::post('/controleCriarAtividade', [ControleCriarAtividade::class, 'index'])->name('controleCriarAtividade');
// Route::post('/controleCriarEvento', [ControleCriarEvento::class, 'create'])->name('controleCriarEvento');
// Route::match(['get', 'post'], '/cadastroControle', [CadastroControle::class, 'create'])->name('controleCadastro');
// Route::get('/controleLogin', [ControleLogin::class, 'index'])->name('controleLogin');
// Route::get('/controleEvento', [ControleEvento::class, 'teste'])->name('controleEvento');
// Route::get('/logout', [ControleLogout::class, 'index'])->name('controleLogout');
