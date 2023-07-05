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
/*alumnos --> nivel_escolar*/
alter table alumnos
add constraint fk_alum_idnivesc_nivesc_idnivesc
foreign key (id_nivel_escolar)
references nivel_escolar(id_nivel_escolar);
/*materias-->tipo_materia*/
alter table materias
add constraint fk_mats_idtipmat_tipsmat_idtipmat
foreign key (id_tipo_materia)
references tipos_materia(id_tipo_materia);
/*materias-->nivel_escolar*/
alter table materias
add constraint fk_mats_idnivesc_nivesc_idnivesc
foreign key (id_nivel_escolar)
references nivel_escolar(id_nivel_escolar);
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
/*Especilidad-->nivel_escolar*/
alter table especialidades
add constraint fk_espe_idnivesc_nivesc_idnivesc
foreign key (id_nivel_escolar)
references nivel_escolar(id_nivel_escolar);
/*Materias_carrera-->carrera*/
ALTER TABLE materias_carrera
ADD constraint fk_matscarr_idcarr_carrs_idcarr
foreign key (id_carrera)
references carreras(id_carrera);
/*Materias_carrera-->materias*/
ALTER TABLE materias_carrera
ADD constraint fk_matscarr_idmat_mats_idmat
foreign key (id_materia)
references materias(id_materia);
/*Materias_especialidad-->especialidad*/
ALTER TABLE materias_especialidad
ADD constraint fk_mtsesp_idesp_esp_idesp
foreign key (id_especialidad)
references especialidades(id_especialidad);
/*Materias_especialidad-->materias*/
ALTER TABLE materias_especialidad
ADD constraint fk_matsesp_idmat_mats_idmat
foreign key (id_materia)
references materias(id_materia);
/*carreras-->nivel_escolar*/
alter table carreras
add constraint fk_carrs_idnivesc_nivesc_idnivesc
foreign key (id_nivel_escolar)
references nivel_escolar(id_nivel_escolar);
/*alumno_inf_personal-->alumnos*/
alter table alumno_inf_personal
add constraint fk_aluinfper_idalum_alum_idalum
foreign key (id_alumno)
references alumnos(id_alumno);
/*alumno_inf_academica-->alumnos*/
alter table alumno_inf_academica
add constraint fk_aluinfaca_idalu_alum_idalu
foreign key (id_alumno)
references alumnos(id_alumno);
/*
ALTER TABLE `alumnos` 
ADD CONSTRAINT `fk_alum_idesp_rets_idesp` 
FOREIGN KEY (`id_reticula`) 
REFERENCES `reticulas`(`id_reticula`) 
ON DELETE RESTRICT ON UPDATE CASCADE;
*/