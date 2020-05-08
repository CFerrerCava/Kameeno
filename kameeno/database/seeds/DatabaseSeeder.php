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

        

        //Especialidad
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [1,'Alergología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [2,'Cardiología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [3,'Cirugía de Cabeza y Cuello']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [4,'Cirugía de Torax y Cardiovascular']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [5,'Cirugía General y Laparoscópica']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [6,'Cirugía Oncológica']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [7,'Cirugía Pediátrica']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [8,'Dermatología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [9,'Ecografía']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [10,'Endocrinología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [11,'Gastroenterología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [12,'Geriatría']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [13,'Ginecología Oncológica']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [14,'Ginecología y Obstetricia']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [15,'Hematología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [16,'Mastología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [17,'Medicina Física y Rehabilitación']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [18,'Medicina General']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [19,'Medicina Interna']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [20,'Nefrología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [21,'Neumología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [22,'Neurocirugía']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [23,'Neurología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [24,'Nutrición']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [25,'Odontología Infantil u Odontopediatría']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [26,'Odontología Integral']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [27,'Odontología. Cirugía Maxilo Facial']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [28,'Odontología. Endodoncia']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [29,'Odontología. Ortodoncia y Ortopedia']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [30,'Odontología. Periodoncia e Implantología']);
        
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [31,'Oftalmología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [32,'Otorrinolaringología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [33,'Pediatría']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [34,'Psicología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [35,'Radiología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [36,'Reumatologia']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [37,'Salud Mental']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [38,'Traumatologia y Ortopedia']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [39,'Urología']);
         DB::insert('insert into especialidad (id_especialidad, nombre) values (?, ?)', [40,'Odontología. Rehabilitación Oral']);

         //Médico
        DB::insert('insert into medico (id_medico, nombre, ap_pat, ap_mat, dni, telefono, estado, idPadre,id_especialidad) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [1,'Christian Alexis','Ferrer','Cava','73437870','902007640','activo',0,2]);
        DB::insert('insert into medico (id_medico, nombre, ap_pat, ap_mat, dni, telefono, estado, idPadre,id_especialidad) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [2,'Javier Rodolfo','Briceño','Montaño','14789632','902007640','activo',1,18]);
        DB::insert('insert into medico (id_medico, nombre, ap_pat, ap_mat, dni, telefono, estado, idPadre,id_especialidad) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [3,'Jairo Raúl','Navez','Aroca','12345678','902007640','activo',1,34]);
    }
}
