<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $idVacante=$request->idVacante;
        //$idVacante=$request->validate(['idVacante'=>'required|integer|exists:App\Models\Vacantes,idVacante']);
        $id= auth()->user()->getId();
        $usuario=Usuario::where('fkiduser', $id)->select()->first();
        Postulacion::create(['fkIdUsuario'=>$usuario->idUsuario,
            'fkIdVacante'=>$idVacante,
            'fechaPostulacion'=>date('Y-m-d H:i:s')]);
        return redirect()->route('principal')->with('success','Se registro con exito la postulacion a');
    }
}
