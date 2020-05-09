<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Cuestionarios;
use App\Preguntas;
use App\DetallePregunta;
use App\RespuestaCuestionario;
use App\RolMedicoPacienteCuestionarios;

class CuestionarioController extends Controller
{
	//https://desarrollowebtutorial.com/laravel-eloquent-orm-query-builder-consultas-sql/
	//updCuestionario puede reemplazar a addCuestionario, queda por revisar
    public function mantenedor($param='', $id='0', Request $request){
        if ($param == 'list') return $this->listCuestionario($request);
		else if ($param == 'addCuestionario') return $this->addCuestionario($request);
		else if ($param == 'getCuestionario') return $this->getCuestionario($request);
		else if ($param == 'getCuestionarioResolver') return $this->getCuestionarioResolver($request);
		else if ($param == 'updCuestionario') return $this->updCuestionario($request);
		else if ($param == 'resolve') return $this->resolve($request);
		else if ($param == 'mantenedor')
			return view('panel.cuestionario.mantenedor', ['id' => $id]);
		else if ($param == 'resolver')
			return view('panel.cuestionario.desarrollo', ['id' => $id]);
        return view('panel.cuestionario.listar');
    }

	public function resolve($request){
		$cuestionario = $request->get('cuestionario');
		$id_cuestionariopersona = RolMedicoPacienteCuestionarios::buscar_id_cuestionario($cuestionario['id_cuestionario']);
		/*TRANSACCION*/
		$preguntas = $cuestionario['preguntas'];
		foreach ($preguntas as $respuesta) {
			RespuestaCuestionario::agregar(
				$id_cuestionariopersona,
				$respuesta['id_preguntas'],
				$respuesta['seleccionado']
			);
		}
		RolMedicoPacienteCuestionarios::registrarRespuesta($id_cuestionariopersona);
		/*TRANSACCION*/
    }

	public function getCuestionarioResolver($request){
		//$request->get('id');
		//validar si esta logueado, se obtiene id_cuestionariopersona de RolMedicoPacienteCuestionarios
		//revisar: se busca si se tiene asignado el cuestionario
		//RolMedicoPacienteCuestionarios::buscar_id_cuestionario($request->get('id'));
		return $this->getCuestionario($request);
	}

	public function updCuestionario($request){
		$cuestionario = $request->get('datos');
		Cuestionarios::editar(
			$cuestionario['id_cuestionario'],
			$cuestionario['nombre'],
			$cuestionario['descripcion']
		);
		$preguntas = $cuestionario['preguntas'];
		foreach ($preguntas as $preguntaItem) {
			$idPregunta___ = 0;
			if(isset($preguntaItem['id_preguntas'])){
				Preguntas::editar(
					$preguntaItem['id_preguntas'],
					$preguntaItem['pregunta'],
					$preguntaItem['estado']
				);
				$idPregunta___ = $preguntaItem['id_preguntas'];
			}
			else{
				$pregunta = Preguntas::agregar(
					$cuestionario['id_cuestionario'],
					$preguntaItem['pregunta']
				);
				$idPregunta___ = $pregunta->id_preguntas;
			}
			$detallePregunta = $preguntaItem['detalle'];
			//dd($detallePregunta);
			foreach ($detallePregunta as $detalleItem) {
				//id_det_pre
				if(isset($detalleItem['id_det_pre'])){
					DetallePregunta::editar(
						$detalleItem['id_det_pre'],
						$detalleItem['opcion'],
						$detalleItem['valor'],
						$detalleItem['estado']
					);
				}
				else{
					DetallePregunta::agregar(
						$idPregunta___,
						$detalleItem['opcion'],
						$detalleItem['valor']
					);
				}
			}

		}
    }

	public function getCuestionario($request){
		$id = $request->get('id');
		$cuestionario = array();
		if ($id == 0){
			$cuestionario['id_cuestionario'] = 0;
			$cuestionario['nombre'] = '';
			$cuestionario['descripcion'] = '';
			$cuestionario['preguntas'] = array();
			/***/
			$preguntas = array();
			$preguntas['pregunta'] = "";
			$preguntas['estado'] = "1";
			$preguntas['detalle'] = array();
			/**/
			$detalle = array();
			$detalle['opcion'] = "";
			$detalle['estado'] = "1";
			$detalle['valor'] = "";
			/**/
			$preguntas['detalle'][] = $detalle;
			/***/
			$cuestionario['preguntas'][] = $preguntas;
		}
		else{
			$cuestionario = Cuestionarios::find($id);
			$cuestionario['preguntas'] = Preguntas::listar($cuestionario->id_cuestionario);
			for ($i = 0; $i < count($cuestionario['preguntas']); $i++) {
				$id_preguntas = $cuestionario['preguntas'][$i]->id_preguntas;
				$cuestionario['preguntas'][$i]['detalle'] = DetallePregunta::listar($id_preguntas);
			}
		}
		return $cuestionario;
	}

	public function addCuestionario($request){
		$datos = $request->get('datos');
		$cuestionario = Cuestionarios::agregar(
			$datos['nombre'],
			$datos['descripcion']
		);
		$preguntas = $datos['preguntas'];
		foreach ($preguntas as $preguntaItem) {
			$pregunta = Preguntas::agregar(
				$cuestionario->id_cuestionario,
				$preguntaItem['pregunta']
			);
			$detallePregunta = $preguntaItem['detalle'];
			foreach ($detallePregunta as $detalleItem) {
				DetallePregunta::agregar(
					$pregunta->id_preguntas,
					$detalleItem['opcion'],
					$detalleItem['valor']
				);
			}
		}
    }

	public function listCuestionario($request){
		return Cuestionarios::listar();
	}
}
