<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controleCriarEvento extends Controller
{
    public function index(Request $request){
        session()->put('nomeEvento', $request->input('nomeEvento'));
        session()->put('descricao', $request->input('descricao'));
        session()->put('avRua', $request->input('avRua'));
        session()->put('numero', $request->input('numero'));
        session()->put('bairro', $request->input('bairro'));
        session()->put('cidade', $request->input('cidade'));
        session()->put('estado', $request->input('estado'));
        session()->put('complemento', $request->input('complemento'));
        session()->put('dataInicio', $request->input('dataInicio'));
        session()->put('dataFim', $request->input('dataFim'));
        session()->put('horaInicio', $request->input('horaInicio'));
        session()->put('horaTermino', $request->input('horaTermino'));
        return redirect()->route('site.evento');
    }
}
