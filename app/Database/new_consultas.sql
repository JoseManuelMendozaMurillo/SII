use control_escolar;

-- Obtener el listado de todas las materias de la reticula de Analisis de Datos
Select nombre_materia
From materias
Where id_materia = any (Select id_materia 
                        From materias_reticula
                        Where id_reticula = (Select id_reticula
                                             From reticulas
                                             Where id_especialidad = (Select id_especialidad 
                                                                      From especialidades
                                                                      Where nombre_especialidad = "Analisis de datos"
                                                                     )
                                            )
                        );


-- Obtener el listado de todas las materias de la reticula de Desarrollo para la Web y Aplicaciones para Dispositivos Móviles
Select nombre_materia
From materias
Where id_materia = any (Select id_materia 
                        From materias_reticula
                        Where id_reticula = (Select id_reticula
                                             From reticulas
                                             Where id_especialidad = (Select id_especialidad 
                                                                      From especialidades
                                                                      Where nombre_especialidad = "Desarrollo para la Web y Aplicaciones para Dispositivos Móviles"
                                                                     )
                                            )
                        );


-- Obtener el listado de todas las materias de la especialidad de Analisis de Datos
Select nombre_materia
From materias
Where asociada_especialidad = (Select id_especialidad
                               From especialidades
                               Where nombre_especialidad = "Analisis de Datos"); 


-- Obtener el listado de todas las materias de la especialidad de Desarrollo para la Web y Aplicaciones para Dispositivos Móviles
Select nombre_materia
From materias
Where asociada_especialidad = (Select id_especialidad
                               From especialidades
                               Where nombre_especialidad = "Desarrollo para la Web y Aplicaciones para Dispositivos Móviles"); 


-- Obtener el listado de todas las materias sin especialidad de la carrera de sistemas


/* PREGUNTAS IMPORTANTES */
-- 1. ¿Una materia de especialidad puede pertenecer a mas de una especialidad?
-- 2. ¿El temario de las materias de Tronco comun, como por ejemplo Calculo Diferencial, Calculo Integral o Calculo Vectorial
--     es el mismo para todas las carreras, de tal forma que estas materias se puede considerar como una materia que se le 
--     imparte a todas las carreras? 