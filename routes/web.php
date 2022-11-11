<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/detallemerito', function () {
    return view('detallemerito');
});

Route::get('/faq', function () {
    return view('FAQ');
});

Route::get('/infovacante', function () {
    return view('infovacante');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/ordenmerito', function () {
    return view('ordenmerito');
});

Route::get('/registrarse', function () {
    return view('registrarse');
});

Route::get('/registrovacante', function () {
    return view('registrovacante');
});

Route::get('/vacantes', function () {
    return view('vacantes');
});
