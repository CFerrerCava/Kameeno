<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Cuestionarios extends Model {
    protected $table = 'cuestionarios';
    protected $fillable = ['id_cuestionario', 'titulo', 'tipo', 'estado', 'descripcion'];
    public $timestamps = false;
    protected $primaryKey = 'id_cuestionario';
	public static function listar(){
		return Cuestionarios::select('id_cuestionario', 'nombre', 'tipo', 'estado')->get();
	}
}
