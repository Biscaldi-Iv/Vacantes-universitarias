<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function cerrar(Request $request){
        if(session('user')){
            $request->session->forget('user');
        }
        return redirect()->route('/');
    }
}
