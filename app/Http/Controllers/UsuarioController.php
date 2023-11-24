<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function perfil(Request $request, int $id){
        $user = User::where('id',$id)->first();
        $postulaciones = $user->usuario->postulacion;

        return view('usuario.perfil')->with(['postulaciones'=>$postulaciones, 'user' => $user]);

    }
}
