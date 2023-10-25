alter table datos_complementarios
add constraint fk_datcom_idalum_alum_idalum
foreign key (id_alumno)
references alumnos(id_alumno);