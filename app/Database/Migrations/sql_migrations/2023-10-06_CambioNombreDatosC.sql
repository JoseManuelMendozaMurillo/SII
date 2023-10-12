ALTER TABLE aspirantes_datos_complementarios
add column id_alumno int(11) UNSIGNED after id_aspirante,
MODIFY COLUMN id_aspirante INT UNSIGNED NULL,
RENAME TO datos_complementarios;