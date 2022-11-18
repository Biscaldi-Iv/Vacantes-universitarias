<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostulanteController extends Controller
{
    public function edit(){
        if(Auth::check()) {
            return redirect()->route('principal')->with('succes','Usted ya ha iniciado sesion!');
        }
        return view('usuario.datosPostulante');
    }

    public function save(){
        if(Auth::check()) {
            return redirect()->route('principal')->with('succes','Usted ya ha iniciado sesion!');
        }
    }
}
