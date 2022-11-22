<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacanteController extends Controller
{
    public function show(Request $request) {
        if(!Auth::check()) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $vacantes=Vacante::all();
        return view();
    }

    public function create(VacanteRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        Vacante::create($request->validated());
        return redirect()->route('vacantes')->with('success','Vacante registrada!');
    }

    public function update(VacanteRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $idV=$request->validate(['id'=>'required|integer|min:1']);
        Vacante::where('id', $idV)->update($request->validated());
        return redirect()->route('vacante')
        ->with('success',"Se actualizaron los datos de la vacante $request->tituloVacante!");
    }

    public function delete(Request $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $idV=$request->validate(['id'=>'required|integer|min:1']);
        Universidad::where('id', $idV)->delete();
        return redirect()->route('vacantes')
        ->with('success',"Se eliminaron los datos de la vacante $request->tituloVacante!");
    }
}
