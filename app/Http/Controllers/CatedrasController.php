<?php

namespace App\Http\Controllers;
use App\Models\Catedra;
use App\Models\Universidad;
use App\Http\Requests\CatedrasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CatedrasController extends Controller
{
    public function show() {
        if((!Auth::check()) || (auth()->user()->privilegio==1)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a cátedras");
        }
        $catedras = (auth()->user()->privilegio == 2) ? Catedra::where('fkIdUniversidad', session('universidad'))->paginate(3) : Catedra::paginate(3);
        $universidad = (auth()->user()->privilegio == 2 )? Universidad::where('idUniversidad', session('universidad'))->select()->first() : Universidad::all();
        return view('universidades.catedrasU', ['catedras' => $catedras, 'universidad'=> $universidad]);
    }

    public function create(CatedrasRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio==1)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para registrar cátedras");
        }
        Catedra::create($request->validated());
        return redirect()->route('catedrasU')->with('success','Catedra creada!');
    }

    public function update(CatedrasRequest $request) {
        if((!Auth::check()) || (auth()->user()->privilegio==1)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para modificar cátedras");
        }
        $idc=$request->validate(['idCatedra'=>'required|integer|min:1']);
        Catedra::where('idCatedra', $idc['idCatedra'])->update($request->validated());
        return redirect()->route('catedrasU')
        ->with('success',"Se modificaron los datos de la cátedra $request->nombreCatedra!");
    }

    public function delete(Request $request) {
        if((!Auth::check()) || (auth()->user()->privilegio==1)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para eliminar cátedras");
        }
        $idc=$request->validate(['idCatedra'=>'required|integer|min:1']);
        Catedra::where('idCatedra', $idc)->delete();
        return redirect()->route('catedrasU')
        ->with('success',"Se eliminaron los datos de la cátedra $request->nombreCatedra!");
    }

    public function showAdmin() {
        if((!Auth::check()) || (auth()->user()->privilegio==1)) {
            return redirect()->route('principal')->with('error',"No tiene permiso para acceder a cátedras");
        }
        $universidad= Universidad::paginate(3)->with(['catedras']);
        return view('universidades.catedrasU', ['universidad'=> $universidad]);
    }
}
