<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Organizacao;
use App\Models\Comite;
use App\Models\ComiteOrganizador;

class controleCriarEvento extends Controller
{
    public function create(Request $request){
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
       $comite_organizador->organizador_id = $organizador->id;
       $comite_organizador->save();

    //    return redirect()->route('site.evento');

        return $evento->id;
    }
}
