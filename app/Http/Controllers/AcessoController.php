<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcessoController extends Controller
{
    public function login() {
        return view('user.login');
        // exibe formulário para autenticação
    }

    public function auth() {
        // autenticar o usuario
    }

    public function signup () {
        // exibe formulário para cadastro de novo usuario
    }

    public function save() {
        // salva novo usuario
    }

    public function forgetPassword () {
        // exibe formulário para recebimento de nova senha
    }

}
