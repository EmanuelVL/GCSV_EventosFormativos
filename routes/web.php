<?php
use App\EventoFormativo;
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
    return view('auth/login',compact('evento'));
});

Route::get('/home', function () {
    $evento = EventoFormativo::All();
    return view('welcome',compact('evento'));
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/eventos', function () {
    $evento = EventoFormativo::All();
    return view('eventos.todosEventos',compact('evento'));
});

Route::get('/eventospersonales', function () {
    return view('personales');
});

Route::get('/informacion', function () {
    return view('informacion');
});

Route::get('/evaluaciones', function () {
    return view('evaluaciones');
});

Route::match(array('GET', 'POST'),'evaluacionesInstructor', function () {
    return view('evaluacionesInstructor');
});

Route::match(array('GET', 'POST'),'evaluacionesParticipante', function () {
    return view('evaluacionesParticipante');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('modulos', 'ControladorModulos');
Route::resource('register', 'Auth\RegisterController')->middleware('guest');
Route::resource('gestioneventos','ControladorEventosFormativos');
Route::resource('gestionusuarios','ControladorUsuarios');

Route::match(array('GET', 'POST'),'constancias', function () {
    return view('constancias');
});

Route::get('modulos', function () {
    return view('modulos');
});

Route::get('/agregarModulo', 'ControladorEventosFormativos@agregarModulo')->name('gestioneventos.agregarModulo');
