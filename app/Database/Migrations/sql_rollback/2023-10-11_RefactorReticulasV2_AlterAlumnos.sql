alter table alumnos 
change reticula carrera_primera_opcion	int unsigned,
add column carrera_segunda_opcion	int unsigned after carrera_primera_opcion;