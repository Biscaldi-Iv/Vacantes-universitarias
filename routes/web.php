<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\UniversidadesController;

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

Route::get('/registrarse', [RegistroController::class, 'show'])->name('registrarse');

Route::post('/registrarse', [RegistroController::class, 'register']);

Route::get('/admin/registrar', [RegistroController::class, 'showAdmin'])->name('ADMINregister');

Route::post('/admin/registrar', [RegistroController::class, 'createAdmin']);

Route::get('/universidades', [UniversidadesController::class, 'show'])->name('universidades');

Route::post('/universidades/crear', [UniversidadesController::class, 'create']);

Route::post('/universidades/actualizar', [UniversidadesController::class, 'update']);

Route::post('/universidades/borrar', [UniversidadesController::class, 'delete']);

Route::get('/ordenmerito/detallemerito', function () {
    return view('meritos.detallemerito');
});

Route::get('/datospostulante', [PostulanteController::class, 'edit'])->name('datospostulante');

Route::post('/datospostulante', [PostulanteController::class, 'save']);

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

