<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into seguro (id_seguro, nombre) values (?, ?)', [1, 'SIS']);
        DB::insert('insert into seguro (id_seguro, nombre) values (?, ?)', [2, 'EsSalud']);
        DB::insert('insert into seguro (id_seguro, nombre) values (?, ?)', [3, 'Otro']);

        DB::insert('insert into ocupacion (id_ocupacion, nombre) values (?, ?)', [1, 'Docente']);
        DB::insert('insert into ocupacion (id_ocupacion, nombre) values (?, ?)', [2, 'Personal Administrativo']);



        //Médico
        DB::insert('insert into medico (id_medico, nombre, ap_pat, ap_mat, dni, fecharegistro, estado, idPadre) values (?, ?, ?, ?, ?, ?, ?, ?)', [1,'Christian Alexis','Ferrer','Cava','73437870','2020-05-07 22:58:23','activo',0]);
    }
}
