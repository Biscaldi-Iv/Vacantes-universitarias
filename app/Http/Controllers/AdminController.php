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
use \Illuminate\Database\QueryException;

class AdminController extends Controller
{
    public function showUsers() {
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error','Usted no tiene permiso para acceder a esta pagina');
        }
        $usuarios=User::all();
        $universidades=Universidad::all();
        $pu=PersonalUniversidad::all();
        return view('usuario.usuarios',
        ['usuarios'=>$usuarios, 'universidades'=>$universidades,'pu'=>$pu]);
    }

    public function showUserCreate(){
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error','Usted no tiene permiso para acceder a esta pagina!');
        }
        $universidades=Universidad::all();
        return view('usuario.registrarse', ['universidades'=>$universidades]);
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

    public function updateUser(Request $request){
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error','Usted no tiene permiso para acceder a esta pagina');
        }
        $id=$request->validate(['id'=>'required|integer']);
        $data=$request->validate([
            'password' => 'nullable|min:8',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'privilegio' => 'required',
            'telefono'=>'required',
            'tipodoc'=>'required',
            'ndoc'=>'required'
        ]);
        if($data['password']){
            $data['password']=Hash::make($request['password']);
        }else{
            unset($data['password']);
        }
        if($request->privilegio==2){
            //ver si ya era privilegio 2 y actualizar uni
            //o asignarla
            DB::beginTransaction();
            $pu_data=$request->validate(['fkIdUni'=>'required|integer']);
            $pu = PersonalUniversidad::where('fkIdUser', $id)->first();
            if($pu != null){
                PersonalUniversidad::where('fkIdUser', $id)->update($pu_data);
            } else {
            PersonalUniversidad::create([
                'fkIdUser' => $request->id,
                'fkIdUni' => $request->fkIdUni
            ]);
            }

            DB::commit();

        } elseif($request->privilegio==1){
            $pu_data=$request->validate(['fkIdUni'=>'required|integer']);
            PersonalUniversidad::where('fkIdUser', $id)->delete();
        }

        User::where('id', $id)->update($data);
        return redirect()->route('listadoUsuarios')
        ->with('success',"Se actualizaron los datos del usuario!");
    }

    public function deleteUser(Request $request){
        if((!Auth::check()) || (auth()->user()->privilegio!=3)) {
            return redirect()->route('principal')->with('error','Usted no tiene permiso para acceder a esta pagina');
        }
        $id=$request->validate(['id'=>'required|integer']);
        if(auth()->user()->id==$id){
            return redirect()->route('principal')->with('error','Intento de autoeliminarse!');
        }
        try{
            User::where('id', $id)->delete();
        } catch(QueryException $e){
            return redirect()->route('principal')->with('error','No es posible eliminar este usuario.');
        }
        return redirect()->route('listadoUsuarios')
        ->with('success',"Se ha eliminado el usuario $request->nombre $request->apellido");
    }
}
