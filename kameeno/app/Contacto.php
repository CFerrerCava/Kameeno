<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'contacto';
    protected $fillable = ['id_contacto', 'id_paciente', 'nombre', 'ap_pat', 'ap_mat','telefono'];
    protected $primaryKey = 'id_paciente';
    public $timestamps = false;
}
