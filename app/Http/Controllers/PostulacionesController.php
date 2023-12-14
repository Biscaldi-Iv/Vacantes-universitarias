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
    public function show(int $idVacante, Request $request)
    {
        if ((!Auth::check()) || (auth()->user()->privilegio != 2)) {
            return redirect()->route('principal')->with('error', "No tiene permiso para ver postulantes!");
        }
        $postulaciones = Postulacion::where('fkIdVacante', $idVacante)->paginate(1);
        $vacante = Vacantes::where('idVacante', $idVacante)->select()->first();
        return view(
            'vacantes.postulaciones',
            ['postulaciones' => $postulaciones, 'vacante' => $vacante]
        );
    }

    public function postular(Request $request)
    {
        if ((!Auth::check()) || (auth()->user()->privilegio != 1)) {
            return redirect()->route('principal')->with('error', "No tiene permiso para registrar postulaciones!");
        }
        $idVacante = $request->idVacante;
        $usuario = $request->id;
        try {
            Postulacion::create([
                'fkIdUsuario' => $usuario,
                'fkIdVacante' => $idVacante,
                'fechaPostulacion' => date('Y-m-d H:i:s')
            ]);
        } catch (QueryException $e) {
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                //duplicado de postulacion
                return redirect()->route('principal')->with('error', 'Ya te has postulado a esta vacante');
            }
        }
        return redirect()->route('principal')->with('success', 'Se registro con exito la postulacion');
    }

    public function delete(Request $request)
    {
        if ((!Auth::check()) || (auth()->user()->privilegio == 2)) {
            return redirect()->route('principal')->with('error', "No tiene permiso para eliminar Postulaciones");
        } elseif (auth()->user()->privilegio == 1) {
            $idUsuario = $request->validate(['idUsuario' => 'required|integer|min:1'])["idUsuario"];
            $usuario = Usuario::where('fkiduser', auth()->user()->id)->first();
            if ($idUsuario != $usuario->id) {
                return redirect()->route('principal')->with('error', "No tiene permiso para eliminar Postulaciones de otro Usuario");
            }
        }
        $idPostulacion = $request->validate(['idPostulacion' => 'required|integer|min:1'])['idPostulacion'];
        $postulacion = Postulacion::where('idPostulacion', $idPostulacion)->with(['vacante'])->first();

        if ($postulacion->vacante->fechaLimite < \Carbon\Carbon::now()) {
            return redirect()->route('principal')->with('error', "No se puede eliminar una postulación de una vacante cerrada");
        }

        $postulacion->delete();
        return redirect()->route('userProfile', ['id' => $request->idUser])
            ->with('success', "Se eliminó correctamente la postulación");
    }

    public function update(PuntuacionRequest $request)
    {
        if ((!Auth::check()) || (auth()->user()->privilegio != 2)) {
            return redirect()->route('principal')->with('error', "No tiene permiso para puntuar candidatos");
        }
        $idVacante = $request->validate(['idVacante' => 'required|integer|min:1']);
        $idUsuario = $request->validate(['idUsuario' => 'required|integer|min:1']);

        $postulacion = Postulacion::where(['fkIdVacante' => $idVacante, 'fkIdUsuario' => $idUsuario])->update($request->validated());

        return back()
            ->with('success', "¡Se actualizaron los datos del usuario!");
    }



    public function puntuacion(Request $request)
    {
        $idUsuario = $request->validate(['idUsuario' => 'required|integer|min:1'])['idUsuario'];
        if ((!Auth::check()) || (auth()->user()->privilegio == 1 && auth()->user()->usuario->id != $idUsuario)) {
            return redirect()->route('principal')->with('error', "No tiene permiso para puntuar candidatos");
        }
        $idVacante = $request->validate(['idVacante' => 'required|integer|min:1']);
        $vacante = Vacantes::where('idVacante', $idVacante)->select()->first();
        if (auth()->user()->privilegio==2 && $vacante->catedra->universidad->idUniversidad != session('universidad')) {
            return redirect()->route('principal')->with('error', "No tiene permiso para puntuar candidatos
            debido a que la vacante no pertenece a su universidad");
        }
        $usuario = Usuario::where('id', $idUsuario)->select()->first();
        $postulacion = Postulacion::where([
            'fkIdVacante' => $idVacante,
            'fkIdUsuario' => $idUsuario
        ])->select()->first();
        return view('vacantes.puntuar', ['usuario' => $usuario, 'vacante' => $vacante, 'postulacion' => $postulacion]);
    }
}
