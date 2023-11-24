<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcessoController extends Controller
{
    public function login() { // exibe formulário para autenticação a resolver
        $organizador = Organizador::where('email', $request->email)->first();//->where('password', $request->password)->first();
        $colaborador = Colaborador::where('email', $request->email)->first();//->where('password', $request->password)->first();
        $participante = Participante::where('email', $request->email)->first();//->where('password', $request->password)->first();
        $responsavel = Responsavel::where('email', $request->email)->first();//->where('password', $request->password)->first();
        
        if($organizador){
            session()->put('tipoPerfil', 'Organizador');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$organizador->nome);
            session()->put('idUsuario', $organizador->idUsuario);
            session()->put('emailUsuario', $responsavel->email);
            
            return redirect()->route('site.home');
        }else if($colaborador){
            session()->put('tipoPerfil', 'Colaborador');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$colaborador->nome);
            session()->put('idUsuario', $colaborador->idUsuario);
            session()->put('emailUsuario', $responsavel->email);
            
            return redirect()->route('site.home');
        }else if($participante){
            session()->put('tipoPerfil', 'Participante');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$participante->nome);
            session()->put('idUsuario', $participante->idUsuario);
            session()->put('emailUsuario', $responsavel->email);

            return redirect()->route('site.home');
        }else if($responsavel){
            session()->put('tipoPerfil', 'Responsavel');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$responsavel->nome);
            session()->put('idUsuario', $responsavel->idUsuario);
            session()->put('emailUsuario', $responsavel->email);
            
            return redirect()->route('site.home');
        }else{
            return redirect()->route('site.login', ['erro'=>'nuser']);
        }
    }

    public function auth() { // autenticar o usuario

    }

    public function signup () { // exibe formulário para cadastro de novo usuario

    }

    public function save() { //salva novo usuário
        if( $request->formTipo == 'formOrganizador'){
            $organizador = new Organizador();
            $organizador->nome = $request->nome;
            $organizador->telefone = $request->telefone;
            $organizador->email = $request->email;
            $organizador->cargo = $request->cargo;
            $organizador->matricula = $request->matricula;
            // $organizador->senha = $request->password;
            $organizador->save();

            session()->put('userName', $request->nome);
            session()->put('userEmail', $request->email);
            session()->put('tipoPerfil', 'Organizador');
            
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

            session()->put('nome', $request->nome);
            session()->put('email', $request->email);
            session()->put('tipoPerfil', 'Responsavel');
            
            return redirect('/perfil');

        }else if($request->formTipo == 'formParticipante'){
            $participante = new Participante();
            $participante->nome = $request->participante;
            $participante->telefone = $request->telefone;
            $participante->email = $request->email;
            // $participante->password = $request->password;
            $participante->save();

            session()->put('nome', $request->nome);
            session()->put('email', $request->email);
            session()->put('tipoPerfil', 'Participante');
            
            return redirect('/perfil');

        }else if($request->formTipo == 'formColaborador'){
            $colaborador = new Colaborador();
            $colaborador->nome = $request->nome;
            $colaborador->telefone = $request->telefone;
            $colaborador->email = $request->email;
            $colaborador->descricao = $request->descricao;
            // $colaborador->password = $request->password;
            $colaborador->save();

            session()->put('nome', $request->nome);
            session()->put('email', $request->email);
            session()->put('tipoPerfil', 'Colaborador');
            
            return redirect('/perfil');
        }
    }

    public function forgetPassword () {
        // exibe formulário para recebimento de nova senha
    }

    public function logout(){
        Session::flush();
        return view('site.home');
    }

}
