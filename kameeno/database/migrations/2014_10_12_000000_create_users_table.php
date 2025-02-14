<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		//Area Médico
    	/*Schema::create('opciones', function (Blueprint $table) {
			$table->increments('id_op');
            $table->string('nombre', 20);
            $table->string('estado', 20);
        });
		Schema::create('roles', function (Blueprint $table) {
			$table->increments('id_rol');
			$table->string('tipo', 20);
			$table->string('estado', 20);
		});
		Schema::create('roles_opciones', function (Blueprint $table) {
            $table->integer('id_op')->unsigned();
            $table->integer('id_rol')->unsigned();
            $table->foreign('id_op')->references('id_op')->on('opciones');
            $table->foreign('id_rol')->references('id_rol')->on('roles');
			$table->string('estado', 20);
        });*/

        Schema::create('permisos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 70);
        });

        Schema::create('rols_permisos', function (Blueprint $table) {
            $table->integer('rol_id');
            $table->integer('permiso_id');
        });

        Schema::create('rols', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 70);
            $table->boolean('isAdmin')->default(false);
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('rol_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
		Schema::create('especialidad', function (Blueprint $table) {
			$table->increments('id_especialidad');
			$table->string('nombre', 50);
			$table->string('estado', 20)->default('activo');
		});
		Schema::create('medico', function (Blueprint $table) {
			$table->increments('id_medico');
			$table->string('nombre', 20);
			$table->string('ap_pat', 20);
			$table->string('ap_mat', 20);
			$table->string('dni', 8);
			$table->string('telefono', 20);
			$table->string('estado', 20)->default('activo');
            $table->integer('idPadre');
            $table->integer('user_id');
			$table->integer('id_especialidad')->unsigned();
            $table->foreign('id_especialidad')->references('id_especialidad')->on('especialidad');
            $table->timestamps();
		});

		/*
		Schema::create('rol_medico', function (Blueprint $table) {
            $table->increments('id_rolmedico');
            $table->timestamp('fecha');
            $table->integer('id_medico')->unsigned();
            $table->foreign('id_medico')->references('id_medico')->on('medico');
            $table->integer('id_rol')->unsigned();
            /$table->foreign('id_rol')->references('id_rol')->on('roles');
			$table->string('estado', 20);
		});
		*/
		//Area Médico
		//Area Formulario Registro
    	Schema::create('enfermedad', function (Blueprint $table) {
			$table->increments('id_enfermedad');
            $table->string('nombre', 150);
            $table->string('estado', 20)->default('activo');
        });
    	Schema::create('facultad_escuela', function (Blueprint $table) {
			$table->increments('id_facultad');
            $table->string('nombre', 50);
            $table->string('tipo', 20);
            $table->string('estado', 20);
        });
    	Schema::create('ocupacion', function (Blueprint $table) {
			$table->increments('id_ocupacion');
            $table->string('nombre', 40);
            $table->string('estado', 20)->default('activo');
        });
    	Schema::create('seguro', function (Blueprint $table) {
			$table->increments('id_seguro');
            $table->string('nombre', 150);
            $table->string('estado', 20)->default('activo');
            $table->string('direccion', 100)->nullable();
            $table->string('telefono', 20)->nullable();
        });
		//Area Formulario Registro
		//Area Pacientes
		Schema::create('paciente', function (Blueprint $table) {
			$table->increments('id_paciente');
			$table->string('nombre', 20);
			$table->string('ap_pat', 20);
			$table->string('ap_mat', 20);
			$table->string('dni', 8)->unique();
            $table->string('sexo', 20);
            $table->integer('edad');
			$table->string('estado_civil', 20)->nullable();
			$table->string('direccion', 40)->nullable();
			$table->string('telefono', 20);
			$table->string('correo', 30);
			$table->string('estado', 20)->default('activo');
			$table->text('tratamiento')->nullable();
			$table->integer('id_facultad')->unsigned();
			$table->integer('id_seguro')->unsigned();
			$table->integer('id_ocupacion')->unsigned();
			$table->foreign('id_seguro')->references('id_seguro')->on('seguro');
            $table->foreign('id_ocupacion')->references('id_ocupacion')->on('ocupacion');
            $table->timestamps();
		});
		//Area Pacientes
		//Area Formulario Registro
		Schema::create('enfermedad_paciente', function (Blueprint $table) {
			$table->integer('id_enfermedad')->unsigned();
			$table->integer('id_paciente')->unsigned();
			$table->foreign('id_enfermedad')->references('id_enfermedad')->on('enfermedad');
			$table->foreign('id_paciente')->references('id_paciente')->on('paciente');
			$table->string('estado', 20)->default('activo');
        });
		Schema::create('contacto', function (Blueprint $table) {
			$table->increments('id_contacto');
			$table->string('nombre', 20);
			$table->string('ap_pat', 20);
			$table->string('ap_mat', 20);
			$table->string('telefono', 20);
			$table->string('parentesco', 30)->nullable();
			$table->integer('id_paciente')->unsigned();
			$table->foreign('id_paciente')->references('id_paciente')->on('paciente');
        });
		//Area Formulario Registro
		//Area Pacientes
		Schema::create('historia_clinica', function (Blueprint $table) {
			$table->increments('id_historia');
			$table->timestamp('fecha_creacion');
			$table->string('estado', 20);
		});
		Schema::create('detalle_historia', function (Blueprint $table) {
			$table->increments('id_detalle');
			$table->text('consulta');
			$table->text('respuesta');
			$table->timestamp('fecha');
			$table->integer('id_historia')->unsigned();
			$table->foreign('id_historia')->references('id_historia')->on('historia_clinica');
		});
		Schema::create('rol_medico_paciente', function (Blueprint $table) {
			$table->increments('id_pacientexmedico');
			$table->integer('id_historia')->unsigned();
			//$table->integer('id_rolmedico')->unsigned();
			$table->integer('id_medico')->unsigned();
			$table->integer('id_paciente')->unsigned();
			$table->foreign('id_historia')->references('id_historia')->on('historia_clinica');
			//$table->foreign('id_rolmedico')->references('id_rolmedico')->on('rol_medico');
			$table->foreign('id_medico')->references('id_medico')->on('medico');
			$table->foreign('id_paciente')->references('id_paciente')->on('paciente');
		});
		//Area Pacientes
		//Area Cuestionarios
		Schema::create('cuestionarios', function (Blueprint $table) {
			$table->increments('id_cuestionario');
			$table->string('nombre', 100);
			$table->timestamp('fecharegistro');
			$table->text('descripcion');
			$table->string('estado', 20);
		});
		Schema::create('resultado_cuestionarios', function (Blueprint $table) {
			$table->increments('id_resultadocuestionario');
			$table->string('descripcion', 100);
			$table->integer('rango_minimo')->unsigned();
			$table->integer('rango_maximo')->unsigned();
			$table->string('estado', 20);
			$table->integer('id_cuestionario')->unsigned();
			$table->foreign('id_cuestionario')->references('id_cuestionario')->on('cuestionarios');
		});
		Schema::create('preguntas', function (Blueprint $table) {
			$table->increments('id_preguntas');
			$table->string('pregunta', 100);
			$table->string('estado', 20);
			$table->integer('orden')->unsigned();
			$table->integer('id_cuestionario')->unsigned();
			$table->foreign('id_cuestionario')->references('id_cuestionario')->on('cuestionarios');
		});
		Schema::create('detalle_pregunta', function (Blueprint $table) {
			$table->increments('id_det_pre');
			$table->string('opcion', 50);
			$table->integer('valor')->unsigned();
			$table->string('estado', 20);
			$table->integer('id_preguntas')->unsigned();
			$table->foreign('id_preguntas')->references('id_preguntas')->on('preguntas');
		});
		Schema::create('rol_medico_paciente_cuestionarios', function (Blueprint $table) {
			$table->increments('id_cuestionariopersona');
			$table->dateTime('fechaGenerado');
			$table->dateTime('fechaResuelto')->nullable();
			$table->dateTime('fechaObservado')->nullable();
			$table->text('observacion');
			$table->string('estado', 20);
			$table->integer('id_cuestionario')->unsigned();
			$table->foreign('id_cuestionario')->references('id_cuestionario')->on('cuestionarios');
			$table->integer('id_pacientexmedico')->unsigned();
			$table->foreign('id_pacientexmedico')->references('id_pacientexmedico')->on('rol_medico_paciente');
		});
		Schema::create('respuesta_cuestionario', function (Blueprint $table) {
			$table->string('estado', 20);
			$table->integer('id_det_pre')->unsigned();
			$table->integer('id_preguntas')->unsigned();
			$table->integer('id_cuestionariopersona')->unsigned();
			$table->foreign('id_det_pre')->references('id_det_pre')->on('detalle_pregunta');
			$table->foreign('id_preguntas')->references('id_preguntas')->on('preguntas');
			$table->foreign('id_cuestionariopersona')->references('id_cuestionariopersona')->on('rol_medico_paciente_cuestionarios');
        });

    }
		//Area Cuestionarios
		//MIS DATOS DE PRUEBA:3
		/*
		DB::table('especialidad')->insert([
			'nombre' => 'nombre',
			'estado' => 'estado'
		]);
		DB::table('medico')->insert([
			'nombre' => 'nombre',
			'ap_pat' => 'ap_pat',
			'ap_mat' => 'ap_mat',
			'dni' => 'dni',
			'telefono' => 'telefono',
			'fecharegistro' => null,
			'idPadre' => 0,
			'id_especialidad' => 1,
			'estado' => '1'
		]);
		DB::table('historia_clinica')->insert([
			'fecha_creacion' => null,
			'estado' => '1'
		]);
		DB::table('facultad_escuela')->insert([
			'nombre' => 'nombre',
			'tipo' => 'tipo',
			'estado' => '1'
		]);
		DB::table('ocupacion')->insert([
			'nombre' => 'nombre',
			'estado' => '1'
		]);
		DB::table('seguro')->insert([
			'nombre' => 'nombre',
			'estado' => '1',
			'direccion' => 'direccion',
			'telefono' => 'telefono'
		]);
		DB::table('paciente')->insert([
			'nombre' => 'nombre',
			'ap_pat' => 'ap_pat',
			'ap_mat' => 'ap_mat',
			'dni' => 'dni',
			'sexo' => 'sexo',
			'estado_civil' => 'estado_civil',
			'direccion' => 'direccion',
			'telefono' => 'telefono',
			'correo' => 'correo',
			'estado' => '1',
			'tratamiento' => 'tratamiento',
			'edad' => 20,
			'id_facultad' => 1,
			'id_seguro' => 1,
			'id_ocupacion' => 1
		]);
		DB::table('rol_medico_paciente')->insert([
			'id_historia' => 1,
			'id_medico' => 1,
			'id_paciente' => 1
		]);
		/*
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('users');
		Schema::dropIfExists('respuesta_cuestionario');
		Schema::dropIfExists('rol_medico_paciente_cuestionarios');
		Schema::dropIfExists('detalle_pregunta');
		Schema::dropIfExists('pregunta');
		Schema::dropIfExists('cuestionarios');
		Schema::dropIfExists('rol_medico_paciente');
		Schema::dropIfExists('detalle_historia');
		Schema::dropIfExists('historia_clinica');
		Schema::dropIfExists('contacto');
		Schema::dropIfExists('enfermedad_paciente');
		Schema::dropIfExists('paciente');
		Schema::dropIfExists('seguro');
		Schema::dropIfExists('ocupacion');
		Schema::dropIfExists('facultad_escuela');
		Schema::dropIfExists('enfermedad');
		Schema::dropIfExists('rol_medico');
		Schema::dropIfExists('especialidad');
		Schema::dropIfExists('medico');
		Schema::dropIfExists('roles_opciones');
		Schema::dropIfExists('roles');
		Schema::dropIfExists('opciones');
    }
}
