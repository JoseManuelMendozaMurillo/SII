ALTER TABLE datos_complementarios
drop column id_alumno,
MODIFY COLUMN id_aspirante INT UNSIGNED Not NULL,
 RENAME TO aspirantes_datos_complementarios;