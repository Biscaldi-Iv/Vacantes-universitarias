<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacantes;
use App\Models\Universidad;
use App\Models\Catedra;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function buscar(Request $request){
        $vacantes=Vacantes::when(
            request()->has('search'),
            fn ($query)=>$query->where('tituloVacante','like','%'.request('search').'%')
        )
        ->orWhere('descCorta','like','%'.request('search').'%')
        ->paginate(1);
        $catedras=Catedra::all();

        return view('principal.index', ['vacantes'=>$vacantes,'catedras'=>$catedras]);
    }


    public function index(Request $request){
        if((Auth::check()) && (auth()->user()->privilegio==2)) {
            $universidad= Universidad::where('idUniversidad', session('universidad'))->select()->first();
            $vacantes = Vacantes::whereIn('fkIdCatedra',$universidad->catedras->pluck('idCatedra')->toArray())->paginate(1);
            return view('principal.index',
            ['vacantes'=>$vacantes, 'universidad'=>$universidad, 'catedras'=>$universidad->catedras]);
        }
        $catedras=Catedra::all();
        $vacantes=Vacantes::paginate(1);
        return view('principal.index', ['vacantes'=>$vacantes,'catedras'=>$catedras]);
    }

}
