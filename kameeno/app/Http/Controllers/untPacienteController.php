<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Paciente;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class untPacienteController extends Controller
{

    public function showFormRegister($cifrado){

        try {
            $decrypted = Crypt::decrypt($cifrado);
            $decrypted = json_decode($decrypted);
            if(count(Paciente::getPaciente($decrypted->dni)) > 0)
                return "El usuario con dni $decrypted->dni ya se encuentra registrado, porfavor espere a que sea contactado.";
            else
                return view('client.unt_paciente.formDataPersonal', ["data"=>$decrypted]);
        } catch ( DecryptException $e) {
            return response()->json(['Inautorizado'],401);
        }
    }

    public function registerForm(Request $request){
        $paciente = Paciente::create([
            "nombre" => $request->names,
            "ap_pat" =>$request->appaterno,
            "ap_mat" => $request->apmaterno,
            "dni" => $request->dni,
            "sexo" => $request->sexo,
            "edad" => $request->edad,
            "direccion" => $request->direccion,
            "telefono" => $request->celular,
            "correo" => $request->email,
            "tratamiento" => $request->especificacion,
            "id_facultad" => $request->facultad,
            "id_ocupacion" => (int)$request->ocupacion,
            "id_seguro" => (int)$request->seguroSalud
        ]);

        Contacto::create([
            "id_paciente" => $paciente->id_paciente,
            "nombre" => $request->namesFamiliar,
            "ap_pat" => $request->appaternoFamiliar,
            "ap_mat" => $request->apmaternoFamiliar,
            "telefono" => $request->celFamiliar
        ]);

        foreach ($request->enfermedades as $key => $value) {
            DB::insert('insert into enfermedad_paciente (id_enfermedad, id_paciente) values (?, ?)', [$value["code"], $paciente->id_paciente]);
        }

        return response()->json(["message" => "Datos registrados correctamente"]);
    }
}
