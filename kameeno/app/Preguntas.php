<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model {
    protected $table = 'preguntas';
    protected $fillable = ['id_preguntas', 'id_cuestionario', 'pregunta', 'orden', 'estado'];
    public $timestamps = false;
    protected $primaryKey = 'id_preguntas';
	public static function agregar($id_cuestionario, $pregunta){
		//consultar orden de la ultima pregunta ingresada
		$ordenUltimo = Preguntas::select('orden')
        	->where('id_cuestionario', '=', $id_cuestionario)
        	->orderBy('orden', 'desc')
        	->limit(1)
			->get();
		//evaluar el valor, si hay o no registros anteriores
		if($ordenUltimo->count() == 0)
			$ordenUltimo = 1;
		else
			$ordenUltimo = $ordenUltimo[0]['orden'] + 1;
		return Preguntas::create([
			'id_cuestionario' => $id_cuestionario,
			'pregunta' => $pregunta,
			'orden' => $ordenUltimo,
			'estado' => '1'
		]);
	}
	public static function editar($id_preguntas, $pregunta){
		Preguntas::where('id_preguntas', $id_preguntas)
			->update(['pregunta' => $pregunta]);
	}
	public function detalle(){
		return $this->hasMany('App\DetallePregunta', 'id_preguntas', 'id_preguntas');
	}
}
