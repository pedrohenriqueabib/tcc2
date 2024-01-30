<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizador;
use App\Models\Organizacao;
use App\Models\ComiteOrganizador;
use App\Models\Comite;
use App\Models\Evento;

class ComiteController extends Controller
{
    //Rota para redirecionar para o formulário
    public function formComite($id, $evento_id){
        $organizacao = Organizacao::where('id', $id)->first();
        $organizador = Organizador::all();

        // return $organizacao;
        return view("site.criarComite", ['id'=>$id, 'evento_id'=> $evento_id], compact('organizador', 'organizacao'));
    }

    public function salvarComite(Request $request){
        $comite = new Comite();
        $comite->nome = $request->nomeComite;
        $comite->descricao = $request->descricaoComite;
        $comite->organizacao_id = $request->organizacao_id;
        $comite->save();

        // $comite_organizador = new ComiteOrganizador();
        $lista = explode('+', $request->membros);
        for( $i = 0; $i < count($lista)-1; $i++){
            $comite_organizador = new ComiteOrganizador();
            $comite_organizador->organizador_id = $lista[$i];
            $comite_organizador->comite_id = $comite->id;
            $comite_organizador->save();
        }

        return redirect()->route('showEvent', ['id'=>$request->evento_id]);
        // return $lista;
    }

    public function showComite($id, $evento_id){
        $comite = Comite::where('id', $id)->first();
        $evento = Evento::where('id', $evento_id)->first();
        return view('site.comite', compact('comite', 'evento'));
        // return $id;
    }

    public function showMembrosComite($id, $evento_id){
        $comite = Comite::where('id', $id)->first();
        $comite_organizador = ComiteOrganizador::where('comite_id', $id)->get('organizador_id');
        
        foreach($comite_organizador as $valor){
            $organizador[] = Organizador::where('id', $valor->organizador_id)->get();
        }
        
        $evento = Evento::where('id', $evento_id)->first();

        $listaSelecionados = [];
        foreach($organizador as $valor){
            array_push($listaSelecionados, $valor[0]->id);
        }

        $organizadores = Organizador::select('id')->get();

        for( $i=0; $i < count($organizadores); $i++){
            if( !in_array($organizadores[$i]->id,$listaSelecionados)){
                $listaMembrosComite[] = Organizador::select('id', 'nome')->where('id',$organizadores[$i]->id)->first();
            }
        }

        return view('site.membrosComite', compact('evento', 'comite', 'organizador', 'listaMembrosComite'));
    }

    public function editarComite(Request $request){
        $comite = Comite::where('id', $request->idcomite)->first();
        $comite->nome = $request->nomecomite;
        $comite->descricao = $request->descricaocomite;
        $comite->save();

        return redirect()->route('showComite', ['id'=>$request->idcomite, 'evento_id'=>$request->idEvento]);
    }

    public function adicionarMembro(Request $request){
        $lista = explode('+', $request->selecionados);

        $comite_organizador_ = ComiteOrganizador::
                                where('comite_id', $request->comite_id)->pluck('organizador_id')->toArray();

        for($i = 0; $i<count($lista)-1; $i++) {
            if(!in_array($lista[$i], $comite_organizador_)){
                $comite_organizador = new ComiteOrganizador();
                $comite_organizador->organizador_id = $lista[$i];
                $comite_organizador->comite_id = $request->comite_id;
                $comite_organizador->save();
            }
        }

        return redirect()->route('showMembrosComite', ['id'=>$request->comite_id, 'evento_id'=>$request->evento_id]);

    }

    public function removerMembro(Request $request){
        $comite_organizador = ComiteOrganizador::where('organizador_id',$request->organizador_id)->
                                where('comite_id',$request->comite_id)->first();
        
        if($comite_organizador){
            $comite_organizador->delete();
        }

        return redirect()->route('showMembrosComite', ['id'=>$request->comite_id, 'evento_id'=>$request->evento_id]); 
    }

    public function excluirComite(Request $request){
        $comite_organizador = ComiteOrganizador::where('comite_id', $request->comite_id)->delete();
        $comite = Comite::where('id', $request->comite_id)->delete();
        
        return redirect()->route('showEvent', ['id'=>$request->evento_id]);
    }
}
