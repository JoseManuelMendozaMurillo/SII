alter table carreras 
add column clave_oficial char(13) after nombre_carrera,
change clave_carrera clave varchar(13),
add column siglas varchar(5) after clave,
add column creditos_totales int after siglas,
add column fecha_termino datetime after fecha_inicio,
add column id_area_carr varchar(255) after fecha_termino,
add column id_nivel_carr varchar(255) after id_area_carr,
add column id_sub_area_carr varchar(255) after id_nivel_carr,
add column nivel varchar(255) after id_sub_area_carr;