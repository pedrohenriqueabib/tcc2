<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ControleLogout extends Controller
{
    public function index(){
        Session::flush();
        return view('site.home');
    }
}
