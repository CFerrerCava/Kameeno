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
                return $this->listContenido();
                break;
            case 'alerta':
                return $this->alerta($request);
                break;
            case 'perfiles':
                return view('panel.unt_paciente.perfiles');
                break;
            case 'DerivarMedico':
                return $this->derivar($request);
                break;
            case 'AgregarMedico':
                return $this->agregarMedico($request);
                break;
            case 'listaMedicos':
                return $this->ListarMedico();
                break;
            case 'data':
                return $this->data($request);
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

    public function listContenido(){
        $roles = DB::table('paciente')->pluck('nombre','ap_pat','ap_mat','dni','telefono','estado');
        return $roles;
    }
    public function agregarMedico(Request $request)
    {  
        return DB::table('medico')->insert(
                ['nombre'=>$request->get('name'), 'ap_pat'=>$request->get('appat'), 'ap_mat'=>$request->get('apmat'), 'dni'=>$request->get('dni'), 'estado'=>'Activo','idpadre'=>1]
            );
    }
    public function ListarMedico()
    {
        $roles = DB::table('medico')->selectRaw('id_medico ,concat(nombre , " ",ap_pat, " ",ap_mat) as medico,dni,fecharegistro,estado')->orderByDesc('id_medico')->get();
        return $roles;
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
    public function data(Request $request)
    {
         $user= session('_');
         return $user;
    }

}
