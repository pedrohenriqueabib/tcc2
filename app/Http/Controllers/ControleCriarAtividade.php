<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControleCriarAtividade extends Controller
{
    public function index(Request $request){
        return $request->post('_token');
    }
}
