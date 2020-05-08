<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cuestionarios extends Model {
    protected $table = 'cuestionarios';
    protected $fillable = ['id_cuestionario', 'nombre', 'descripcion', 'estado'];
    public $timestamps = false;
    protected $primaryKey = 'id_cuestionario';
	public static function listar(){
		return Cuestionarios::where(['estado' => '1'])
			->select('id_cuestionario', 'nombre', 'fecharegistro','estado')->get();
	}
	public static function agregar($nombre, $descripcion){
		return Cuestionarios::create([
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'fecharegistro' => Carbon::now()->toTimeString(),
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
}
