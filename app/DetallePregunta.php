<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class DetallePregunta extends Model {
    protected $table = 'detalle_pregunta';
    protected $fillable = ['id_det_pre', 'id_preguntas', 'opcion', 'valor', 'estado'];
    public $timestamps = false;
    protected $primaryKey = 'id_det_pre';
	public static function agregar($id_preguntas, $opcion, $valor){
		return DetallePregunta::create([
			'id_preguntas' => $id_preguntas,
			'opcion' => $opcion,
			'valor' => $valor,
			'estado' => '1'
		]);
	}
	public static function editar($id_det_pre, $opcion, $valor, $estado){
		DetallePregunta::where('id_det_pre', $id_det_pre)
			->update([
				'opcion' => $opcion,
				'valor' => $valor,
				'estado' => $estado
			]);
	}
	public static function listar($id_preguntas){
		return DetallePregunta::where(['id_preguntas' => $id_preguntas, 'estado' => '1'])
			->get();
	}
}
