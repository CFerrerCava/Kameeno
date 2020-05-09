<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RespuestaCuestionario extends Model {
    protected $table = 'respuesta_cuestionario';
    protected $fillable = ['estado', 'id_det_pre', 'id_preguntas', 'id_cuestionariopersona'];
    public $timestamps = false;
	public static function agregar($id_cuestionariopersona, $id_preguntas, $id_det_pre){
		return RespuestaCuestionario::create([
			'id_cuestionariopersona' => $id_cuestionariopersona,
			'id_preguntas' => $id_preguntas,
			'id_det_pre' => $id_det_pre,
			'estado' => '1'
		]);
	}
}
