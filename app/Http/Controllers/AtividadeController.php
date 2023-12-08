<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;
use App\Models\AtividadeHorario;
use App\Models\Responsavel;
use App\Models\Horario;
use App\Models\Local;
use App\Models\Evento;

class AtividadeController extends Controller
{
    public function save(Request $request){        
        $atividade = new Atividade;
        $atividade->nome = $request->nomeAtividade;
        $atividade->descricao = $request->descricaoAtividade;
        $atividade->palavras_chaves = $request->palavrasChaves;
        $atividade->area = $request->areaAtividade;
        $atividade->subarea = $request->subareaAtividade;
        $atividade->carga_horaria = $request->cargaHoraria;
        $atividade->evento_id = $request->eventoId;
        $atividade->responsavel_id = $request->responsavelAtividade;
        $atividade->save();
        // //==========================================================
        
        // $d = date('l', strtotime($request->inicio));
        // $dia_de_semana = [
        //     'Sunday' => 'DOM', 
        //     'Monday'=>"SEG", 
        //     'Tuesday' => 'TER', 
        //     'Wednesday' => 'QUAR', 
        //     "Thursday" => "QUI",
        //     "Friday" => "SEX",
        //     "Saturday" => "SAB"
        // ];

        // $horario->dia_semana = $dia_de_semana[$d];
        // $horario->inicio = $request->inicio;
        // $horario->fim = $request->fim;
        // $horario->carga_horaria = $request->cargaHoraria;
        // $horario->save();
        // //===================================================================
        // $local->nome = $request->nomeLocal;
        // $local->pavimento = $request->pavimento;
        // $local->bloco = $request->bloco;
        // $local->save();

        // $atividade_horario->atividade_id = $atividade->id;
        // $atividade_horario->local_id = $local->id;
        // $atividade_horario->horario_id = $horario->id;

        // return redirect()->route('showAtividade', ['id' => $atividade->id]);
        return redirect()->route('showEvent');
    }

    public function criarAtividade($id){
        $responsavel = Responsavel::all();
        $evento = Evento::where("id", $id)->first();
        
        return view('site.criarAtividade', compact('responsavel', 'evento'));
        // return $id;
        
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
        $atividade = Atividade::where('id', $id)->get('nome');
        $atividade_horario = AtividadeHorario::with('Local', 'Horario')->where('atividade_id', $id)->get();

        return view('site.atividade_horario', ['idAtividade'=>$id], compact('atividade_horario', 'atividade'));
    }

    public function criarHorario($id){
        // return $id;
        return view('site.criarHorario', ['idAtividade'=>$id]);
    }

    public function salvarHorario(Request $request){
        $d = date('l', strtotime($request->inicio));
        $dias = [
                'Sunday' => 'DOM', 
                'Monday'=>"SEG", 
                'Tuesday' => 'TER', 
                'Wednesday' => 'QUAR', 
                "Thursday" => "QUI",
                "Friday" => "SEX",
                "Saturday" => "SAB"
            ];
        $dia_semana = $dias[$d];

        $horario = new Horario();
        $horario->inicio =  $request->inicio;
        $horario->fim = $request->fim;
        $horario->carga_horaria = $request->cargaHoraria;
        $horario->dia_semana = $dia_semana;
        $horario->save();

        $local = new Local();
        $local->nome = $request->nome;
        $local->pavimento = $request->pavimento;
        $local->bloco = $request->bloco;
        $local->save();

        $atividade_horario = new AtividadeHorario();
        $atividade_horario->horario_id = $horario->id;
        $atividade_horario->local_id = $local->id;
        $atividade_horario->atividade_id = $request->idAtividade;
        $atividade_horario->save();

        return redirect()->route('showAtividade', ['id'=>$request->idAtividade]);
    }
}
