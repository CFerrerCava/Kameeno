<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model {
    protected $table = 'preguntas';
    protected $fillable = ['id_preguntas', 'pregunta', 'id_cuestionario', 'estado'];
    public $timestamps = false;
    protected $primaryKey = 'id_preguntas';
}
