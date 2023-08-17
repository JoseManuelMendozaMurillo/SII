ALTER TABLE aspirantes
drop column estado_civil,
ADD column estado_civil int(11) unsigned AFTER genero,
add constraint fk_asp_estciv_estciv_idestciv
foreign key (estado_civil)
references estado_civil(id_estado_civil);