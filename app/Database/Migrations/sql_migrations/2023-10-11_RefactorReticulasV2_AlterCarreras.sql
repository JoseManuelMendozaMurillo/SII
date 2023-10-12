ALTER TABLE
    carreras DROP COLUMN clave_oficial,
    CHANGE clave clave_carrera varchar(13),
    DROP COLUMN siglas,
    DROP COLUMN creditos_totales,
    DROP COLUMN nivel,
    DROP COLUMN id_area_carr,
    DROP COLUMN id_nivel_carr,
    DROP COLUMN id_sub_area_carr,
    DROP COLUMN fecha_termino;