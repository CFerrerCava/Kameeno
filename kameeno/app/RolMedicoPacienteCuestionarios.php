<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class RolMedicoPacienteCuestionarios extends Model {
    protected $table = 'rol_medico_paciente_cuestionarios';
    protected $fillable = ['id_cuestionariopersona', 'id_pacientexmedico', 'id_cuestionario',
		'fechaGenerado', 'fechaResuelto', 'fechaObservado', 'observacion', 'estado'];
    public $timestamps = false;
    protected $primaryKey = 'id_cuestionariopersona';
	public static function buscar_id_cuestionario($id_cuestionario){
		$obj = RolMedicoPacienteCuestionarios::where('id_cuestionario', $id_cuestionario)
			->select('id_cuestionariopersona')->get();
		return $obj[0]->id_cuestionariopersona;
	}
	public static function registrarRespuesta($id_cuestionariopersona){
		RolMedicoPacienteCuestionarios::where('id_cuestionariopersona', $id_cuestionariopersona)
			->update([
				'fechaResuelto' => date('Y-m-d H:i:s')
			]);
	}
	public static function registrarObservacion($id_cuestionariopersona, $observacion){
		RolMedicoPacienteCuestionarios::where('id_cuestionariopersona', $id_cuestionariopersona)
			->update([
				'observacion' => $observacion,
				'fechaObservado' => Carbon::now()->toTimeString()
			]);
	}
	//falta el registrar
}
