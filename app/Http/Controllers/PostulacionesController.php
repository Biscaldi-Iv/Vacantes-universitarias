<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Postulacion;
use App\Models\Vacantes;

class PostulacionesController extends Controller
{
    public function show(int $idVacante, Request $request){
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para ver postulantes!");
        }
        $postulaciones=Postulacion::where('fkIdVacante',$idVacante)->get();
        $vacante=Vacantes::where('idVacante',$idVacante)->select()->first();
        $postulaciones->paginate(5);
        return view('vacantes.postulaciones',
        ['postulaciones'=>$postulaciones, 'vacante'=>$vacante]);
    }

    public function postular(Request $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=1)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para registrar postulaciones!");
        }
        $idVacante=$request->validate(['idVacante'=>'required|integer|exists:App\Models\Vacantes,idVacante']);
        $usuario=Usuario::where('fkiduser', auth()->user()->id)->select()->first();
        Postulacion::create([
            'fkIdUsuario'=>$usuario->idUsuario,
            'fkIdVacante'=>$idVacante,
            'fechaPostulacion'=>0,
            'titulo'=>0,
            'experiencia'=>0,
            'con_asignatura'=>0,
            'publicaciones'=>0,
            'congresos'=>0,
            'actitud'=>0,
            'disponibilidad'=>0,
            'entrevista'=>0,
            'sueldo'=>0,
            'ant_penales'=>0,
            'relaciones_uni'=>0,
            'investigaciones'=>0]);
        return redirect()->route('principal')->with('success','Se registro con exito la postulacion a');
    }
}
