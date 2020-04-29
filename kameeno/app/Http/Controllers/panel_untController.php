<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class panel_untController extends Controller
{
    public function mantenedor($vista='', Request $request){
        if ($vista == 'list')
         return $this->listContenido($request);
        if ($vista == 'perfiles')
        return view('panel.unt_paciente.perfiles');
	 
        return view('panel.unt_paciente.mantenedor');
    }

    public function listContenido($request){
	 
    }

}
