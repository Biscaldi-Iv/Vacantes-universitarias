<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\UniversidadesController;
use App\Http\Controllers\CatedrasController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PostulacionesController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\PasswordController;

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

Route::get('/orden/{orden}', [OrdenController::class, 'show'])->name('orden');

Route::get('/', [PublicController::class, 'index'])->name('principal');

Route::get('/buscar', [PublicController::class, 'buscar'])->name('buscar');

// Usuario

Route::get('/login', [LoginController::class,'show']);

Route::get('/admin/usuarios', [AdminController::class, 'showUsers'])->name('listadoUsuarios');

Route::post('/admin/usuarios/actualizar', [AdminController::class, 'updateUser']);

Route::post('/admin/usuarios/borrar', [AdminController::class, 'deleteUser']);

Route::post('/login', [LoginController::class,'login'])->name('usuario.login');

Route::get('/contraseña/olvidada', [PasswordController::class,'showForgot']);

Route::post('/contraseña/olvidada', [PasswordController::class,'forgot'])->name('password.forgot');

Route::get('/contraseña/reestablecer', [PasswordController::class,'showReset']);

Route::post('/contraseña/reestablecer', [PasswordController::class,'reset'])->name('password.reset');

Route::get('/logout', [LogoutController::class,'logout']);

Route::get('/registrarse', [RegistroController::class, 'show'])->name('registrarse');

Route::post('/registrarse', [RegistroController::class, 'register']);

Route::get('/admin/usuarios/registrar', [AdminController::class, 'showUserCreate'])->name('ADMINregister');

Route::post('/admin/usuarios/registrar', [AdminController::class, 'createAdmin']);

Route::get('/usuario/perfil/{id}', [UsuarioController::class, 'perfil']);

// Catedras

Route::get('/catedrasU', [CatedrasController::class, 'show'])->name('catedrasU');

Route::post('/universidades/catedrasU/crear', [CatedrasController::class, 'create']);

Route::post('/universidades/catedrasU/actualizar',[CatedrasController::class, 'update']);

Route::post('/universidades/catedrasU/borrar',[CatedrasController::class, 'delete']);

// Universidades

Route::get('/universidades', [UniversidadesController::class, 'show'])->name('universidades');

Route::post('/universidades/crear', [UniversidadesController::class, 'create']);

Route::post('/universidades/actualizar', [UniversidadesController::class, 'update']);

Route::post('/universidades/borrar', [UniversidadesController::class, 'delete']);

// Vacantes

//Route::get('/vacantes/nuevo', [VacanteController::class, 'showcreate'])->name('crearvacante');

Route::post('/vacantes/registrar', [VacanteController::class, 'create']);

Route::post('/vacantes/editar', [VacanteController::class, 'update']);

Route::post('/vacantes/eliminar', [VacanteController::class, 'delete']);

Route::get('/vacantes/infovacante/{idVacante}', [VacanteController::class, 'info']);

//Postulaciones
Route::get('/vacantes/postulaciones/{idVacante}', [PostulacionesController::class, 'show'])->name('vacantes.postulaciones');

Route::post('/vacantes/postularse', [PostulacionesController::class, 'postular']);

Route::post('/vacantes/puntuar', [PostulacionesController::class, 'update']);

Route::post('/vacantes/infoUsuario', [PostulacionesController::class, 'infoUsuario']);
// Postulante

Route::get('/ordenmerito/detallemerito', function () {
    return view('meritos.detallemerito');
});

Route::get('/datospostulante', [PostulanteController::class, 'edit'])->name('datospostulante');

Route::post('/datospostulante', [PostulanteController::class, 'save']);

// INFO

Route::get('/faq', [FAQController::class, 'show']);

Route::get('/about', function () {
    return view('info.about');
});

Route::get('/privacy', function () {
    return view('info.privacypolicy');
});

Route::get('/terms', function () {
    return view('info.termsofuse');
});
Route::get('/map', function () {
    return view('info.map');
});

Route::get('/vacantes/infovacante', function () {
    return view('vacantes.infovacante');
});

Route::get('/ordenmerito', function () {
    return view('meritos.ordenmerito');
});

Route::get('/auth-status', function (Request $request){
    if(Auth::check()){
        return ['status'=>'1'];
    }
    return ['status'=>'0'];
});
