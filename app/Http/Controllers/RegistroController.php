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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    //
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('principal')->with('success', 'Usted ya ha iniciado sesion!');
        }
        return view('usuario.registrarse');
    }

    public function register(RegistroRequest $request)
    {
        $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => env("CAPTCHA_SECRET_KEY"),
            'response' => $request->input("g-recaptcha-response")
        ]);
        if (!$g_response->json('success')) {
            return redirect()->route('registrarse')->with('error', 'No se ha validado el captcha!');
        }

        try {
            $attributes = $request->validated();
            $attributes['password'] = Hash::make($request['password']);
            $user = User::create($attributes);
            Usuario::create(['fkiduser' => $user->id]);
            auth()->login($user);
        } catch (QueryException $e) {
            $error_code = $e->errorInfo[1];
            if ($error_code == 1062) {
                //duplicado de email
                return redirect()->route('registrarse')->with('error', 'La identificación ya esta registrada');
            }
        }

        return redirect()->route('datospostulante')->with('success', '¡Usuario creado! Se ha iniciado sesion automaticamente.
        Por favor ingrese la informacion de su perfil profesional');
    }
}
