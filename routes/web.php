<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AcessoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\ComiteController;
use App\Http\Controllers\InscricaoController;

/**
 * Rotas para AcessoController
 */
Route::prefix('acesso')->group(function () {

    //Rota exibir eventos do usuário
    Route::get('/showPerfil', [AcessoController::class, 'showPerfil'])->name('showPerfil');

    // Rota para autenticar usuario
    Route::get('/login', [AcessoController::class, 'login'])->name('login');

    // Rota para autenticar usuario
    Route::get('/auth', [AcessoController::class, 'auth'])->name('autenticar');

    // Rota para formulário de cadastro de login
    Route::get('/signup', [AcessoController::class, 'signup'])->name('signup');

    // Rota para exibir o formulário para alteração de senha
    Route::get('forgetPassword', [AcessoController::class, 'forgetPassword'])->name('forgetPassword');

    // Rota para salvar um novo funcionário (via método POST)
    Route::post('/', [AcessoController::class, 'save'])->name('saveUser');

    // Rota para sair da sessão
    Route::get('/logout', [AcessoController::class, 'logout'])->name('logout');

    //Rota para coletar dados para o usuário poder editar
    Route::get('/editarPerfil', [AcessoController::class, 'editarPerfil'])->name('editarPerfil');

    //Rota par atualizar os dados do usuario
    Route::post('editarUsuario', [AcessoController::class, 'editarUsuario'])->name('editarUsuario');


    // Rota para atualizar um funcionário existente (via método PUT)
    //Route::put('/', [FuncionariosController::class, 'update']);

    // Rota para verificar se um CPF já está cadastrado
    //Route::get('checkCPF', [FuncionariosController::class, 'checkCPF'])->name('cpfJaCadastrado');
});

Route::prefix('evento')->group( function(){
    // Rota para exibir evento
    Route::get('/showEvent/{id}', [EventoController::class, 'showEvent'])->name('showEvent');
    
    // Rota para formulário de evento
    Route::get('/formEvent', [EventoController::class, 'formEvent'])->name('formEvent');

    // Rota para salvar um evento
    Route::post('/saveEvent', [EventoController::class, 'save'])->name('saveEvent');

    // Rota para atualizar evento
    Route::post('/editarEvento', [EventoController::class, 'editarEvento'])->name('editarEvento');

    //Rota para o participante visualizar o evento
    Route::get('/visualizarEvento/{id}',[EventoController::class, 'visualizarEvento'])->name('visualizarEvento');
    
    //Rota para o participante se cadastrar no evento
    Route::post('/participarEvento', [EventoController::class, 'participarEvento'])->name('participarEvento');
});


Route::prefix('atividade')->group( function (){
    //Rota para exibir formulário de criação de atividade
    Route::get('criarAtividade/{id}', [AtividadeController::class, 'criarAtividade'])->name('criarAtividade');
    // Rota para salvar a atividade a ser criada
    Route::post('salvarAtividade', [AtividadeController::class, 'save'])->name('salvarAtividade');

    //Rota para atualizar
    Route::post('updateAtividade', [AtividadeController::class, 'updateAtividade'])->name('updateAtividade');

    //Rota para evibir atividade
    Route::get('showAtividade/{id}', [AtividadeController::class, 'showAtividade'])->name('showAtividade');

    //Rota para exibir horários
    Route::get('showAtividadeHorario/{id}', [AtividadeController::class, 'showAtividadeHorario'])->name('showAtividadeHorario');

    //Rota para definir os horários da atividade
    Route::get('criarHorario/{id}', [AtividadeController::class, 'criarHorario'])->name('criarHorario');

    //Rota para salvar o horario
    Route::post('salvarHorario', [AtividadeController::class, 'salvarHorario'])->name('salvarHorario');

    //Rota para exibir os colaboradores da atividade
    Route::get('/showColaboradores/{id}', [AtividadeController::class, 'showColaboradores'])->name('showColaboradores');

    //Rota para adicionar colaboradores a uma atividade
    Route::post('/adicionarColaborador', [AtividadeController::class, 'adicionarColaborador'])->name('adicionarColaborador');

    //Rota para selecionar dados para o participante escolher em qual atividade irá colaborar
    Route::get('/inscreverAtividade/{id}', [AtividadeController::class, 'inscreverAtividade'])->name('inscreverAtividade');

    //Rota para adição do participante para colaborar na atividade
    // Route::post('/addParticipanteColaborador', [AtividadeController::class, 'addParticipanteColaborador'])->name('addParticipanteColaborador');

    //rota para remoção de colaborador
    Route::post('removerColaborador', [AtividadeController::class, 'removerColaborador'])->name('removerColaborador');

    //Rota para exclusão de tividade e seus afins
    Route::post('removerAtividade', [AtividadeController::class, 'removerAtividade'])->name('removerAtividade');

    //Rota para o colaborador visualizar as atividades das quais participa
    Route::get('colaboradorAtividade', [AtividadeController::class, 'colaboradorAtividade'])->name('colaboradorAtividade');

    //Rota para o coletar as informações da atividade a qual o colaborador deseja visualizar
    Route::get('showColaboradorAtividade', [AtividadeController::class, 'showColaboradorAtividade'])->name('showColaboradorAtividade');
    
    //Rota para o responsável visuzalizar a quais atividades ele é responsável
    Route::get('responsavelAtividade', [AtividadeController::class, 'responsavelAtividade'])->name('responsavelAtividade');
});


