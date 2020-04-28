<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Cuestionarios extends Model {
    protected $table = 'cuestionarios';
    protected $fillable = ['id_cuestionario', 'nombre', 'descripcion', 'estado'];
    public $timestamps = false;
    protected $primaryKey = 'id_cuestionario';
	public static function listar(){
		return Cuestionarios::select('id_cuestionario', 'nombre', 'estado')->get();
	}
	public static function agregar($nombre, $descripcion){
		return Cuestionarios::create([
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'estado' => '1'
		]);
	}
	public static function editar($id_cuestionario, $nombre, $descripcion){
		Cuestionarios::where('id_cuestionario', $id_cuestionario)
			->update([
				'nombre' => $nombre,
				'descripcion' => $descripcion
			]);
	}
	public function preguntas(){
		return $this->hasMany('App\Preguntas', 'id_cuestionario', 'id_cuestionario');
	}
}
