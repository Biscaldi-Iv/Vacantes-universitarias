<?php

namespace App\Http\Controllers;

use App\Models\Vacantes;
use App\Models\Postulacion;

class OrdenController extends Controller
{
    public function show(int $v) {

        $vacante = Vacantes::where('idVacante', $v)->select()->first();
        $postulaciones =  Postulacion::where('fkIdVacante', $v)->orderByRaw('(titulo+
         experiencia+
         con_asignatura+
         publicaciones+
         congresos+
         actitud+
         disponibilidad+
         entrevista+
         sueldo+
         investigaciones) desc')->get();
        //dd($postulaciones->toArray());
        return view('meritos.ordenmerito', ['vacante' => $vacante ,'postulaciones' => $postulaciones]);
    }


}
