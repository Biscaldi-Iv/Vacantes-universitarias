<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $user = User::create($request->validated());
        Usuario::create(['fkiduser'=>$user->id]);
        auth()->login($user);
        return redirect()->route('datospostulante')
        ->with('succes','Usuario creado! Se ha iniciado sesion automaticamente. \n
        Por favor ingrese la informacion de su perfil profesional');
    }

    public function showAdmin(){
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error','Usted no tiene permiso para acceder a esta pagina!');
        }
        $universidades=Universidad::all();
        return view('usuario.registrarse', ['universidades'=>$universidades]);
    }

    public function listadoUsuarios() {
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error','Usted no tiene permiso para acceder a esta pagina');
        }
        $usuarios=User::all();
        return view('usuario.usuarios', ['usuarios'=>$usuarios]);
    }

    public function createAdmin(RegistroRequest $request){
        DB::beginTransaction();
        try {
            $user = User::create($request->validated());
            switch ($user->privilegio) {
                case 1: {
                    Usuario::create(['fkiduser'=>$user->id]);
                    break;
                }
                case 2: {
                    PersonalUniversidad::create([
                        'fkIdUser' => $user->id,
                        'fkIdUni' => $request->fkIdUni
                    ]);
                    break;
                }
            }
        } catch (Throwable $e) {
            DB::rollBack();
            report($e);
            return false;
            //return redirect()->to('ADMINregister')->with('error','Se ha producido un error!');
        }
        DB::commit();
        return redirect()->route('ADMINregister')->with('success',"Se registro al usuario: $user->nombre $user->apellido");
    }
}
