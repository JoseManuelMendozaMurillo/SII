drop database control_escolar;

CREATE DATABASE IF NOT EXISTS control_escolar;

CREATE TABLE carreras (
    id_carrera INT UNSIGNED AUTO_INCREMENT,
    nombre_carrera VARCHAR(255) NOT NULL,
    clave_oficial CHAR(8) UNIQUE NOT NULL,
    clave VARCHAR(8) UNIQUE,
    siglas VARCHAR(3) UNIQUE,
    id_carrera INT UNSIGNED AUTO_INCREMENT,
    nombre_carrera VARCHAR(255) NOT NULL,
    clave_oficial CHAR(8) UNIQUE NOT NULL,
    clave VARCHAR(8) UNIQUE,
    siglas VARCHAR(3) UNIQUE,
    carga_maxima INT,
    carga_minima INT,
    creditos_totales INT NOT NULL,
    id_nivel_escolar int unsigned,
    PRIMARY KEY (id_carrera)
) ENGINE = InnoDB;

CREATE TABLE reticulas (
    id_reticula INT UNSIGNED AUTO_INCREMENT,
    nombre_reticula VARCHAR(255),
    id_carrera INT UNSIGNED,
    id_especialidad INT UNSIGNED,
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
    id_carrera int UNSIGNED,
    nombre_especialidad VARCHAR(255),
    clave VARCHAR(15),
    clave_oficial VARCHAR(8),
    creditos_totales INT,
    nombre_reducido VARCHAR(8),
    siglas CHAR(3),
    id_nivel_escolar int unsigned,
    PRIMARY KEY (id_especialidad)
) ENGINE = InnoDB;

CREATE TABLE materias_reticula (
    id_reticula INT UNSIGNED,
    id_materia INT UNSIGNED
) ENGINE = InnoDB;

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
    id_tipo_materia INT UNSIGNED NOT NULL,
    asociada_carrera INT UNSIGNED,
    asociada_especialidad INT UNSIGNED,
    PRIMARY KEY (id_materia)
) ENGINE = InnoDB;

CREATE TABLE convalidaciones(
    id_materia INT UNSIGNED,
    id_materia_combalidada INT UNSIGNED,
    porcentaje decimal
) ENGINE = InnoDB;

CREATE TABLE tipos_materia(
    id_tipo_materia int unsigned AUTO_INCREMENT,
    Descripcion VARCHAR(50),
    PRIMARY KEY (id_tipo_materia)
) ENGINE = InnoDB;

CREATE TABLE nivel_escolar(
    id_nivel_escolar int unsigned AUTO_INCREMENT,
    nombre_nivel_escolar VARCHAR(50),
    PRIMARY KEY (id_tipo_materia)
) ENGINE = InnoDB;

CREATE TABLE alumnos (
    id_alumno INT UNSIGNED AUTO_INCREMENT,
    no_control VARCHAR(9) UNIQUE NOT NULL,
    nombre VARCHAR(255),
    apellido_materno VARCHAR(255),
    apellido_paterno VARCHAR(255),
    id_reticula INT UNSIGNED,
    id_nivel_escolar int unsigned,
    becado_por VARCHAR(255),
    creditos_aprobados DECIMAL,
    creditos_cursados DECIMAL,
    estatus_alumno CHAR,
    estatus_alumno_anterior CHAR,
    opcion_titulacion NVARCHAR(255),
    PRIMARY KEY (id_alumno)
) ENGINE = InnoDB;

CREATE table alumno_inf_personal (
    id_alumno int unsigned,
    ciudad_procedencia VARCHAR(255),
    clave_servicio_medico VARCHAR(255),
    correo_electronico VARCHAR(255),
    curp_alumno VARCHAR(255),
    domicilio_escuela VARCHAR(255),
    entidad_procedencia VARCHAR(255),
    estado_civil VARCHAR(255),
    estatus_alumno_fecha DATE,
    estatus_alumno_usuario VARCHAR(255),
    fecha_actualizacion DATETIME,
    fecha_nacimiento DATE,
    hijo_trabajador CHAR,
    nacionalidad CHAR,
    sexo CHAR,
) ENGINE = InnoDB;

CREATE table alumno_inf_academica (
    id_alumno int unsigned,
    fecha_titulacion DATE,
    foto BLOB,
    nip INT,
    escuela_procedencia VARCHAR(255),
    folio INT,
    folio_probable INT,
    firma BLOB,
    periodo_ingreso_it VARCHAR(255),
    periodo_titulacion VARCHAR(255),
    periodos_revalidacion INT,
    plan_de_estudios CHAR,
    promedio_aritmetico_acumulado DECIMAL,
    promedio_final_alcanzado DECIMAL,
    promedio_periodo_anterior DECIMAL,
    semestre INT,
    tipo_alumno CHAR,
    tipo_escuela INT,
    tipo_ingreso INT,
    tipo_servicio_medico CHAR,
    ultimo_periodo_inscrito VARCHAR(255),
    usuario CHAR indice_reprobacion_acumulado DECIMAL,
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