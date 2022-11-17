<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;

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
})->name('principal');

Route::get('/login', [LoginController::class,'show']);

Route::post('/login', [LoginController::class,'login']);

Route::get('/logout', [LogoutController::class,'logout']);

Route::get('/registrarse', function () {
    return view('usuario.registrarse');
})->name('registrarse');

Route::post('/registrarse', [RegistroController::class, 'register']);

Route::get('/ordenmerito/detallemerito', function () {
    return view('meritos.detallemerito');
});

Route::get('/faq', function () {
    return view('info.FAQ');
});

Route::get('/vacantes/infovacante', function () {
    return view('vacantes.infovacante');
});

Route::get('/ordenmerito', function () {
    return view('meritos.ordenmerito');
});

Route::get('/vacantes/registrovacante', function () {
    return view('vacantes.registrovacante');
});

Route::get('/vacantes', function () {
    return view('vacantes.vacantes');
});

