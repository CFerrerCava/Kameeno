<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

class untPacienteController extends Controller
{
    public function showFormRegister($cifrado){
        try {
            $decrypted = Crypt::decrypt($cifrado);
            $decrypted = json_decode($decrypted);
            return view('client.unt_paciente.formDataPersonal', ["data"=>$decrypted]);
        } catch ( DecryptException $e) {
            return response()->json(['Inautorizado'],401);
        }
    }
}
