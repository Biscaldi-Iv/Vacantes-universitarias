<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PersonalUniversidad;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route('principal')->with('success', 'Usted ya ha iniciado sesion!');
        }
        return view('usuario.login');
    }

    public function login(LoginRequest $request)
    {
        $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => env("CAPTCHA_SECRET_KEY"),
            'response' => $request->input("g-recaptcha-response")
        ]);
        if (!$g_response->json('success')) {
            return redirect()->to('login')->with('error', 'No se ha validado el capcha!');
        }
        $credenciales = $request->validated();
        if (!Auth::validate($credenciales)) {
            return redirect()->to('login')->with('error', 'No se ha podido iniciar sesion, revise sus credenciales!');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credenciales);
        Auth::login($user);
        if (auth()->user()->privilegio == 2) {
            $p = PersonalUniversidad::where('fkIdUser', auth()->user()->id)->select()->first();
            session(['universidad' => $p->fkIdUni]);
        }
        return redirect()->route('principal')->with('success', 'Se ha iniciado sesion!');
    }
}
