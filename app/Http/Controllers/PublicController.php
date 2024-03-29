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
        ->paginate(5);
        return view('principal.index', ['vacantes'=>$vacantes]);
    }


    public function index(Request $request){
        if((Auth::check()) && (auth()->user()->privilegio==2)) {
            $universidad= Universidad::where('idUniversidad', session('universidad'))->select()->first();
            $catedras=$universidad->catedras;
            $vacantes=[];
            foreach ($catedras as $c) {
                $vac=$c->vacantes;
                foreach($vac as $v){
                    $vacantes[]=$v;
                }
            }
            return view('principal.index',
            ['vacantes'=>$vacantes, 'universidad'=>$universidad, 'catedras'=>$catedras]);
        }

        $vacantes=Vacantes::paginate(5);
        return view('principal.index', ['vacantes'=>$vacantes]);
    }

}
