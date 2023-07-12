drop database control_escolar;

CREATE DATABASE IF NOT EXISTS control_escolar;

USE control_escolar;

CREATE TABLE carreras (
    id_carrera INT UNSIGNED AUTO_INCREMENT,
    nombre_carrera VARCHAR(255) NOT NULL,
    clave_oficial CHAR(8) UNIQUE NOT NULL,
    clave VARCHAR(8) UNIQUE,
    siglas VARCHAR(3) UNIQUE,
    carga_maxima INT,
    carga_minima INT,
    creditos_totales INT NOT NULL,
    PRIMARY KEY (id_carrera)
) ENGINE = InnoDB;

CREATE TABLE reticulas (
    id_reticula INT UNSIGNED AUTO_INCREMENT,
    nombre_reticula VARCHAR(255),
    id_carrera INT UNSIGNED,
    id_especialidad INT UNSIGNED,
    PRIMARY KEY (id_reticula)
) ENGINE = InnoDB;

CREATE TABLE especialidades (
    id_especialidad INT UNSIGNED AUTO_INCREMENT,
    nombre_especialidad VARCHAR(255),
    clave CHAR,
    clave_oficial CHAR,
    creditos_totales INT,
    nombre_reducido CHAR,
    siglas CHAR(3),
    PRIMARY KEY (id_especialidad)
) ENGINE = InnoDB;

CREATE TABLE materias_reticula (
    id_reticula INT UNSIGNED,
    id_materia INT UNSIGNED
) ENGINE = InnoDB;

CREATE TABLE materias (
    id_materia INT UNSIGNED AUTO_INCREMENT,
    nombre_materia VARCHAR(255) NOT NULL,
    nombre_abreviado_materia VARCHAR(255),
    id_tipo_materia INT UNSIGNED NOT NULL,
    asociada_carrera INT UNSIGNED,
    asociada_especialidad INT UNSIGNED,
    PRIMARY KEY (id_materia)
) ENGINE = InnoDB;

CREATE TABLE combalidaciones(
    id_materia INT UNSIGNED,
    id_materia_combalidada INT UNSIGNED,
    porcentaje decimal
) ENGINE = InnoDB;

CREATE TABLE tipos_materia(
    id_tipo_materia int unsigned AUTO_INCREMENT,
    Descripcion VARCHAR(50),
    PRIMARY KEY (id_tipo_materia)
) ENGINE = InnoDB;

CREATE TABLE alumnos (
    id_alumno INT UNSIGNED AUTO_INCREMENT,
    no_control VARCHAR(9) UNIQUE NOT NULL,
    nombre VARCHAR(255),
    apellido_materno VARCHAR(255),
    apellido_paterno VARCHAR(255),
    id_reticula INT UNSIGNED,
    PRIMARY KEY (id_alumno)
) ENGINE = InnoDB;

/*
 SELECT
 TABLE_NAME,
 COLUMN_NAME
 FROM
 INFORMATION_SCHEMA.KEY_COLUMN_USAGE
 WHERE
 CONSTRAINT_NAME = 'PRIMARY'
 AND TABLE_SCHEMA = 'control_escolar';
 
 select
 CONSTRAINT_NAME,
 TABLE_NAME,
 COLUMN_NAME,
 REFERENCED_TABLE_NAME,
 REFERENCED_COLUMN_NAME
 from
 INFORMATION_SCHEMA.KEY_COLUMN_USAGE
 where
 TABLE_SCHEMA = 'control_escolar'
 and REFERENCED_TABLE_NAME is not null;
 */