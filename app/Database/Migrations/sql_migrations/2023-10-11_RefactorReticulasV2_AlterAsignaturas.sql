alter table asignaturas 
drop column nombre_abreviado_asignatura,
change clave_asignatura clave_asignatura varchar(8);