<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    //
    public function show(){
        return view('usuario.registrarse');
    }

    public function registrarse(RegistroRequest $request){
        $user = User::create($request -> validated());
        $user -> save();
        /*
        DB::table("users") -> insert([
            'email',
            'email_verified_at', 
            'password', 
            'nombre',
            'apellido',
            'direccion',
            'telefono',
            ])*/

    }
}
