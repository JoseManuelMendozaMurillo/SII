alter table asignaturas 
add column estatus int(11) unsigned after horas_practicas,
add constraint fk_asig_est_estret_id_esta
foreign key (estatus)
references estatus_reticula(id_estatus);