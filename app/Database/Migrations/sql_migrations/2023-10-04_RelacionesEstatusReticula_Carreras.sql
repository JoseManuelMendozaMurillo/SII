ALTER TABLE
    carreras
ADD
    COLUMN estatus int(11) UNSIGNED
AFTER
    nivel,
ADD
    CONSTRAINT fk_carr_est_estret_id_esta FOREIGN KEY (estatus) REFERENCES estatus_reticula(id_estatus);