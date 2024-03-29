<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class PasswordController extends Controller
{
    public function showForgot() {
            return view('usuario.olvidada');
    }

    public function showReset() {
        return view('usuario.reestablecer');
    }

    public function resetPassword(String $token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function forgot(Request $request) {
        $request->validate(['email' => 'required|email']);

            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT
                        ? redirect()->route('usuario.login')->with(['success' => 'Se le ha enviado un email con el link para reestablecer su contraseña.'])
                        : back()->withErrors(['email' => __($status)]);

    }

    public function reset(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('usuario.login')->with('success', 'Se ha reestablecido con éxito, ingrese con su nueva contraseña')
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
