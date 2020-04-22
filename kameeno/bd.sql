
CREATE TABLE detalle_publicacion
(
	id_det               INTEGER AUTO_INCREMENT PRIMARY KEY,
	url                  VARCHAR(20) NOT NULL,
	tipo                 VARCHAR(20) NOT NULL,
	estado               VARCHAR(20) NOT NULL,
	id_pub               INTEGER NOT NULL
 
);



 


CREATE TABLE publicacion
(
	id_pub               INTEGER AUTO_INCREMENT PRIMARY KEY,
	titulo               VARCHAR(20) NOT NULL,
	contenido            VARCHAR(20) NOT NULL,
	fecha_creacion       DATETIME NOT NULL,
	fecha_publicacion    DATETIME NULL,
	url                  VARCHAR(50) NULL,
	popup                INTEGER NULL,
	estado               VARCHAR(20) NULL,
	id_us                INTEGER NULL,
	id_rol               INTEGER NULL,
	id_roltipo           CHAR(18) NULL
 
);


 



CREATE TABLE roles
(
	id_rol               INTEGER AUTO_INCREMENT PRIMARY KEY,
	tipo                 VARCHAR(20) NOT NULL,
	estado               VARCHAR(20) NOT NULL
 
);


 


CREATE TABLE roles_Tipo
(
	id_roltipo           CHAR(18) NOT NULL,
	Estado               VARCHAR(20) NULL,
	id_rol               INTEGER NULL,
	id_tipo              INTEGER NULL
);



 

CREATE TABLE Tipo
(
	id_tipo              INTEGER AUTO_INCREMENT PRIMARY KEY,
	nombre               VARCHAR(20) NULL,
	estado               VARCHAR(20) NOT NULL
 
);



 


CREATE TABLE usuarios
(
	id_us                INTEGER AUTO_INCREMENT PRIMARY KEY,
	nombre               VARCHAR(20) NULL,
	ap_paterno           VARCHAR(20) NULL,
	ap_materno           VARCHAR(20) NULL,
	estado               VARCHAR(20) NULL,
	clave                CHAR(18) NULL,
	usuario              VARCHAR(20) NULL
 
);


 


CREATE TABLE usuarios_roles
(
	id_us                INTEGER NOT NULL,
	id_rol               INTEGER NOT NULL,
	estado               VARCHAR(20) NOT NULL,
	views                INTEGER NOT NULL,
	fecha                DATETIME NOT NULL
);



 

ALTER TABLE detalle_publicacion
ADD FOREIGN KEY R_6 (id_pub) REFERENCES publicacion (id_pub);



ALTER TABLE publicacion
ADD FOREIGN KEY R_4 (id_us) REFERENCES usuarios (id_us);



ALTER TABLE publicacion
ADD FOREIGN KEY R_7 (id_rol) REFERENCES roles (id_rol);



ALTER TABLE publicacion
ADD FOREIGN KEY R_17 (id_roltipo) REFERENCES roles_Tipo (id_roltipo);



ALTER TABLE roles_Tipo
ADD FOREIGN KEY R_15 (id_rol) REFERENCES roles (id_rol);



ALTER TABLE roles_Tipo
ADD FOREIGN KEY R_16 (id_tipo) REFERENCES Tipo (id_tipo);



ALTER TABLE usuarios_roles
ADD FOREIGN KEY R_1 (id_us) REFERENCES usuarios (id_us);



ALTER TABLE usuarios_roles
ADD FOREIGN KEY R_3 (id_rol) REFERENCES roles (id_rol);

