<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request){

        if(Auth::check()) {
            Session::flush();
            Auth::logout();
        }
        return redirect()->route('principal');
    }
}
