<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    //
    public function show(){
        return view('usuario.registrarse');
    }

    public function registrarse(RegistroRequest $request){
        $request->validate(['email'=>'required',
        'nombre'=>'required',
        'apellido'=>'required',
        'password'=>'required',
        'telefono'=>'required',
        'tipodoc'=>'required',
        'ndoc'=>'required',
        'privilegio'=>'required',
        'direccion'=>'required']);
        $user = User::create($request -> validated()); //errores aca porque nunca asigna telefono
        //y seguramente pase lo mismo con tipodoc, ndoc, dni
        $user->telefono=$request->telefono;
        $passwordConfirm = $request -> input("password_confirmacion");
        if(Hash::check($passwordConfirm, $user->password)){
            $user -> save();
            $request->session->put('user', $user);
        }else{
            return redirect()->route('registrarse')->with('error','Las contraseñas deben coincidir!');
        }
        return redirect()->route('/');
    }
}
