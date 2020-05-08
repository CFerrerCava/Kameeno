<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RespuestaCuestionario extends Model {
    protected $table = 'respuesta_cuestionario';
    protected $fillable = ['estado', 'id_det_pre', 'id_preguntas', 'id_cuestionariopersona'];
    public $timestamps = false;
}
