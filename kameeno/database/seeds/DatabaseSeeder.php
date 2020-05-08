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
    }
}
