<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class panel_untController extends Controller
{
    public function mantenedor($vista='.', Request $request){
        switch ($vista) {
            case 'list':
                return $this->listContenido($request);
                break;
            case 'alerta':
                return $this->listContenido($request);
                break;
            case 'perfiles':
                return view('panel.unt_paciente.perfiles');
                break;
            
            default:
                return view('panel.unt_paciente.mantenedor');
                break;
        }
    }
    public function Paciente($vista='.', Request $request)
    {
        switch ($vista) {
            case 'registraConsulta':
                return $this->registrar($request);
                break;
            case 'seguimiento':
                return $this->registrar($request);
                break;
            case 'data':
                return $this->registrar($request);
                break;
            default:
                return view('panel.unt_paciente.paciente');
                break;
        }
    }

    public function listContenido($request){
	 
    }
    
    public function registraConsulta(Request $request)
    {
         
    }

    public function derivar(Request $request)
    {
         
    }
    public function alerta(Request $request)
    {
         
    }

}
