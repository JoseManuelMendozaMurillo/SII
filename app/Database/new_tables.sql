drop database control_escolar;

CREATE DATABASE IF NOT EXISTS control_escolar;

use control_escolar;
/*tablas de permisos*/

CREATE TABLE `users` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `username` varchar(30) DEFAULT NULL,
    `status` varchar(255) DEFAULT NULL,
    `status_message` varchar(255) DEFAULT NULL,
    `active` tinyint(1) NOT NULL DEFAULT '0',
    `last_active` datetime DEFAULT NULL,
    `created_at` datetime DEFAULT NULL,
    `updated_at` datetime DEFAULT NULL,
    `deleted_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;



CREATE TABLE `auth_groups_users` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `user_id` int unsigned NOT NULL,
    `group` varchar(255) NOT NULL,
    `created_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `auth_groups_users_user_id_foreign` (`user_id`),
    CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `auth_identities` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `user_id` int unsigned NOT NULL,
    `type` varchar(255) NOT NULL,
    `name` varchar(255) DEFAULT NULL,
    `secret` varchar(255) NOT NULL,
    `secret2` varchar(255) DEFAULT NULL,
    `expires` datetime DEFAULT NULL,
    `extra` text,
    `force_reset` tinyint(1) NOT NULL DEFAULT '0',
    `last_used_at` datetime DEFAULT NULL,
    `created_at` datetime DEFAULT NULL,
    `updated_at` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `type_secret` (`type`,`secret`),
    KEY `user_id` (`user_id`),
    CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `auth_logins` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `ip_address` varchar(255) NOT NULL,
    `user_agent` varchar(255) DEFAULT NULL,
    `id_type` varchar(255) NOT NULL,
    `identifier` varchar(255) NOT NULL,
    `user_id` int unsigned DEFAULT NULL,
    `date` datetime NOT NULL,
    `success` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `id_type_identifier` (`id_type`,`identifier`),
    KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `auth_permissions_users` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `user_id` int unsigned NOT NULL,
    `permission` varchar(255) NOT NULL,
    `created_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `auth_permissions_users_user_id_foreign` (`user_id`),
    CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


CREATE TABLE `auth_remember_tokens` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `selector` varchar(255) NOT NULL,
    `hashedValidator` varchar(255) NOT NULL,
    `user_id` int unsigned NOT NULL,
    `expires` datetime NOT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `selector` (`selector`),
    KEY `auth_remember_tokens_user_id_foreign` (`user_id`),
    CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


CREATE TABLE `auth_token_logins` (
    `id` int unsigned NOT NULL AUTO_INCREMENT,
    `ip_address` varchar(255) NOT NULL,
    `user_agent` varchar(255) DEFAULT NULL,
    `id_type` varchar(255) NOT NULL,
    `identifier` varchar(255) NOT NULL,
    `user_id` int unsigned DEFAULT NULL,
    `date` datetime NOT NULL,
    `success` tinyint(1) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `id_type_identifier` (`id_type`,`identifier`),
    KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `migrations` (
    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
    `version` varchar(255) NOT NULL,
    `class` varchar(255) NOT NULL,
    `group` varchar(255) NOT NULL,
    `namespace` varchar(255) NOT NULL,
    `time` int NOT NULL,
    `batch` int unsigned NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `settings` (
    `id` int NOT NULL AUTO_INCREMENT,
    `class` varchar(255) NOT NULL,
    `key` varchar(255) NOT NULL,
    `value` text,
    `type` varchar(31) NOT NULL DEFAULT 'string',
    `context` varchar(255) DEFAULT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*termina bloque*/

Create TABLE constantes(
    carga_minima int,
    carga_maxima int,
    creditos_optativos INT
) ENGINE= InnoDB;

CREATE TABLE carreras (
    id_carrera INT UNSIGNED AUTO_INCREMENT,
    nombre_carrera VARCHAR(255) NOT NULL,
    clave_oficial CHAR(13) UNIQUE NOT NULL,
    clave VARCHAR(13) UNIQUE,
    siglas VARCHAR(5) UNIQUE,
    creditos_totales INT,
    id_nivel_escolar int unsigned,
    fecha_inicio DATETIME,
    fecha_termino DATETIME,
    id_area_carr VARCHAR(255),
    id_nivel_carr VARCHAR(255),
    id_sub_area_carr VARCHAR(255),
    nivel VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    created_by VARCHAR(255),
    updated_by VARCHAR(255),
    deleted_by VARCHAR(255),
    PRIMARY KEY (id_carrera)
) ENGINE = InnoDB;

CREATE TABLE reticulas (
    id_reticula INT UNSIGNED AUTO_INCREMENT,
    nombre_reticula VARCHAR(255),
    id_carrera INT UNSIGNED,
    id_especialidad INT UNSIGNED,
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    created_by VARCHAR(255),
    updated_by VARCHAR(255),
    deleted_by VARCHAR(255),
    PRIMARY KEY (id_reticula)
) ENGINE = InnoDB;

CREATE TABLE especialidades (
    id_especialidad INT UNSIGNED AUTO_INCREMENT,
    id_carrera int UNSIGNED,
    nombre_especialidad VARCHAR(255),
    clave VARCHAR(18),
    clave_oficial VARCHAR(18),
    creditos_especialidad INT,
    nombre_reducido VARCHAR(8),
    siglas CHAR(5),
    fecha_inicio DATETIME,
    fecha_termino DATETIME,
    id_nivel_escolar int unsigned,
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    created_by VARCHAR(255),
    updated_by VARCHAR(255),
    deleted_by VARCHAR(255),
    PRIMARY KEY (id_especialidad)
) ENGINE = InnoDB;

CREATE TABLE asignaturas (
    id_asignatura INT UNSIGNED AUTO_INCREMENT,
    nombre_asignatura VARCHAR(255) NOT NULL,
    nombre_abreviado_asignatura VARCHAR(255),
    id_tipo_asignatura INT UNSIGNED NOT NULL,
    id_nivel_escolar int unsigned,
    clave_asignatura VARCHAR(255),
    horas_teoricas int,
    horas_practicas int,
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    created_by VARCHAR(255),
    updated_by VARCHAR(255),
    deleted_by VARCHAR(255),
    PRIMARY KEY (id_asignatura)
) ENGINE = InnoDB;

CREATE TABLE convalidaciones(
    id_asignatura INT UNSIGNED,
    id_asignatura_convalidada INT UNSIGNED,
    porcentaje decimal,
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    created_by VARCHAR(255),
    updated_by VARCHAR(255),
    deleted_by VARCHAR(255)
) ENGINE = InnoDB;

CREATE TABLE nivel_escolar(
    id_nivel_escolar int unsigned AUTO_INCREMENT,
    nombre_nivel_escolar VARCHAR(50),
    PRIMARY KEY (id_nivel_escolar)
) ENGINE = InnoDB;

CREATE TABLE alumnos (
    id_alumno INT UNSIGNED AUTO_INCREMENT,
    no_control VARCHAR(9) UNIQUE NOT NULL,
    nombre VARCHAR(255),
    apellido_materno VARCHAR(255),
    apellido_paterno VARCHAR(255),
    curp VARCHAR(18) UNIQUE NOT NULL,
    id_reticula INT UNSIGNED,
    id_nivel_escolar int unsigned,
    becado_por VARCHAR(255),
    creditos_aprobados DECIMAL,
    creditos_cursados DECIMAL,
    estatus_alumno VARCHAR(255),
    estatus_alumno_anterior VARCHAR(255),
    opcion_titulacion VARCHAR(255),
    modalidad VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    created_by VARCHAR(255),
    updated_by VARCHAR(255),
    deleted_by VARCHAR(255),
    PRIMARY KEY (id_alumno)
) ENGINE = InnoDB;

CREATE table alumno_inf_personal (
    id_alumno int unsigned,
    ciudad_procedencia VARCHAR(255),
    clave_servicio_medico VARCHAR(255),
    correo_electronico VARCHAR(255),
    domicilio_escuela VARCHAR(255),
    entidad_procedencia VARCHAR(255),
    estado_civil VARCHAR(255),
    estatus_alumno_fecha DATE,
    estatus_alumno_usuario VARCHAR(255),
    fecha_actualizacion DATETIME,
    fecha_nacimiento DATE,
    hijo_trabajador VARCHAR(255),
    nacionalidad VARCHAR(255),
    genero VARCHAR(255)
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
    plan_de_estudios VARCHAR(255),
    promedio_aritmetico_acumulado DECIMAL,
    promedio_final_alcanzado DECIMAL,
    promedio_periodo_anterior DECIMAL,
    semestre INT,
    tipo_alumno VARCHAR(255),
    tipo_escuela INT,
    tipo_ingreso INT,
    tipo_servicio_medico VARCHAR(255),
    ultimo_periodo_inscrito VARCHAR(255),
    indice_reprobacion_acumulado DECIMAL
) ENGINE = InnoDB;

CREATE table asignaturas_carrera (
    id_carrera int unsigned,
    id_asignatura int unsigned,
    semestre_recomendado int
) ENGINE = InnoDB;

CREATE table asignaturas_especialidad (
    id_especialidad int unsigned,
    id_asignatura int unsigned,
    semestre_recomendado int
) ENGINE = InnoDB;

CREATE TABLE dependencia_asignatura (
    id_asignatura int UNSIGNED,
    id_depende_de int UNSIGNED
) ENGINE = InnoDB;

create table tipo_asignatura(
    id_tipo_asignatura int unsigned AUTO_INCREMENT,
    tipo_asignatura VARCHAR(255),
    PRIMARY KEY(id_tipo_asignatura)
) ENGINE = InnoDB;

create table periodos_escolares(
    id_periodo INT UNSIGNED AUTO_INCREMENT,
    clave_periodo VARCHAR(255), #ENE-JUN2020,JUL-DIC2020,2020A,2020B
    inicio_periodo DATETIME,
    fin_periodo DATETIME,
    inscripciones BOOLEAN,
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    created_by VARCHAR(255),
    updated_by VARCHAR(255),
    deleted_by VARCHAR(255),
    PRIMARY KEY (id_periodo)
) ENGINE = InnoDB;

CREATE TABLE aspirantes (
    id_aspirante int UNSIGNED AUTO_INCREMENT,
    nombre varchar(255),
    apellido_paterno VARCHAR(255),
    apellido_materno VARCHAR(255),
    domicilio VARCHAR(255),
    curp VARCHAR(18),
    discapacidad VARCHAR(255),
    fecha_pago DATETIME,
    no_ficha INT,
    no_recibo INT,
    no_solicitud INT,
    id_periodo int unsigned,
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    created_by VARCHAR(255),
    updated_by VARCHAR(255),
    deleted_by VARCHAR(255),
    PRIMARY KEY (id_aspirante)
);
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