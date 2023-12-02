<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use App\Models\Organizador;
use App\Models\Colaborador;
use App\Models\Participante;
use App\Models\Responsavel;
use App\Models\Comite;
use App\Models\ComiteOrganizador;
use App\Models\Organizacao;
use App\Models\Evento;

class AcessoController extends Controller
{
    public function login() { // exibe formulário para autenticação a resolver
        return view('site.login');
    }

    public function auth(Request $request) { // autenticar o usuario
        $organizador = Organizador::where('email', $request->email)->first();//->where('password', $request->password)->first();
        $colaborador = Colaborador::where('email', $request->email)->first();//->where('password', $request->password)->first();
        $participante = Participante::where('email', $request->email)->first();//->where('password', $request->password)->first();
        $responsavel = Responsavel::where('email', $request->email)->first();//->where('password', $request->password)->first();
        
        if($organizador){
            session()->put('tipoPerfil', 'Organizador');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$organizador->nome);
            session()->put('idUsuario', $organizador->id);
            session()->put('emailUsuario', $organizador->email);
            
            // return redirect()->route('site.home');
            return redirect()->route('listEvents');


        }else if($colaborador){
            session()->put('tipoPerfil', 'Colaborador');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$colaborador->nome);
            session()->put('idUsuario', $colaborador->id);
            session()->put('emailUsuario', $colaborador->email);
            
            // return redirect()->route('site.home');
            return redirect()->route('listEvents');

        }else if($participante){
            session()->put('tipoPerfil', 'Participante');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$participante->nome);
            session()->put('idUsuario', $participante->id);
            session()->put('emailUsuario', $participante->email);

            // return redirect()->route('site.home');
            return redirect()->route('listEvents');

        }else if($responsavel){
            session()->put('tipoPerfil', 'Responsavel');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$responsavel->nome);
            session()->put('idUsuario', $responsavel->id);
            session()->put('emailUsuario', $responsavel->email);
            
            // return redirect()->route('site.home');
            return redirect()->route('listEvents');

        }else{
            return redirect()->route('site.login', ['erro'=>'nuser']);
        }
        // return 'autenticar ' . $request->email;
    }
    
    public function listEvents(){

        $com_org = ComiteOrganizador::where('organizador_id', session('idUsuario'))->first();
        $comite = Comite::where('id', $com_org->comite_id)->get();
        $organizacao = Organizacao::where('id', $comite[0]->organizacao_id)->first();
        $evento = Evento::find($organizacao->evento_id);

        // return $evento;
        return view('site.perfil', compact('evento'));
    }

    public function signup () { // exibe formulário para cadastro de novo usuario
        return view();
    }

    public function save(Request $request) { //salva novo usuário
        if( $request->formTipo == 'formOrganizador'){
            $organizador = new Organizador();
            $organizador->nome = $request->nome;
            $organizador->telefone = $request->telefone;
            $organizador->email = $request->email;
            $organizador->cargo = $request->cargo;
            $organizador->matricula = $request->matricula;
            // $organizador->senha = $request->password;
            $organizador->save();

            session()->put('token',$request->_token);
            session()->put('nomeUsuario', $request->nome);
            session()->put('emailUsuario', $request->email);
            session()->put('idUsuario', $organizador->id);
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

            session()->put('token',$request->_token);
            session()->put('nomeUsuario', $request->nome);
            session()->put('emailUsuario', $request->email);
            session()->put('idUsuario', $responsavel->id);
            session()->put('tipoPerfil', 'Responsavel');
            
            return redirect('/perfil');

        }else if($request->formTipo == 'formParticipante'){
            $participante = new Participante();
            $participante->nome = $request->participante;
            $participante->telefone = $request->telefone;
            $participante->email = $request->email;
            // $participante->password = $request->password;
            $participante->save();

            session()->put('token',$request->_token);
            session()->put('nomeUsuario', $request->nome);
            session()->put('emailUsuario', $request->email);
            session()->put('idUsuario', $participante->id);
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

            session()->put('token',$request->_token);
            session()->put('nomeUsuario', $request->nome);
            session()->put('emailUsuario', $request->email);
            session()->put('idUsuario', $colaborador->id);
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
