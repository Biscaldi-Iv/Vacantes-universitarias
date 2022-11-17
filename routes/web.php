<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('principal.index');
});

Route::get('/ordenmerito/detallemerito', function () {
    return view('meritos.detallemerito');
});

Route::get('/faq', function () {
    return view('info.FAQ');
});

Route::get('/vacantes/infovacante', function () {
    return view('vacantes.infovacante');
});

Route::get('/login', function () {
    return view('usuario.login');
});

Route::get('/ordenmerito', function () {
    return view('meritos.ordenmerito');
});

Route::get('/registrarse', function () {
    return view('usuario.registrarse');
});

Route::post('/registrarse', [RegistroController::class, 'registrarse']);

Route::get('/vacantes/registrovacante', function () {
    return view('vacantes.registrovacante');
});

Route::get('/vacantes', function () {
    return view('vacantes.vacantes');
});

