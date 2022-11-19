<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    //
    public function show(){
        if(Auth::check()) {
            return redirect()->route('principal')->with('succes','Usted ya ha iniciado sesion!');
        }
        return view('usuario.registrarse');
    }

    public function register(RegistroRequest $request){
        $user = User::create($request->validated());
        Usuario::create(['fkiduser'=>$user->id]);
        auth()->login($user);
        return redirect()->route('datospostulante')
        ->with('succes','Usuario creado! Se ha iniciado sesion automaticamente. \n
        Por favor ingrese la informacion de su perfil profesional');
    }
}
