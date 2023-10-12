alter table especialidades 
change clave clave_especialidad varchar(16),
drop column clave_oficial,
drop column creditos_especialidad,
drop column nombre_reducido,
drop column siglas,
drop column fecha_termino;