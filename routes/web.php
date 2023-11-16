<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControleLogin;
use App\Http\Controllers\ControleCriarAtividade;
use App\Http\Controllers\ControleCriarEvento;
use App\Http\Controllers\ControleEvento;


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

Route::post('/controleCriarAtividade', [ControleCriarAtividade::class, 'index'])->name('controleCriarAtividade');
Route::get('/controleLogin', [ControleLogin::class, 'index'])->name('controleLogin');
Route::post('/controleCriarEvento', [ControleCriarEvento::class, 'index'])->name('controleCriarEvento');
Route::get('/controleEvento', [ControleEvento::class, 'teste'])->name('controleEvento');