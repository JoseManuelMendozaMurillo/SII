alter table asignaturas 
add column nombre_abreviado_asignatura varchar(255) after nombre_asignatura,
change clave_asignatura clave_asignatura varchar(255);