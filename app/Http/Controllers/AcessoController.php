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

    public function home(){
        $evento = Evento::latest('id')->first();
        if(isset($evento) && !empty($evento)){
            $organizacao = Organizacao::where('evento_id', $evento->id)->first();
            $comite = Comite::where('organizacao_id', $organizacao->id)->first();
            $comite_organizador = ComiteOrganizador::where('comite_id', $comite->id)->get();
            $organizador = Organizador::where('id', $comite_organizador[0]->organizador_id)->get();
            
            return view('site.home', compact('evento','organizacao','comite','comite_organizador','organizador'));
        }else{
            return view('site.home');
        }
    }

    public function auth(Request $request) { // autenticar o usuario
        $organizador = Organizador::where('email', $request->email)->where('password', $request->password)->first();
        $colaborador = Colaborador::where('email', $request->email)->where('password', $request->password)->first();
        $participante = Participante::where('email', $request->email)->where('password', $request->password)->first();
        $responsavel = Responsavel::where('email', $request->email)->where('password', $request->password)->first();
        
        if($organizador){
            session()->put('tipoPerfil', 'Organizador');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$organizador->nome);
            session()->put('idUsuario', $organizador->id);
            session()->put('emailUsuario', $organizador->email);
            
            return redirect()->route('home');
        }else if($colaborador){
            session()->put('tipoPerfil', 'Colaborador');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$colaborador->nome);
            session()->put('idUsuario', $colaborador->id);
            session()->put('emailUsuario', $colaborador->email);
            
            return redirect()->route('home');
        }else if($participante){
            session()->put('tipoPerfil', 'Participante');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$participante->nome);
            session()->put('idUsuario', $participante->id);
            session()->put('emailUsuario', $participante->email);
            
            return redirect()->route('home');
        }else if($responsavel){
            session()->put('tipoPerfil', 'Responsavel');
            session()->put('token',$request->_token);
            session()->put('nomeUsuario',$responsavel->nome);
            session()->put('idUsuario', $responsavel->id);
            session()->put('emailUsuario', $responsavel->email);
            
            return redirect()->route('home');
        }else{
            return redirect()->route('site.login', ['erro'=>'nuser']);
        }
    }
    
    public function showPerfil(){
        if(session('tipoPerfil') == 'Organizador'){
            $comite_organizador = ComiteOrganizador::where('organizador_id', session('idUsuario'))->get();
            if(isset($comite_organizador) && !empty($comite_organizador)){        
                foreach ($comite_organizador as $value) {
                    $comite[] = Comite::select('organizacao_id')->where('id', $value->comite_id)->get();
                }

                if( !empty($comite)&&isset($comite)){
                    for($i=0 ; $i < count($comite); $i++) {
                        foreach($comite[$i] as $valor){
                            $organizacao[] = Organizacao::where('id', $valor->organizacao_id)->get();
                        }
                    }
    
                    for( $i = 0; $i<count($organizacao); $i++){
                        foreach($organizacao[$i] as $valor){
                            $evento[] = Evento::where('id',$valor->id)->get();
                        }
                    }
    
                    return view('site.perfil', compact('evento'));
                }else{
                    return view('site.perfil');
                }
            }
        }else{
            return view('site.perfil');
        }
    }
    
    public function save(Request $request) { //salva novo usuário
       
        if($this->verificarExistente($request->email, $request->formTipo) == 1){
            return redirect()->route('site.cadastro', ['erro'=>'existente']);
        }else{
            if( $request->formTipo == 'formOrganizador'){
                $organizador = new Organizador();
                $organizador->nome = $request->nome;
                $organizador->telefone = $request->telefone;
                $organizador->email = $request->email;
                $organizador->cargo = $request->cargo;
                $organizador->matricula = $request->matricula;
                $organizador->password = $request->password;
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
                $responsavel->password = $request->password;
                $responsavel->save();

                session()->put('token',$request->_token);
                session()->put('nomeUsuario', $request->nome);
                session()->put('emailUsuario', $request->email);
                session()->put('idUsuario', $responsavel->id);
                session()->put('tipoPerfil', 'Responsavel');
                
                return redirect('/perfil');

            }else if($request->formTipo == 'formParticipante'){
                $participante = new Participante();
                $participante->nome = $request->nome;
                $participante->telefone = $request->telefone;
                $participante->email = $request->email;
                $participante->password = $request->password;
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
                $colaborador->password = $request->password;
                $colaborador->save();

                session()->put('token',$request->_token);
                session()->put('nomeUsuario', $request->nome);
                session()->put('emailUsuario', $request->email);
                session()->put('idUsuario', $colaborador->id);
                session()->put('tipoPerfil', 'Colaborador');
                
                return redirect('/perfil');
            }
        }
    }

    public function forgetPassword () {
        // exibe formulário para recebimento de nova password
    }

    public function logout(){
        Session::flush();
        return redirect()->route('home');
    } 

    public function editarPerfil(){
        if(session('tipoPerfil') == 'Organizador'){
            $dados = Organizador::where('id', session('idUsuario'))->first();
        }
        if(session('tipoPerfil') == 'Colaborador'){
            $dados = Colaborador::where('id', session('idUsuario'))->first();
        }
        if(session('tipoPerfil') == 'Participante'){
            $dados = Participante::where('id', session('idUsuario'))->first();
        }
        if(session('tipoPerfil') == 'Responsavel'){
            $dados = Responsavel::where('id', session('idUsuario'))->first();
        }

        return view('site.editarPerfil', compact('dados'));
    }

    public function editarUsuario(Request $request){
        if(session('tipoPerfil') == 'Organizador'){
            $usuario = Organizador::where('id', session('idUsuario'))->first();
            $usuario->cargo = $request->cargo;
            $usuario->matricula = $request->matricula;
        }else if(session('tipoPerfil') == 'Responsavel'){
            $usuario = Responsavel::where('id', session('idUsuario'))->first();
            $usuario->cargo = $request->cargo;
            $usuario->matricula = $request->matricula;
        }else if(session('tipoPerfil') == 'Colaborador'){
            $usuario = Colaborador::where('id', session('idUsuario'))->first();
            $usuario->descricao = $request->descricao;
        }else if(session('tipoPerfil') == 'Participante'){
            $usuario = Participante::where('id', session('idUsuario'))->first();
        }

        $usuario->nome = $request->nome;
        $usuario->telefone = $request->telefone;
        $usuario->email = $request->email;
        $usuario->save();

        session()->put('nomeUsuario', $request->nome);
        session()->put('emailUsuario', $request->email);

        return redirect()->route('showPerfil');
    }

    private function verificarExistente($email, $tipo){
        if($tipo == 'formOrganizador'){
            $organizador = Organizador::where('email', $email)->first();
            if(isset($organizador) && !empty($organizador)){
                return 1;
            }
        }else if($tipo == 'formParticipante'){
            $participante = Participante::where('email', $email)->first();
            if(isset($participante) && !empty($participante)){
                return 1;
            }
        }else if($tipo == 'formResponsavel'){
            $responsavel = Responsavel::where('email', $email)->first();
            if(isset($responsavel) && !empty($responsavel)){
                return 1;
            }
        }else if($tipo == 'formColaborador'){
            $colaborador = Colaborador::where('email', $email)->first();
            if(isset($colaborador) && !empty($colaborador)){
                return 1;
            }
        }
    }

}
