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
        // $inscricao_atividade = InscricaoAtividade::where('participante_id',session('idUsuario'))->get();
        $inscricao_evento = InscricaoEvento::where('participante_id',session('idUsuario'))->get();
        $inscricao_atividade = InscricaoAtividade::where('participante_id',session('idUsuario'))->get();

        foreach($inscricao_atividade as $valor){
            $atividade[] = Atividade::find($valor->atividade_id);
        }
        
        foreach($inscricao_evento as $valor){
            $evento[] = Evento::find($valor->evento_id);
        }
        
        if(isset($evento)){
            return view('site.showInscricao', compact( 'evento', 'atividade'));
        }else{
            return view('site.showInscricao');
        }

        // // $evento = Evento::latest('id')->first();
        // // return session('idUsuario');

        // $inscricao_evento = InscricaoEvento::where('participante_id', session('idUsuario'))->get();
        // $inscricao_atividade = InscricaoAtividade::where('participante_id', session('idUsuario'))->get();
        // // return $inscricao_evento;

        // for($i=0; $i < count($inscricao_evento); $i++){
        //     $evento[$i] = Evento::select('nome', 'id')->find($inscricao_evento[$i]->evento_id);
        // }
        // if(isset($evento)){
        //     return view('site.showInscricao', compact( 'evento'));
        // }else{
        //     // return redirect()->route('site.perfil',['erro'=>'noinsc']);
        //     return view('site.showInscricao');
        // }
    }

    public function inscricaoEvento(Request $request){
        $inscricao_evento = InscricaoEvento::where('evento_id', $request->idEvento)->
                            where('participante_id', $request->idUsuario)->first();
        if( isset($inscricao_evento) && !empty($inscricao_evento)){
            return 1;
        }else{
            $inscricao_evento_ = new InscricaoEvento();
            $inscricao_evento_->evento_id = $request->idEvento;
            $inscricao_evento_->participante_id = $request->idUsuario;
            $inscricao_evento_->save();
            return redirect()->route('showInscricao');
        }
    }

    public function participarAtividade(){
        $atividades = Atividade::where('evento_id', session('idEvento'))->get();

        foreach ($atividades as $valor){
            $inscricao_atividade[] = InscricaoAtividade::select('atividade_id')->where('atividade_id', $valor->id)->
                                        where('participante_id',session('idUsuario'))->first();
        }
        
        return $inscricao_atividade;
        for($i=0;$i<count($inscricao_atividade);$i++){
            if($inscricao_atividade[$i]->atividade_id!=null){
                $inscrito[] = $inscricao_atividade[$i]->atividade_id;
            }
        }
        
        return view('site.participarAtividade', compact('atividades', 'inscrito'));
    }

    public function inscreverEmAtividade(Request $request){
        $inscricao_atividade = new InscricaoAtividade();
        $inscricao_atividade->participante_id = $request->participante_id;
        $inscricao_atividade->atividade_id = $request->atividade_id;
        $inscricao_atividade->save();

        return redirect()->route('participarAtividade');
    }
}
