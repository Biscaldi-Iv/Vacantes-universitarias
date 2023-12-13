<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\UniversidadesRequest;

use App\Models\Universidad;
use \Illuminate\Database\QueryException;

class UniversidadesController extends Controller
{
    public function show(Request $request)
    {
        $universidades=Universidad::paginate(1);
        return view('universidades.listado', ['universidades'=>$universidades]);
    }

    public function create(UniversidadesRequest $request)
    {
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error', "No tiene permiso para registrar universidades");
        }
        Universidad::create($request->validated());
        return redirect()->route('universidades')->with('success', 'Universidad registrada!');
    }

    public function update(UniversidadesRequest $request)
    {
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error', "No tiene permiso para actualizar informacion de universidades");
        }
        $idU=$request->validate(['idUniversidad'=>'required|integer|min:1']);
        Universidad::where('idUniversidad', $idU)->update($request->validated());
        return redirect()->route('universidades')
        ->with('success', "Se actualizaron los datos de la universidad $request->nombreUniversidad!");
    }

    public function delete(Request $request)
    {
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error', "No tiene permiso para eliminar una universidad");
        }
        $idU=$request->validate(['idUniversidad'=>'required|integer|min:1']);
        try {
            Universidad::where('idUniversidad', $idU)->delete();
        } catch(QueryException $e){
            return redirect()->route('principal')->with('error', "No es posible eliminar los datos de la universidad.");
        }
        return redirect()->route('universidades')
        ->with('success', "Se eliminaron los datos de la universidad $request->nombreUniversidad!");
    }
}
