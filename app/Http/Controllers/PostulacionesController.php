<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PuntuacionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Models\Usuario;
use App\Models\Postulacion;
use App\Models\Vacantes;
use App\Models\User;


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
                return redirect()->route('principal')->with('error','Ya te has postulado a esta vacante');
            }
        }
        return redirect()->route('principal')->with('success','Se registro con exito la postulacion');
    }

    public function update(PuntuacionRequest $request){
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para puntuar candidatos");
        }
        $idVacante = $request->validate(['idVacante'=>'required|integer|min:1']);
        $idUsuario = $request->validate(['idUsuario'=>'required|integer|min:1']);
        Postulacion::where(['fkIdVacante',"=", $idVacante],['fkIdUsuario',"=", $idUsuario])->update($request->validated());
        return redirect()->route('postulaciones')
        ->with('success',"Se registró correctamente la puntuación");
    }

    public function infoUsuario(Request $request){
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para puntuar candidatos");
        }
        $idVacante = $request->validate(['idVacante'=>'required|integer|min:1']);
        $idUsuario = $request->validate(['idUsuario'=>'required|integer|min:1']);
        $usuario=Usuario::where('id', $idUsuario)->select()->first();
        $vacante=Vacantes::where('idVacante', $idVacante)->select()->first();
        return view('vacantes.puntuar', ['usuario'=>$usuario,'vacante'=>$vacante]);
    }
}
