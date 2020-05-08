<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterUntPacientes;
use Illuminate\Support\Facades\Crypt;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/reniec', function (GuzzleHttp\Client $client, Request $request){
    $response = $client->request('GET', "/dni/$request->dni");
    $data = json_decode($response->getBody());
    return response()->json($data);
});

Route::post('/sendEmailUntPacientes', function(Request $request){
    $namesComplete = $request->names.' '.$request->apPaterno.' '.$request->apMaterno;
    $cifrado = Crypt::encrypt(json_encode(["names" => $request->names,"appaterno" => $request->apPaterno,"apmaterno" => $request->apMaterno,"dni"=>$request->dni, "email" => $request->email]));
    $url = 'http://localhost:8000/formulario/'.$cifrado;
    Mail::to($request->email)->send(new RegisterUntPacientes($namesComplete, $request->dni, $url));
    return response()->json(["msg"=>"Envio exitoso"]);
});

Route::post('/paciente','untPacienteController@registerForm');
