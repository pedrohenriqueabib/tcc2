<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;
use App\Models\AtividadeHorario;
use App\Models\Responsavel;
use App\Models\Horario;
use App\Models\Local;
use App\Models\Evento;
use App\Models\Colaborador;
use App\Models\ColaboradorAtividade;
use App\Models\InscricaoAtividade;

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
        
        return redirect()->route('showEvent');
    }

    public function criarAtividade($id){
        $responsavel = Responsavel::all();
        $evento = Evento::where("id", $id)->first();
        
        return view('site.criarAtividade', compact('responsavel', 'evento'));        
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
        $atividade = Atividade::select('id', 'nome')->where('id', $id)->get();
        $atividade_horario = AtividadeHorario::with('Local', 'Horario')->where('atividade_id', $id)->get();

        return view('site.atividade_horario', ['idAtividade'=>$id], compact('atividade_horario', 'atividade'));
    }

    public function criarHorario($id){
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
        $dia_semana = $dias[$d].'';

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

    public function showColaboradores($id){
        $atividade = Atividade::where('id', $id)->first();
        $colaborador_atividade = ColaboradorAtividade::where('atividade_id', $atividade->id)->get();
        $colaborador = Colaborador::all();

        if(!empty($colaborador_atividade))
        {
            $selecionados = [];
            foreach ($colaborador_atividade as $valor) {
                array_push($selecionados, Colaborador::where('id', $valor->colaborador_id)->get());
            }
            // return $selecionados;
            return view('site.showColaboradores', compact('atividade', 'colaborador', 'selecionados'));
        }else{
            return view('site.showColaboradores', compact('atividade', 'colaborador'));
        }
    }

    public function adicionarColaborador(Request $request){        
        $listaIds = ColaboradorAtividade::where('atividade_id', $request->idAtividade)->get('colaborador_id');
        $lista = explode(',',$request->listaSelect);
        foreach ($lista as $valor){
            if($this->verificar($valor, $listaIds) != 1 && !empty($valor)){
                $colaborador_atividade = new ColaboradorAtividade();
                $colaborador_atividade->colaborador_id = $valor;
                $colaborador_atividade->atividade_id = $request->idAtividade;
                $colaborador_atividade->save();
            }
        }
        
        return redirect()->route('showColaboradores', ['id'=>$request->idAtividade]);        
    }

    public function verificar($valor, $listaIds){
        for( $i = 0; $i < count($listaIds); $i++){
            if($listaIds[$i]->colaborador_id == $valor){
                return 1;
            }
        }
        return 0;
    }

    public function colaborarAtividade($evento_id, $participante_id){
        $atividade_evento = Atividade::select('nome','id')->where('evento_id', $evento_id)->get();
        
        return view("site.colaborarAtividade", compact('atividade_evento','participante_id','evento_id'));
    }

    public function addParticipanteColaborador(Request $request){
        $inscricao_atividade = InscricaoAtividade::where('atividade_id', $request->atividade_id)->
                                where('participante_id', $request->participante_id)->first();
        if($inscricao_atividade){
            return redirect()->route('visualizarEvento', ['id'=>$request->evento_id]);
        }else{
            $inscricao_atividade = new InscricaoAtividade();
            $inscricao_atividade->atividade_id = $request->atividade_id;
            $inscricao_atividade->participante_id = $request->participante_id;
            $inscricao_atividade->save();
            return redirect()->route('visualizarEvento', ['id'=>$request->evento_id]);
        }
    }

    public function removerColaborador(Request $request){
        $colaborador_atividade = ColaboradorAtividade::where('atividade_id', $request->atividade_id)->
                                where('colaborador_id', $request->colaborador_id)->first();

        if($colaborador_atividade){
            $colaborador_atividade->delete();
        }
        
        return redirect()->route('showColaboradores', ['id'=>$request->atividade_id]);
    }

    public function removerAtividade(Request $request){
        $atividade_horario = AtividadeHorario::where('atividade_id', $request->atividade_id)->get();
        
        foreach($atividade_horario as $valor){
            $local = Local::where('id', $valor->local_id)->delete();
            $horario = Horario::where('id', $valor->horario_id)->delete();
        }

        $atividade = Atividade::where('id', $request->atividade_id)->first();
        $atividade->delete();

        $colaborador_atividade = ColaboradorAtividade::where('atividade_id', $request->atividade_id)->delete();
        $inscricao_atividade = InscricaoAtividade::where('atividade_id', $request->atividade_id)->delete();
        $atividade_horario = AtividadeHorario::where('atividade_id', $request->atividade_id)->delete();

        return redirect()->route('showEvent');
    }
}
