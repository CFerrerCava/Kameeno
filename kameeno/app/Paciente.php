<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paciente extends Model
{
    protected $table = 'paciente';
    protected $fillable = ['id_paciente', 'nombre', 'ap_pat', 'ap_mat', 'dni','sexo', 'edad', 'estado_civil','direccion', 'telefono', 'correo', 'tratamiento','id_facultad','id_seguro','id_ocupacion'];
    protected $primaryKey = 'id_paciente';

    public static function getPaciente($dni){
        return DB::select('select * from paciente where dni = ?', [$dni]);
    }
}
