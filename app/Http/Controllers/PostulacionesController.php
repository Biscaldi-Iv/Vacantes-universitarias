<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Models\Usuario;
use App\Models\Postulacion;
use App\Models\Vacantes;
use App\Models\User;
use App\Models\Usuarios;


class PostulacionesController extends Controller
{
    public function show(int $idVacante, Request $request){
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para ver postulantes!");
        }
        $postulaciones=Postulacion::where('fkIdVacante',$idVacante)->paginate(5);
        $vacante=Vacantes::where('idVacante',$idVacante)->select()->first();
        return view('vacantes.postulaciones',
        ['postulaciones'=>$postulaciones, 'vacante'=>$vacante]);
    }

    public function postular(Request $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=1)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para registrar postulaciones!");
        }
        $idVacante=$request->idVacante;
        $usuario=$request->id;
        try{
            Postulacion::create(['fkIdUsuario'=>$usuario,
            'fkIdVacante'=>$idVacante,
            'fechaPostulacion'=>date('Y-m-d H:i:s')]);
        }
        catch (QueryException $e){
            $error_code=$e->errorInfo[1];
            if($error_code==1062){
                //duplicado de postulacion
                return redirect()->route('principal')->with('error','Ya existe una postulación para esta vacante');
            }
        }
        return redirect()->route('principal')->with('success','Se registro con exito la postulacion');
    }
}
