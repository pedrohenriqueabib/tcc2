<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ControleLogin extends Controller
{
    public function index(Request $request){
        // session()->put('token',$token);
        // session()->put('organizador',$nome);
        // session()->put('id_organizador');
        // //return redirect()->route('site.home');
        return $request;
    
    }
}
