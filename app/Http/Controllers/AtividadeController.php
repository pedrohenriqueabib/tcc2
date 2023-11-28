<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;
use App\Models\AtividadeHorario;

class AtividadeController extends Controller
{
    public function create(Request $request){
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

    public function showAtividade($id){
        $atividade = Atividade::with('Evento', 'Responsavel')->where('id', $id)->get();

        return view('site.atividade', compact('atividade'));
    }

    public function updateAtividade(Request $request){
        $atividade = Atividade::find($request->idAtividade);
        $atividade->nome = $request->nomeAtividade;
        $atividade->descricao= $request->descricaoAtividade;
        $atividade->area = $request->area;
        $atividade->subarea = $request->subarea;
        $atividade->carga_horaria = $request->cargaHoraria;
        $atividade->save();
        
        return redirect()->route('showAtividade', ['id' => $request->idAtividade]);
    }

    public function showAtividadeHorario($id){
        $atividade_horario = AtividadeHorario::with('Local', 'Horario')->where('atividade_id', $id)->get();

        return view('site.atividade_horario', compact('atividade_horario'));
    }
}
