USE control_escolar;
CREATE TABLE carreras (
    id_carrera INT AUTO_INCREMENT UNSIGNED,
    nombre_carrera VARCHAR(255)  NOT NULL,
    clave_oficial CHAR UNIQUE  NOT NULL,
    clave CHAR UNIQUE,
    siglas CHAR(3) UNIQUE,
    carga_maxima INT,
    carga_minima INT,
    creditos_totales INT NOT NULL,
    nombre_reducido CHAR,
    PRIMARY KEY (id_carrera)
);
CREATE TABLE reticula (
    id_reticula INT AUTO_INCREMENT UNSIGNED,
    id_carrera INT,
    id_especialidad INT,
    PRIMARY KEY (id_reticula)
);
CREATE TABLE especialidad (
    id_especialidad INT AUTO_INCREMENT UNSIGNED,
    nombre_especialidad VARCHAR(255),
    clave CHAR,
    clave_oficial CHAR,
    creditos_totales INT,
    nombre_reducido CHAR,
    siglas CHAR(3),
    PRIMARY KEY (id_especialidad)
);
CREATE TABLE alumnos (
    id_alumno INT UNSIGNED AUTO_INCREMENT,
    no_control VARCHAR(9) UNIQUE NOT NULL,
    nombre VARCHAR(255)
    apellido_materno VARCHAR(255),
    apellido_paterno VARCHAR(255),
    id_reticula INT,
    PRIMARY KEY (id_alumno)
);
CREATE TABLE materias_reticula (
    id_reticula INT,
    id_materia INT
);
CREATE TABLE materias (
    id_materia INT UNSIGNED AUTO_INCREMENT,
    nombre_materia VARCHAR(255) NOT NULL,
    nombre_abreviado_materia VARCHAR(255),
    tipo_materia INT,
    PRIMARY KEY (id_materia)
);
