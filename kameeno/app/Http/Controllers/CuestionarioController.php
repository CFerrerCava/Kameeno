<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Cuestionarios;
use App\Preguntas;
use App\DetallePregunta;

class CuestionarioController extends Controller
{
    public function mantenedor($param='', Request $request){
        if ($param == 'list') return $this->listContenido($request);
		/*
		else if ($param == 'listContenido') return $this->listContenido($request);
		*/
        return view('panel.cuestionario.mantenedor');
    }

    public function listContenido($request){
		//return Cuestionarios::select('id_cuestionario','estado')->get();
		return Cuestionarios::listar();
    }


}
