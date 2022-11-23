<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\UniversidadesRequest;

use App\Models\Universidad;

class UniversidadesController extends Controller
{
    public function show(Request $request) {
        $universidades=Universidad::all();
        return view('universidades.listado',['universidades'=>$universidades]);
    }

    public function create(UniversidadesRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        Universidad::create($request->validated());
        return redirect()->route('universidades')->with('success','Universidad registrada!');
    }

    public function update(UniversidadesRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $idU=$request->validate(['idUniversidad'=>'required|integer|min:1']);
        Universidad::where('idUniversidad', $idU)->update($request->validated());
        return redirect()->route('universidades')
        ->with('success',"Se actualizaron los datos de la universidad $request->nombreUniversidad!");
    }

    public function delete(Request $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $idU=$request->validate(['idUniversidad'=>'required|integer|min:1']);
        Universidad::where('idUniversidad', $idU)->delete();
        return redirect()->route('universidades')
        ->with('success',"Se eliminaron los datos de la universidad $request->nombreUniversidad!");
    }
}
