alter table especialidades 
change clave_especialidad clave varchar(18),
add column clave_oficial varchar(255) after clave,
add column creditos_especialidad int after clave_oficial,
add column nombre_reducido varchar(8) after creditos_especialidad,
add column siglas char(5) after nombre_reducido,
add column fecha_termino datetime after fecha_inicio;