Route::prefix('comite')->group( function(){

    //Rota para formulário para criar comitê
    Route::get('formComite/{id}', [ComiteController::class, 'formComite'])->name('formComite');

    //Rota para "salvar" o comitê no banco de dados
    Route::post('salvarComite', [ComiteController::class, 'salvarComite'])->name('salvarComite');

    //Rota para coletar detalhes do comitê
    Route::get('showComite/{id}/{evento_id}', [ComiteController::class, 'showComite'])->name('showComite');
    
    //Rota para coletar membros do comitê
    Route::get('showComiteMembros/{id}/{evento_id}', [ComiteController::class, 'showMembrosComite'])->name('showMembrosComite');

    //Rota para atualizar dados do comite
    Route::post('editarComite', [ComiteController::class, 'editarComite'])->name('editarComite');

    //Rota para adicionar novos membros ao comite
    Route::post('adicionarMembro', [ComiteController::class, 'adicionarMembro'])->name('adicionarMembro');

    //Rota para remoção de membro de comitê
    Route::post('removerMembro', [ComiteController::class, 'removerMembro'])->name('removerMembro');

    //Rota para excluir comite
    Route::post('excluirComite', [ComiteController::class, 'excluirComite'])->name('excluirComite');
});

Route::prefix('inscricao')->group(function(){
    //Routa para exibir as inscrições do participante
    Route::get('showInscricao', [InscricaoController::class, 'showInscricao'])->name('showInscricao');

    //Rota para inscrever participante no evento
    Route::post('inscricaoEvento', [InscricaoController::class, 'inscricaoEvento'])->name('inscricaoEvento');

    //Rota para auxiliar a inscrever participante em atividades
    Route::get('participarAtividade', [InscricaoController::class,'participarAtividade'])->name('participarAtividade');

    //Rota para registrar o participante em "inscricao_atividade"
    Route::post('inscreverEmAtividade', [InscricaoController::class,'inscreverEmAtividade'])->name('inscreverEmAtividade');
});

//Rota para uma controller que irá redicrecionar para a view da página inicial 
Route::get('/', [AcessoController::class, 'home'])->name('home');

//Rota para a página para visuzalizar evento
Route::get('/visualizarEvento', function(){
    return view('site.visualizarEvento');
})->name('site.visualizarEvento');

//Rota para a página inicial
Route::get('/home', function(){
    return view('site.home');
})->name('site.home');

//Rota da página onde os horários serão exibidos
Route::get('/atividade_horario', function(){
    return view('site.atividade_horario');
})->name('site.atividade_horario');

//Rota para a página de login
Route::get('/login', function(){
    return view('site.login');
})->name('site.login');

//Rota para a página de cadastro
Route::get('/cadastro', function(){
    return view('site.cadastro');
})->name('site.cadastro');

//Rota para a página de criação de eventos
Route::get('/criarEvento', function(){
    return view('site.criarEvento');
})->name('site.criarEvento');

//Rota para criar Atividades
Route::get('/criarAtividade', function(){
    return view('site.criarAtividade');
})->name('site.criarAtividade');

//Rota para visualizar o perfil do usuário
Route::get('/perfil', function(){
    return view('site.perfil');
})->name('site.perfil');

//Rota para visualizar os detalhes de uma atividade
Route::get('/atividade', function(){
    return view('site.atividade');
})->name('site.atividade');

//Rota para visualizar detalhes de um evento
Route::get('/evento', function(){
    return view('site.evento');
})->name('site.evento');

//Rota para criação de comitê
Route::get('/criarComite/{id}', function(){
    return view('site.criarComite');
})->name('site.criarComite');

//Rota para exibição de dados do comitê
Route::get('/comite', function(){
    return view('site.comite');
})->name('site.comite');

//Rota para visualizar membros do comitê
Route::get('/membrosComite', function(){
    return view('membrosComite');
})->name('site.membrosComite');

//Rota para o participante colaborar com uma atividade
Route::get('/inscreverAtividade', function(){
    return view('inscreverAtividade');
})->name('site.inscreverAtividade');

//Rota para o participante se inscrever em atividades do Evento
Route::get('participarAtividade', function(){
    return view('participarAtividade');
})->name('site.participarAtividade');

//Rota para o Colaborador visualizar de quais atividades participa
Route::get('colaboradorAtividade', function(){
    return view('colaboradorAtividade');
})->name('site.colaboradorAtividade');

//Rota onde o colaborador verá informações sobre a atividade da qual ele participa
Route::get('showColaboradorAtividade', function(){
    return view('showColaboradorAtividade');
})->name('site.showColaboradorAtividade');

//Rota para o responsável visualizar a atividade ele é responsável
Route::get('showResponsavelAtividade', function(){
    return view('showResponsavelAtividade');
})->name('site.showResponsavelAtividade');

//Rota para o usuario editar seu perfil
Route::get('editarPerfil', function(){
    return view('editarPerfil');
})->name('site.editarPerfil');