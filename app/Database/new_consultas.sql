use control_escolar;

/* Primer Modelo */

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
-- No se podude hacer con el modelo actual hasta no contestar la pregunta 2


-- Obtener un listado de todas las especialidades de una carrera
Select nombre_especialidad
From especialidades
Where id_especialidad = any (Select id_especialidad
                             From reticulas
                             Where id_carrera = (Select id_carrera
                                                 From carreras
                                                 Where nombre_carrera = "Ingeniería en Sistemas Computacionales")
                            ); 

-- Obtener un listado de las especialidades activas
-- No se podude hacer con el modelo actual


-- Obtener las materias de una reticula ordenada por semestres
-- No se podude hacer con el modelo actual


-- Obtener las materias de una carrera ordenadas por semestre
-- No se podude hacer con el modelo actual


-- Obtener las materias de una especialidad ordenadas por semestre
-- No se podude hacer con el modelo actual


-- Obtener la cadena completa de una materia
-- No se podude hacer con el modelo actual


/* PREGUNTAS IMPORTANTES */
-- 1. ¿Una materia de especialidad puede pertenecer a mas de una especialidad?
-- 2. ¿El temario de las materias de Tronco comun, como por ejemplo Calculo Diferencial, Calculo Integral o Calculo Vectorial
--     es el mismo para todas las carreras, de tal forma que estas materias se puede considerar como una materia que se le 
--     imparte a todas las carreras? 
-- 3. ¿Que son los créditos optativos dentro de las especialidades?



/* Segundo Modelo */

-- Obtener el listado de todas las materias de la reticula de DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES
Select nombre_asignatura
From asignaturas
Where id_asignaturas = any (Select id_asignatura
                            From asignaturas_especialidad
                            Where id_especialidad = (Select id_especialidad
                                                     From reticulas
                                                     Where id_especialidad = (Select id_especialidad 
                                                                              From especialidades
                                                                              Where nombre_especialidad = "DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES"
                                                                             )
                                                     )
                            )
      || id_asignaturas = any (Select id_asignatura
                               From asignaturas_carrera
                               Where id_carrera = (Select id_carrera
                                                   From reticulas
                                                   Where id_especialidad = (Select id_especialidad 
                                                                            From especialidades
                                                                            Where nombre_especialidad = "DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES"
                                                                           )
                                                  )
                             );            


-- Obtener el listado de todas las materias de la especialidad de DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES
Select nombre_asignatura
From asignaturas
Where id_asignaturas = any (Select id_asignatura
                            From asignaturas_especialidad
                            Where id_especialidad = (Select id_especialidad 
                                                     From especialidades
                                                     Where nombre_especialidad = "DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES"
                                                    )
                                                     
                            );

-- Obtener el listado de todas las materias sin especialidad de la carrera de sistemas
Select nombre_asignatura
From asignaturas
Where id_asignaturas = any (Select id_asignatura
                            From asignaturas_carrera
                            Where id_carrera = (Select id_carrera
                                                From carreras
                                                Where nombre_carrera = "Ingenieria en Sistemas Computacionales")
                           );  


-- Obtener un listado de todas las especialidades de una carrera
Select nombre_especialidad
From especialidades
Where id_carrera = (Select id_carrera
                    From carreras
                    Where nombre_carrera = "Ingenieria en Sistemas Computacionales");


-- Obtener un listado de las especialidades activas
Select nombre_especialidad
From especialidades
Where id_carrera = (Select id_carrera
                    From carreras
                    Where nombre_carrera = "Ingenieria en Sistemas Computacionales")
      And deleted_at = null;


-- Obtener las materias de una reticula ordenada por semestres
Select a.nombre_asignatura, ac.semestre_recomendado
From asignaturas as a
Inner Join asignaturas_carrera as ac 
On ac.id_carrera = (Select id_carrera 
                    From carreras 
                    Where nombre_carrera = "Ingenieria en Sistemas Computacionales")
Where a.id_asignaturas = ac.id_asignatura

UNION

Select a.nombre_asignatura, ae.semestre_recomendado
From asignaturas as a
Inner Join asignaturas_especialidad as ae 
On ae.id_especialidad = (Select id_especialidad 
                         From especialidades 
                         Where nombre_especialidad = "DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES")
Where a.id_asignaturas = ae.id_asignatura

Order By semestre_recomendado asc;


-- Obtener las materias de una carrera ordenadas por semestre
Select a.nombre_asignatura, ac.semestre_recomendado
From asignaturas as a
Inner Join asignaturas_carrera as ac On ac.id_carrera = (Select id_carrera From carreras Where nombre_carrera = "Ingenieria en Sistemas Computacionales")
Where a.id_asignaturas = ac.id_asignatura
Order By ac.semestre_recomendado asc;


-- Obtener las materias de una especialidad ordenadas por semestre
Select a.nombre_asignatura, ae.semestre_recomendado
From asignaturas as a
Inner Join asignaturas_especialidad as ae On ae.id_especialidad = (Select id_especialidad From especialidades Where nombre_especialidad = "DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES")
Where a.id_asignaturas = ae.id_asignatura
Order By ae.semestre_recomendado asc;


-- Obtener la cadena completa de una materia
Select nombre_asignatura
From asignaturas 
Where id_asignatura = any (Select id_depende_de
                           From dependencia_asignatura
                           Where id_asignatura = (Select id_asignatura
                                                   From asignaturas
                                                   Where nombre_asignatura = "CÁLCULO INTEGRAL")
                           );