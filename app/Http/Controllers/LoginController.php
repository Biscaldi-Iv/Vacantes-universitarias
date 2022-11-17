<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        if(Auth::check()) {
            return redirect()->route('principal')->with('succes','Usted ya ha iniciado sesion!');
        }
        return view('usuario.login');
    }

    public function login(LoginRequest $request) {
        $credenciales=$request->validated();
        if(!Auth::validate($credenciales)) {
            return redirect()->to('login')->with('error','No se ha podido iniciar sesion, revise sus credenciales!');
        }
        $user=Auth::getProvider()->retrieveByCredentials($credenciales);
        Auth::login($user);
        return redirect()->route('principal')->with('succes','Se ha iniciado sesion!');
    }
}
