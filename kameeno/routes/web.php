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

Route::get('/', function () { return view('index'); });
Route::get('/formulario/{cifrado}','untPacienteController@showFormRegister');
Route::get('/unt-a-tus-pacientes', function(){ return view('client.unt_paciente.index'); })->name('untAtusPacientes');

Route::any('/panel','ContenidoController@mantenedor');
Route::any('/paneluap','panel_untController@mantenedor');
Route::any('/panel/probando','panel_untController@mantenedor');
Route::any('/paneluap/{vista?}','panel_untController@mantenedor');
Route::any('/panel/cuestionario','CuestionarioController@mantenedor');
Route::any('/panel/cuestionario/{param}','CuestionarioController@mantenedor');
Route::any('/panel/cuestionario/{param}/{id}','CuestionarioController@mantenedor');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/iniciarSesion', function(){ return view('auth.miLogin');});
