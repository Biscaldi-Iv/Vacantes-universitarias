<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostulanteRequest;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class PostulanteController extends Controller
{
    public function edit(Request $request){
        if(!Auth::check()) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $postulante=DB::table('usuarios')->select(
            'fkiduser',
            'titulos',
            'experiencia',
            'con_asignatura',
            'disponibilidad',
            'congresos',
            'educacion',
            'publicaciones',
            'investigaciones',
            'con_profesionales'
            )->where('fkiduser',auth()->user()->id)->first();
        $request->session()->flash('postulante', $postulante);
        return view('usuario.datosPostulante');
    }

    public function save(PostulanteRequest $request){
        if(!Auth::check()) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        DB::table('usuarios')->where('fkiduser',auth()->user()->id)->update([
            'titulos'=>$request->titulos,
            'experiencia'=>$request->experiencia,
            'con_asignatura'=>$request->con_asignatura,
            'disponibilidad'=>$request->disponibilidad,
            'congresos'=>$request->congresos,
            'educacion'=>$request->educacion,
            'publicaciones'=>$request->publicaciones,
            'investigaciones'=>$request->investigaciones,
            'con_profesionales'=>$request->con_profesionales
        ]);
        return redirect()->route('principal')->with('success','Se guardaron los cambios');

    }
}
