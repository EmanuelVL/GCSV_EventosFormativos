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
    $evento = EventoFormativo::All();
    return view('welcome',compact('evento'));
});

Route::get('/home', function () {
    $evento = EventoFormativo::All();
    return view('welcome',compact('evento'));
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/eventos', function () {
    return view('eventos');
});

Route::get('/eventospersonales', function () {
    return view('personales');
});

Route::get('/informacion', function () {
    return view('informacion');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('modulos', 'ControladorModulos');
Route::resource('gestioneventos','ControladorEventosFormativos');

Route::resource('gestionusuarios','ControladorUsuarios');

Route::match(array('GET', 'POST'),'constancias', function () {
    return view('constancias');
});

Route::get('modulos', function () {
    return view('modulos');
});

Route::get('/agregarModulo', 'ControladorEventosFormativos@agregarModulo')->name('gestioneventos.agregarModulo');
