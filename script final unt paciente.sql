drop database if exists untpaciente;
create database untpaciente;
use untpaciente;

CREATE TABLE contacto
(
	id_paciente          INTEGER NULL,
	id_contacto          INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombre               VARCHAR(20) NOT NULL,
	ap_pat               VARCHAR(20) NOT NULL,
	ap_mat               VARCHAR(20) NOT NULL,
	telefono             VARCHAR(20) NOT NULL
);

CREATE TABLE cuestionarios
(
	id_cuestionario      INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre               VARCHAR(100) NULL,
	fecharegistro        DATETIME NOT NULL,
	descripcion          TEXT NOT NULL,
	estado               VARCHAR(20) NULL
);

CREATE TABLE detalle_historia
(
	id_detalle           INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
	consulta             TEXT NOT NULL,
	fecha                DATETIME NOT NULL,
	id_historia          INTEGER NOT NULL,
	respuesta            TEXT NULL
);

CREATE TABLE detalle_pregunta
(
	id_preguntas         INTEGER NOT NULL,
	id_det_pre           INTEGER PRIMARY KEY AUTO_INCREMENT,
	opcion               VARCHAR(50) NOT NULL,
	valor                INTEGER NOT NULL,
	estado               VARCHAR(20) NOT NULL
);

CREATE TABLE enfermedad
(
	id_enfermedad        INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombre               VARCHAR(150) NOT NULL,
	estado               VARCHAR(20) NOT NULL
);

CREATE TABLE enfermedad_paciente
(
	id_enfermedad        INTEGER NOT NULL,
	id_paciente          INTEGER NOT NULL,
	estado               VARCHAR(20) NOT NULL
);

CREATE TABLE especialidad
(
	id_especialidad      INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombre               VARCHAR(20) NOT NULL,
	estado               VARCHAR(20) NOT NULL,
	id_medico            INTEGER NULL
);

CREATE TABLE facultad_escuela
(
	id_facultad          INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombre               VARCHAR(50) NOT NULL,
	estado               VARCHAR(20) NOT NULL,
	tipo                 VARCHAR(20) NULL,
	id_facultadfk        INTEGER NULL
);

CREATE TABLE historia_clinica
(
	id_historia          INTEGER PRIMARY KEY AUTO_INCREMENT,
	fecha_creacion       DATETIME NOT NULL,
	estado               VARCHAR(20) NOT NULL
);

CREATE TABLE medico
(
	id_medico            INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombre               VARCHAR(20) NOT NULL,
	ap_pat               VARCHAR(20) NOT NULL,
	ap_mat               VARCHAR(20) NOT NULL,
	dni                  CHAR(8) NOT NULL,
	fecharegistro        DATETIME NOT NULL,
	estado               VARCHAR(20) NOT NULL,
	usuario              VARCHAR(20) NOT NULL,
	clave                VARCHAR(20) NOT NULL
);

CREATE TABLE ocupacion
(
	id_ocupacion         INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombre               VARCHAR(20) NOT NULL,
	estado               VARCHAR(20) NOT NULL
);

CREATE TABLE opciones
(
	id_op                INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombre               VARCHAR(20) NOT NULL,
	estado               VARCHAR(20) NOT NULL
);

CREATE TABLE paciente
(
	id_paciente          INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombre               VARCHAR(20) NOT NULL,
	ap_pat               VARCHAR(20) NOT NULL,
	ap_mat               VARCHAR(20) NOT NULL,
	dni                  CHAR(8) NOT NULL,
	fecha_registro       DATE NULL,
	estado               VARCHAR(20) NULL,
	fecha_nac            DATE NULL,
	estado_civil         VARCHAR(20) NULL,
	direccion            VARCHAR(40) NULL,
	telefono             VARCHAR(20) NULL,
	sexo                 VARCHAR(20) NULL,
	correo               VARCHAR(30) NULL,
	id_facultad          INTEGER NULL,
	id_ocupacion         INTEGER NULL,
	id_seguro            INTEGER NULL,
	tratamiento          TEXT NOT NULL
);

CREATE TABLE preguntas
(
	id_preguntas         INTEGER PRIMARY KEY AUTO_INCREMENT,
	pregunta             VARCHAR(100) NOT NULL,
	id_cuestionario      INTEGER NOT NULL,
	estado               VARCHAR(20) NOT NULL,
	orden                INTEGER NULL
);

CREATE TABLE respuesta_cuestionario
(
	id_cuestionariopersona INTEGER NOT NULL,
	id_det_pre           INTEGER NOT NULL,
	id_preguntas         INTEGER NOT NULL,
	estado               VARCHAR(20) NOT NULL
);

CREATE TABLE rol_medico
(
	id_rolmedico         INTEGER PRIMARY KEY AUTO_INCREMENT,
	fecha                DATETIME NOT NULL,
	id_medico            INTEGER NULL,
	id_rol               INTEGER NULL,
	estado               VARCHAR(20) NOT NULL,
    id_rolmedicofk       INTEGER NULL
);

