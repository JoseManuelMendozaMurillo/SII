alter table especialidades
add column estatus int(11) unsigned after id_nivel_escolar,
add constraint fk_esp_est_estret_id_esta
foreign key (estatus)
references estatus_reticula(id_estatus);