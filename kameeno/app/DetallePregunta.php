<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class DetallePregunta extends Model {
    protected $table = 'detalle_pregunta';
    protected $fillable = ['id_det_pre', 'id_preguntas', 'opcion', 'valor', 'estado'];
    public $timestamps = false;
    protected $primaryKey = 'id_det_pre';
}
