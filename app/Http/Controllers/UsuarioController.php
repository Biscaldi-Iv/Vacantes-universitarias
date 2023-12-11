<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function perfil(Request $request, int $id)
    {
        $user = User::where('id', $id)->first();
        if (($user->privilegio == 1) && (!is_null($user->usuario))) {
            $postulaciones = $user->usuario->postulacion;
            return view('usuario.perfil')->with(['postulaciones' => $postulaciones, 'user' => $user]);
        } else {
            return view('usuario.perfil')->with(['user' => $user]);
        }
    }

    public function updateUser(Request $request)
    {
        $userid = $request->validate(['id' => 'required|integer']);

        if ((auth()->user()->id != $userid["id"]) ||  (!Auth::check())) {
            return redirect()->route('principal')->with('error', "No tiene permiso para realizar esta acción");
        }
        $data = $request->validate([
            'password' => 'nullable|min:8',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'tipodoc' => 'required',
            'ndoc' => 'required'
        ]);
        if ($data['password']) {
            $data['password'] = Hash::make($request['password']);
        } else {
            unset($data['password']);
        }

        User::where('id', $userid)->update($data);
        return redirect()->route('userProfile', ['id' => $request->id])
            ->with('success', "¡Se actualizaron los datos del usuario!");
    }
}
