<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use App\Models\Usuario;
use App\Models\PersonalUniversidad;
use App\Models\Universidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    //
    public function show(){
        if(Auth::check()) {
            return redirect()->route('principal')->with('success','Usted ya ha iniciado sesion!');
        }
        return view('usuario.registrarse');
    }

    public function register(RegistroRequest $request){
    try{
            $user = User::create($request->validated());
            $user['password'] = Hash::make($request['password']);
            Usuario::create(['fkiduser'=>$user->id]);
            auth()->login($user);

        }
        catch (QueryException $e){
            $error_code=$e->errorInfo[1];
            if($error_code==1062){
                //duplicado de email
                return redirect()->route('registrarse')->with('error','La identificación ya esta registrada');
            }
        }

        return redirect()->route('datospostulante')->with('success','¡Usuario creado! Se ha iniciado sesion automaticamente.
        Por favor ingrese la informacion de su perfil profesional');

    }
}
