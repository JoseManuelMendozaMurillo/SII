ALTER TABLE aspirantes
drop foreign key fk_asp_estciv_estciv_idestciv,
drop key fk_asp_estciv_estciv_idestciv,
drop column estado_civil,
ADD column estado_civil VARCHAR(25) NOT NULL AFTER genero;
