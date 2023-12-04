<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizador;
use App\Models\Organizacao;
use App\Models\ComiteOrganizador;
use App\Models\Comite;

class ComiteController extends Controller
{
    //Rota para redirecionar para o formulário
    public function formComite($id){
        $organizacao = Organizacao::where('id', $id)->first();
        $organizador = Organizador::all();

        // return $organizacao;
        return view("site.criarComite", ['id'=>$id], compact('organizador', 'organizacao'));
    }

    public function salvarComite(Request $request){
        $comite = new Comite();
        $comite->nome = $request->nomeComite;
        $comite->descricao = $request->descricaoComite;
        $comite->organizacao_id = $request->organizacao_id;
        $comite->save();

        $comite_organizador = new ComiteOrganizador();
        $lista = explode('+', $request->membros);
        for( $i = 0; $i < count($lista)-1; $i++){
            $comite_organizador->organizador_id = $lista[$i];
            $comite_organizador->comite_id = $comite->id;
        }

        return redirect()->route('showEvent');
    }
}
