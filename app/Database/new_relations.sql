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
/*asignatura-->nivel_escolar*/
alter table asignaturas
add constraint fk_asig_idnivesc_nivesc_idnivesc
foreign key (id_nivel_escolar)
references nivel_escolar(id_nivel_escolar);
/*dependencia_asignaturas-->asignaturas*/
alter table dependencia_asignatura
add constraint fk_depasig_idasi_asig_idasi
foreign key (id_asignatura)
references asignaturas(id_asignatura);
/*dependencia_asignaturas-->asignaturas*/
alter table dependencia_asignatura
add constraint fk_depasig_idasidep_asig_idasi
foreign key (id_asignatura)
references asignaturas(id_asignatura);
/*convalidaciones-->asignaturas*/
alter table convalidaciones
add constraint fk_conv_idasicon_asi_idasi
foreign key (id_asignatura_convalidada)
references asignaturas(id_asignatura);
/*convalidaciones-->asignaturas*/
alter table convalidaciones
add constraint fk_conv_idasi_asi_idasi
foreign key (id_asignatura)
references asignaturas(id_asignatura);
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
/*asignaturas_carrera-->carrera*/
ALTER TABLE asignaturas_carrera
ADD constraint fk_asicarr_idcarr_carr_idcarr
foreign key (id_carrera)
references carreras(id_carrera);
/*asignaturas_carrera-->asignaturas*/
ALTER TABLE asignaturas_carrera
ADD constraint fk_asicarr_idasi_asi_idasi
foreign key (id_asignatura)
references asignaturas(id_asignatura);
/*asignaturas_especialidad-->especialidad*/
ALTER TABLE asignaturas_especialidad
ADD constraint fk_asiesp_idesp_esp_idesp
foreign key (id_especialidad)
references especialidades(id_especialidad);
/*asignaturas_especialidad-->asignaturas*/
ALTER TABLE asignaturas_especialidad
ADD constraint fk_matsesp_idmat_mats_idmat
foreign key (id_asignatura)
references asignaturas(id_asignatura);
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