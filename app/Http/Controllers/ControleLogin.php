<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ControleLogin extends Controller
{
    public function index(Request $request){
        $nome = 'Pedro';
        $token = $request->input('_token');
        // return redirect()->route('site.home')->with('token', $nome);
        session()->put('token',$token);
        session()->put('nome',$nome);
        return redirect()->route('site.home');//->with(['token'=> $token, 'nome'=> $nome]);
    
    }
}