CREATE TABLE rol_medico_paciente
(
	id_historia          INTEGER NULL,
	estado               VARCHAR(20) NOT NULL,
	id_pacientexmedico   INTEGER PRIMARY KEY AUTO_INCREMENT,
	id_rolmedico         INTEGER NULL,
	id_paciente          INTEGER NULL
);

CREATE TABLE rol_medico_paciente_cuestionarios
(
	id_pacientexmedico   INTEGER NOT NULL,
	id_cuestionario      INTEGER NOT NULL,
	id_cuestionariopersona INTEGER PRIMARY KEY AUTO_INCREMENT,
	fecha                DATETIME NULL,
	estado               VARCHAR(20) NOT NULL,
	observacion          TEXT NULL
);

CREATE TABLE roles
(
	id_rol               INTEGER PRIMARY KEY AUTO_INCREMENT,
	tipo                 VARCHAR(20) NOT NULL,
	estado               VARCHAR(20) NOT NULL
);

CREATE TABLE roles_opciones
(
	id_rol               INTEGER NOT NULL,
	id_op                INTEGER NOT NULL,
	estado               VARCHAR(20) NOT NULL
);

CREATE TABLE seguro
(
	id_seguro            INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombre               VARCHAR(150) NOT NULL,
	estado               VARCHAR(20) NULL,
	direcion             VARCHAR(100) NULL,
	telefono             VARCHAR(20) NULL
);

ALTER TABLE contacto
ADD FOREIGN KEY R_27 (id_paciente) REFERENCES paciente (id_paciente);

ALTER TABLE detalle_historia
ADD FOREIGN KEY R_25 (id_historia) REFERENCES historia_clinica (id_historia);

ALTER TABLE detalle_pregunta
ADD FOREIGN KEY R_37 (id_preguntas) REFERENCES preguntas (id_preguntas);

ALTER TABLE enfermedad_paciente
ADD FOREIGN KEY R_33 (id_enfermedad) REFERENCES enfermedad (id_enfermedad);

ALTER TABLE enfermedad_paciente
ADD FOREIGN KEY R_35 (id_paciente) REFERENCES paciente (id_paciente);

ALTER TABLE especialidad
ADD FOREIGN KEY R_5 (id_medico) REFERENCES medico (id_medico);

ALTER TABLE paciente
ADD FOREIGN KEY R_29 (id_facultad) REFERENCES facultad_escuela (id_facultad);

ALTER TABLE paciente
ADD FOREIGN KEY R_30 (id_ocupacion) REFERENCES ocupacion (id_ocupacion);

ALTER TABLE paciente
ADD FOREIGN KEY R_31 (id_seguro) REFERENCES seguro (id_seguro);

ALTER TABLE preguntas
ADD FOREIGN KEY R_36 (id_cuestionario) REFERENCES cuestionarios (id_cuestionario);

ALTER TABLE respuesta_cuestionario
ADD FOREIGN KEY R_44 (id_cuestionariopersona) REFERENCES rol_medico_paciente_cuestionarios (id_cuestionariopersona);

ALTER TABLE respuesta_cuestionario
ADD FOREIGN KEY R_46a (id_det_pre) REFERENCES detalle_pregunta (id_det_pre);

ALTER TABLE respuesta_cuestionario
ADD FOREIGN KEY R_46b (id_preguntas) REFERENCES detalle_pregunta (id_preguntas);

ALTER TABLE rol_medico
ADD FOREIGN KEY R_17 (id_medico) REFERENCES medico (id_medico);

ALTER TABLE rol_medico
ADD FOREIGN KEY R_18 (id_rol) REFERENCES roles (id_rol);

ALTER TABLE rol_medico_paciente
ADD FOREIGN KEY R_26 (id_historia) REFERENCES historia_clinica (id_historia);

ALTER TABLE rol_medico_paciente
ADD FOREIGN KEY R_38 (id_rolmedico) REFERENCES rol_medico (id_rolmedico);

ALTER TABLE rol_medico_paciente
ADD FOREIGN KEY R_39 (id_paciente) REFERENCES paciente (id_paciente);

ALTER TABLE rol_medico_paciente_cuestionarios
ADD FOREIGN KEY R_40 (id_pacientexmedico) REFERENCES rol_medico_paciente (id_pacientexmedico);

ALTER TABLE rol_medico_paciente_cuestionarios
ADD FOREIGN KEY R_42 (id_cuestionario) REFERENCES cuestionarios (id_cuestionario);

ALTER TABLE roles_opciones
ADD FOREIGN KEY R_47 (id_rol) REFERENCES roles (id_rol);

ALTER TABLE roles_opciones
ADD FOREIGN KEY R_49 (id_op) REFERENCES opciones (id_op);
