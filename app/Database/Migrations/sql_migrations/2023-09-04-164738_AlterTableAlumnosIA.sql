ALTER TABLE alumno_inf_academica
add constraint fk_aluinfaca_idalu_alu_idalu
foreign key (id_alumno)
references alumnos(id_alumno);