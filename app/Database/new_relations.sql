use control_escolar;
/**/
/* Relacion reticulas --> carreras */
alter table reticulas
add constraint fk_rets_idcarr_carrs_idcarr
foreign key (id_carrera)
references carreras(id_carrera);
/*relacion reticulas --> especialidades*/
alter table reticulas
add constraint fk_rets_idesp_esps_idesp
foreign key (id_especialidad)
references especialidades(id_especialidad);
/*alumnos --> reticula*/
alter table alumnos
add constraint fk_alum_idesp_rets_idesp
foreign key (id_reticula)
references reticulas(id_reticula);
/*maretiras_reticula-->reticulas*/
alter table materias_reticula
add constraint fk_matsret_idret_rets_idret
foreign key (id_reticula)
references reticulas(id_reticula);
/*maretiras_reticula-->materias*/
alter table materias_reticula
add constraint fk_matsret_idmat_mats_idmat
foreign key (id_materia)
references materias(id_materia);
/*materias-->tipo_materia*/
alter table materias
add constraint fk_mats_idtipmat_tipsmat_idtipmat
foreign key (id_tipo_materia)
references tipos_materia(id_tipo_materia);
/*materias-->carrera*/
alter table materias
add constraint fk_mats_asocarr_carrs_idcarr
foreign key (asociada_carrera)
references carreras(id_carrera);
/*materias-->especialidad*/
alter table materias
add constraint fk_mats_asoesp_esps_idesp
foreign key (asociada_especialidad)
references especialidades(id_especialidad);
/*combalidaciones-->materias*/
alter table convalidaciones
add constraint fk_comb_idmat_mats_idmat
foreign key (id_materia)
references materias(id_materia);
/*combalidaciones-->materias*/
alter table convalidaciones
add constraint fk_comb_idmatcom_mats_idmat
foreign key (id_materia_combalidada)
references materias(id_materia);
/*Especilidad-->Carreras*/
alter table especialidades
add constraint fk_espe_idcarr_carrs_idcarr
foreign key (id_carrera)
references carreras(id_carrera);
/*
ALTER TABLE `alumnos` 
ADD CONSTRAINT `fk_alum_idesp_rets_idesp` 
FOREIGN KEY (`id_reticula`) 
REFERENCES `reticulas`(`id_reticula`) 
ON DELETE RESTRICT ON UPDATE CASCADE;
*/