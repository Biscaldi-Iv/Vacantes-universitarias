<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VacanteRequest;
use App\Models\Vacantes;
use App\Models\Universidad;
use App\Models\Usuario;
use App\Models\Catedra;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Database\QueryException;

class VacanteController extends Controller
{

    public function create(VacanteRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para registrar vacantes");
        }
        Vacantes::create($request->validated());
        return redirect()->route('principal')->with('success','Vacante registrada!');
    }

    public function update(VacanteRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para modificar vacantes");
        }
        $idV=$request->validate(['idVacante'=>'required|integer|min:1']);
        Vacantes::where('idVacante', $idV)->update($request->validated());
        return redirect()->route('principal')
        ->with('success',"Se actualizaron los datos de la vacante $request->tituloVacante!");
    }

    public function delete(Request $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para eliminar vacantes");
        }
        $idV=$request->validate(['idVacante'=>'required|integer|min:1']);
        try{
            Vacantes::where('idVacante', $idV)->delete();
        } catch(QueryException $e){
            return redirect()->route('principal')->with('error',"No fue posible eliminar la vacante. Es posbile que tenga
            postulaciones registradas. Si desea evitar nuevas postulaciones se recomienda modificar la fecha de limite de postulaciones.");
        }
        return redirect()->route('principal')
        ->with('success',"Se eliminaron los datos de la vacante $request->tituloVacante!");
    }

    public function info(int $idVacante){
        if((Auth::check()) && (auth()->user()->privilegio==1)) {
            $vac = Vacantes::where('idVacante', $idVacante)->select()->first();
            $us = Usuario::where('fkiduser', auth()->user()->id)->select()->first();
            return view('vacantes.infovacante', ['vacante'=>$vac, 'usuario'=>$us]);
        }
        $vac = Vacantes::where('idVacante', $idVacante)->select()->first();
        return view('vacantes.infovacante', ['vacante'=>$vac]);
    }
}
