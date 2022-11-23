<?php

namespace App\Http\Controllers;
use App\Models\Catedra;
use App\Models\Universidad;
use App\Http\Requests\CatedrasRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CatedrasController extends Controller
{
    public function show() {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $catedras= Catedra::where('fkIdUniversidad', session('universidad'))->get();
        $universidad= Universidad::where('idUniversidad', session('universidad'))->select()->first();
        return view('universidades.catedrasU', ['catedras' => $catedras, 'universidad'=> $universidad]);
    }

    public function create(CatedrasRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        Catedra::create($request->validated());
        return redirect()->route('catedrasU')->with('success','Catedra creada!');
    }

    public function update(CatedrasRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $idc=$request->validate(['idCatedra'=>'required|integer|min:1']);
        Catedra::where('idCatedra', $idc)->update($request->validated());
        return redirect()->route('catedrasU')
        ->with('success',"Se modificaron los datos de la cátedra $request->nombreCatedra!");
    }

    public function delete(Request $request) {
        if((!Auth::check()) || (auth()->user()->privilegio!=2)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a $request->url()");
        }
        $idc=$request->validate(['idCatedra'=>'required|integer|min:1']);
        Catedra::where('idCatedra', $idc)->delete();
        return redirect()->route('catedrasU')
        ->with('success',"Se eliminaron los datos de la cátedra $request->nombreCatedra!");
    }
}
