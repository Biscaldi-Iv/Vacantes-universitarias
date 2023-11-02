<?php

namespace App\Http\Controllers;

use App\Mail\NuevaConsulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InfoController extends Controller
{
    public function store (Request $request){
        $request->validate(['email' => 'required|email', 'mensaje' => 'required']);
        Mail::to('info@example.com')->send(new NuevaConsulta($request));

        return redirect()->route('contacto')->with('success', 'Se ha enviado el mensaje');
    }
}
