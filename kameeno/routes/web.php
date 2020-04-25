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
Route::any('/panel','ContenidoController2@mantenedor');
Route::get('/unt-a-tus-pacientes', function(){ return view('client.unt_paciente.index'); })->name('untAtusPacientes');
