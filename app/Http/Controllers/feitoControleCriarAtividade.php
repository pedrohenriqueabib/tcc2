<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;

class ControleCriarAtividade extends Controller
{
    public function index(Request $request){
        /*
        $atividade = new Atividade;
        $atividade->nome = $request->nomeAtividade;
        $atividade->descricao = $request->descricaoAtividade;
        $atividade->palavras_chaves = $request->palavrasChaves;
        $atividade->area = $request->areaAtividade;
        $atividade->subarea = $request->subareaAtividade;
        $atividade->carga_horaria = $request->cargaHoraria;
        $atividade_evento_id = $request->eventoId;
        */
        return $request->post('_token');
    }
}
