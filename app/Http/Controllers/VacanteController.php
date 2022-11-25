<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VacanteRequest;
use App\Models\Vacantes;
use App\Models\Universidad;
use App\Models\Catedra;
use Illuminate\Support\Facades\Auth;

class VacanteController extends Controller
{

    public function create(VacanteRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        Vacantes::create($request->validated());
        return redirect()->route('principal')->with('success','Vacante registrada!');
    }

    public function update(VacanteRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $idV=$request->validate(['idVacante'=>'required|integer|min:1']);
        Vacantes::where('idVacante', $idV)->update($request->validated());
        return redirect()->route('principal')
        ->with('success',"Se actualizaron los datos de la vacante $request->tituloVacante!");
    }

    public function delete(Request $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $idV=$request->validate(['idVacante'=>'required|integer|min:1']);
        Vacantes::where('idVacante', $idV)->delete();
        return redirect()->route('principal')
        ->with('success',"Se eliminaron los datos de la vacante $request->tituloVacante!");
    }
}
