<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Atividade;
use App\Models\Participante;
use App\Models\InscricaoEvento;
use App\Models\InscricaoAtividade;
use App\Models\ColaboradorAtividade;


class InscricaoController extends Controller
{
    public function showInscricao(){
        // $evento = Evento::latest('id')->first();
        // return session('idUsuario');

        $inscricao_evento = InscricaoEvento::where('participante_id', session('idUsuario'))->get();
        $inscricao_atividade = InscricaoAtividade::where('participante_id', session('idUsuario'))->get();

        return view('site.showInscricao', compact('inscricao_atividade', 'inscricao_evento'));
    }
}
