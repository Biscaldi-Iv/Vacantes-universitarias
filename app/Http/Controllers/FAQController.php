<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipoPreguntas;
use App\Models\Preguntas;

class FAQController extends Controller
{
    public function show(Request $request){
        $tipos_p=tipoPreguntas::all();
        return view('info.FAQ', ['tipos_p' => $tipos_p]);
    }

    public function create(Request $request){
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para registrar preguntas frecuentes");
        }
        //
    }
}
