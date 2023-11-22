<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizador;
use App\Models\Responsavel;
use App\Models\Participante;
use App\Models\Colaborador;

class CadastroControle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if( $request->formTipo == 'formOrganizador'){
            $organizador = new Organizador();
            $organizador->nome = $request->nome;
            $organizador->telefone = $request->telefone;
            $organizador->email = $request->email;
            $organizador->cargo = $request->cargo;
            $organizador->matricula = $request->matricula;
            // $organizador->senha = $request->password;
            $organizador->save();

        // session()->put('organizador', $request->nome);
        // session()->put('token', $request->_token);
        // session()->put('organizador_id', $organizador->id);
            session()->put('nome', $request->nome);
            session()->put('email', $request->email);
            
            return redirect('/perfil');

        }else if($request->formTipo == 'formResponsavel'){
            $responsavel = new Responsavel();
            $responsavel->nome = $request->nome;
            $responsavel->telefone = $request->telefone;
            $responsavel->email = $request->email;
            $responsavel->cargo = $request->cargo;
            $responsavel->matricula = $request->matricula;
            // $responsavel->password = $request->password;
            $responsavel->save();
            return "responsavel feito";
        }else if($request->formTipo == 'formParticipante'){
            $participante = new Participante();
            $participante->nome = $request->participante;
            $participante->telefone = $request->telefone;
            $participante->email = $request->email;
            // $participante->password = $request->password;
            $participante->save();
            return "participante feito";
        }else if($request->formTipo == 'formColaborador'){
            $colaborador = new Colaborador();
            $colaborador->nome = $request->nome;
            $colaborador->telefone = $request->telefone;
            $colaborador->email = $request->email;
            $colaborador->descricao = $request->descricao;
            // $colaborador->password = $request->password;
            $colaborador->save();
            return redirect()->route('site.perfil');
        }

    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
