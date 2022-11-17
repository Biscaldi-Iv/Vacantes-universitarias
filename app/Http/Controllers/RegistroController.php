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
        $user = User::create($request -> validated());
        $passwordConfirm = $request -> input("password_confirmacion");
        if(Hash::check($passwordConfirm, $user->password)){
            $user -> save();
        }else{
            
        }
    }
}
