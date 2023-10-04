alter table reticulas  
add column estatus int(11) unsigned after id_especialidad,
add constraint fk_ret_est_estret_id_esta
foreign key (estatus)
references estatus_reticula(id_estatus);