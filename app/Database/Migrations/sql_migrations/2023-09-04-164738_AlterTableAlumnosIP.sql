ALTER TABLE alumno_inf_personal
add constraint fk_aluinfper_idalu_alu_idalu
foreign key (id_alumno)
references alumnos(id_alumno);