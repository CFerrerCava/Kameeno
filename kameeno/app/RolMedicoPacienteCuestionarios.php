<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RolMedicoPacienteCuestionarios extends Model {
    protected $table = 'rol_medico_paciente_cuestionarios';
    protected $fillable = ['id_cuestionariopersona', 'fechaGenerado', 'fechaResuelto', 'observacion', 'estado', 'id_pacientexmedico'];
    public $timestamps = false;
    protected $primaryKey = 'id_cuestionariopersona';
}
