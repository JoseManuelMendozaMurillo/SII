CREATE TABLE alumnos(
    id_alumno int(11) UNSIGNED AUTO_INCREMENT,
    user_id int UNSIGNED,
    no_control varchar(9),
    imagen varchar(255),
    curp varchar(18),
    apellido_paterno varchar(255),
    apellido_materno varchar(255),
    nombre varchar(255),
    fecha_nacimiento date,
    genero varchar(10),
    estado_civil int UNSIGNED,
    pais_nacimiento varchar(255),
    telefono varchar(10),
    email varchar(255),
    escuela_procedencia varchar(255),
    estado_escuela varchar(255),
    municipio_escuela varchar(255),
    ano_egreso varchar(4),
    promedio_general varchar(255),
    carrera_primera_opcion int UNSIGNED,
    carrera_segunda_opcion int UNSIGNED,
    turno_preferente varchar(255),
    ito_primer_opcion varchar(255),
    motivo_ingreso int UNSIGNED,
    motivo_seleccion_plan_estudios varchar(255),
    created_at datetime,
    updated_at datetime,
    deleted_at datetime,
    created_by varchar(255),
    updated_by varchar(255),
    deleted_by varchar(255),
    primary key (id_alumno)
);