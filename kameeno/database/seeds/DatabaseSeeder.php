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

        DB::insert('insert into rols (id, name) values (?, ?)', [1, 'UNTPRIMERALINEA']);
        DB::insert('insert into rols (id, name) values (?, ?)', [2, 'UNTSEGUNDALINEA']);

        DB::insert('insert into enfermedad (id_enfermedad, nombre) values (?, ?)', [1, 'Diabetes Mellitus']);
        DB::insert('insert into enfermedad (id_enfermedad, nombre) values (?, ?)', [2, 'Asma']);
        DB::insert('insert into enfermedad (id_enfermedad, nombre) values (?, ?)', [3, 'Enfermedad pulmonar crónica']);
        DB::insert('insert into enfermedad (id_enfermedad, nombre) values (?, ?)', [4, 'Obesidad o sobrepeso']);
        DB::insert('insert into enfermedad (id_enfermedad, nombre) values (?, ?)', [5, 'Hipertensión arterial']);
        DB::insert('insert into enfermedad (id_enfermedad, nombre) values (?, ?)', [6, 'Cáncer con quimioterapia']);
        DB::insert('insert into enfermedad (id_enfermedad, nombre) values (?, ?)', [7, 'Cáncer sin quimioterapia']);
        DB::insert('insert into enfermedad (id_enfermedad, nombre) values (?, ?)', [8, 'Enfermedades cardiovasculares']);
        DB::insert('insert into enfermedad (id_enfermedad, nombre) values (?, ?)', [9, 'Insuficiencia renal crónica']);
        DB::insert('insert into enfermedad (id_enfermedad, nombre) values (?, ?)', [10, 'Enfermedad reumatológica con uso continuo de antinflamatorios /corticoides']);
        DB::insert('insert into enfermedad (id_enfermedad, nombre) values (?, ?)', [11, 'Uso permanente de antinflamatorios o corticoides por otras causas']);


    }
}
