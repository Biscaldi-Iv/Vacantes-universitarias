<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VacanteRequest;
use App\Models\Vacantes;
use App\Models\Catedra;
use Illuminate\Support\Facades\Auth;

class VacanteController extends Controller
{
    public function show(Request $request) {
        $vacantes=Vacantes::all();
        //return view('vacantes.registrovacante');
    }

    public function showcreate(Request $request) {
        // $idU=session('universidad');
        $catedras= Catedra::where('fkIdUniversidad', session('universidad'))->get();
        return view('vacantes.registrovacante', ['idUniversidad'=>session('universidad'), 'catedras'=>$catedras]);
    }

    public function create(VacanteRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        Vacantes::create($request->validated());
        return redirect()->route('crearvacante')->with('success','Vacante registrada!');
    }

    public function update(VacanteRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $idV=$request->validate(['id'=>'required|integer|min:1']);
        Vacantes::where('id', $idV)->update($request->validated());
        return redirect()->route('vacante')
        ->with('success',"Se actualizaron los datos de la vacante $request->tituloVacante!");
    }

    public function delete(Request $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $idV=$request->validate(['id'=>'required|integer|min:1']);
        Vacantes::where('id', $idV)->delete();
        return redirect()->route('vacantes')
        ->with('success',"Se eliminaron los datos de la vacante $request->tituloVacante!");
    }
}
