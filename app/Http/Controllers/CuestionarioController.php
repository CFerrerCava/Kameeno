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
	//https://desarrollowebtutorial.com/laravel-eloquent-orm-query-builder-consultas-sql/
	//updCuestionario puede reemplazar a addCuestionario, queda por revisar
    public function mantenedor($param='', Request $request){
        if ($param == 'list') return $this->listContenido($request);
		//else if ($param == 'addCuestionario') return $this->addCuestionario($request);
		else if ($param == 'getCuestionario') return $this->getCuestionario($request);
		else if ($param == 'updCuestionario') return $this->updCuestionario($request);
        return view('panel.cuestionario.mantenedor');
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
			$preguntas['detalle'] = array();
			/**/
			$detalle = array();
			$detalle['opcion'] = "";
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

	public function listContenido($request){
		return Cuestionarios::listar();
	}
}
