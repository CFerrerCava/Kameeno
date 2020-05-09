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
            case 'listaEspecialidades':
                return $this->listaEspecialidades();
                break;
            case 'listSegundaLinea':
                return $this->listSegundaLinea();
                break;
            case 'data':
                return $this->data($request);
                break;
            case 'registraConsulta':
                return $this->registrar($request);
                break;
            case 'seguimiento':
                return $this->seguimiento($request);
                break;
            case 'data':
                return $this->data($request);
                break;
            case 'paciente':
                return view('panel.unt_paciente.paciente', ['id' => $request->get('id')]);
                break;
            default:
                return view('panel.unt_paciente.mantenedor');
                break;
        }
    }
    

    public function listContenido(){
        $roles = DB::table('paciente')
        ->join('ocupacion', 'ocupacion.id_ocupacion', '=', 'paciente.id_ocupacion')
        ->join('seguro', 'seguro.id_seguro', '=', 'paciente.id_seguro')
        ->selectRaw('paciente.id_paciente,concat(paciente.nombre, " ",paciente.ap_pat, " ",paciente.ap_mat) as paciente,paciente.dni, paciente.sexo,paciente.telefono,paciente.estado,ocupacion.nombre as ocupacion,seguro.nombre as seguro')->orderByDesc('paciente.id_paciente')->get();
        
        return $roles;
    }
    public function agregarMedico(Request $request)
    {  
        return DB::table('medico')->insert(
            ['nombre'=>$request->get('name'), 'ap_pat'=>$request->get('appat'), 'ap_mat'=>$request->get('apmat'), 'dni'=>$request->get('dni'), 'idpadre'=>1,'id_especialidad'=>$request->get('especialidad'), 'telefono'=>$request->get('telefono')]
        );
    }
    public function ListarMedico()
    {
        $roles = DB::table('medico')->selectRaw('id_medico ,concat(nombre , " ",ap_pat, " ",ap_mat) as medico,dni,fecharegistro,estado')->where('idpadre','!=',0)->orderByDesc('id_medico')->get();
        return $roles;
    }
    public function listSegundaLinea()
    {
        $envia= array();
        $roles = DB::table('medico')->selectRaw('id_medico ,concat(nombre , " ",ap_pat, " ",ap_mat) as medico')->where('idpadre','=',0)->orderByDesc('id_medico')->get();
        foreach ($roles as $key => $value) {
            array_push($envia,array('value'=>$value->id_medico,'text'=>$value->medico));
        }
        return $envia;
    }
    public function listaEspecialidades()
    {
        $envia= array();
        $roles = DB::table('especialidad')->selectRaw('id_especialidad,nombre')->where('estado','like','activo')->orderByDesc('id_especialidad')->get(); 
        foreach ($roles as $key => $value) {
             array_push($envia,array('value'=>$value->id_especialidad,'text'=>$value->nombre));
        }
        return $envia;
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
        $roles = DB::table('paciente')
        ->join('ocupacion', 'ocupacion.id_ocupacion', '=', 'paciente.id_ocupacion')
        ->join('seguro', 'seguro.id_seguro', '=', 'paciente.id_seguro')
        ->selectRaw('paciente.id_paciente,concat(paciente.nombre, " ",paciente.ap_pat, " ",paciente.ap_mat) as paciente,paciente.dni, paciente.sexo,paciente.telefono,paciente.estado,ocupacion.nombre as ocupacion,seguro.nombre as seguro')
        ->where('paciente.id_paciente','=',$request->get('id'))
        ->orderByDesc('paciente.id_paciente')->get();
        
        return $roles;
    }
    

}
