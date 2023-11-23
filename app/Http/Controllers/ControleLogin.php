<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Organizador;
use App\Models\Colaborador;
use App\Models\Participante;
use App\Models\Responsavel;

class ControleLogin extends Controller
{
    public function index(Request $request){

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

            
        //return $request;
    }
}
