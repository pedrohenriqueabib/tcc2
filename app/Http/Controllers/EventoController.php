<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Atividade;
use App\Models\Organizacao;
use App\Models\Comite;
use App\Models\ComiteOrganizador;
use App\Models\Organizador;

class EventoController extends Controller
{
    public function formEvent(){
        // $organizador = '';
        return redirect()->route('site.criarEvento');
    }

    public function save(Request $request){
        $evento = new Evento();
        $evento->nome = $request->nomeEvento;
        $evento->descricao = $request->descricao;
        $evento->edicao = $request->edicao;
        $evento->endereco = $request->endereco;
        $evento->site = $request->site;
        $evento->data_inicio = $request->data_inicio;
        $evento->data_fim = $request->data_fim;
        $evento->save();
 
        $organizacao = new Organizacao();
        $organizacao->nome = $request->nomeOrganizacao;
        $organizacao->evento_id = $evento->id;
        $organizacao->save();
 
        $comite = new Comite();
        $comite->nome = $request->comite;
        $comite->descricao = $request->descricaoComite;
        $comite->organizacao_id = $organizacao->id;
        $comite->save();
 
        $comite_organizador = new ComiteOrganizador();
        $comite_organizador->comite_id = $comite->id;
        $comite_organizador->organizador_id = $request->organizador_id;
        $comite_organizador->save();

        session()->put('idEvento', $evento->id);
        return redirect()->route('showEvent');
    }

    public function show(){
        $id = session('idEvento');
        $evento = Evento::find($id);
        $organizacao = Organizacao::find($evento->id);
        $comite = Comite::where('organizacao_id', $organizacao->id)->get();
        $comite_organizador = [];
        // foreach($comite as $valor){
            $comite_organizador = ComiteOrganizador::where('comite_id',$comite[0]->id)->get();
        // }

        $organizador = Organizador::where('id', $comite_organizador[0]->id)->get();
        $atividade = Atividade::where('evento_id', session('idEvento'))->get();  

        return view('site.evento', compact(
            'evento', 'organizacao','comite','comite_organizador','organizador','atividade'
        ));

        
    }

    public function visualizarEvento($id){
        $evento = Evento::where('id', $id)->first();
        $atividade = Atividade::where('evento_id', $id)->get();
        $organizacao = Organizacao::where('evento_id', $id)->first();
        $comite = Comite::where('organizacao_id', $organizacao->id)->get();

        foreach($comite as $valor){
            $comite_organizador[] = ComiteOrganizador::where('comite_id', $valor->id)->get();
        }

        foreach ($comite_organizador as $valor) {
            echo $valor."<br>";
        }
        

        // return $comite_organizador;
        // return $id;
    }

}
