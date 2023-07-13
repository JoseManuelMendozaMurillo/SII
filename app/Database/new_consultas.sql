/* Segundo Modelo */
use control_escolar;
-- Obtener el listado de todas las materias de la reticula de DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES

SELECT nombre_asignatura, clave_asignatura
from asignaturas
where id_asignatura IN 
      (select id_asignatura
      from asignaturas_especialidad
      where id_especialidad = 
            (select id_especialidad
            from especialidades
            where nombre_especialidad = 'DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES'))
|| id_asignatura IN 
      (select id_asignatura
      from asignaturas_carrera
      where id_carrera=
            (select id_carrera
            from reticulas
            where id_especialidad=
                  (select id_especialidad
                  from especialidades
                  where nombre_especialidad='DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES')));

-- Obtener el listado de todas las materias de la especialidad de DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES
SELECT nombre_asignatura, clave_asignatura
from asignaturas
where id_asignatura IN 
      (select id_asignatura
      from asignaturas_especialidad
      where id_especialidad = 
            (select id_especialidad
            from especialidades
            where nombre_especialidad = 'DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES'));

-- Obtener el listado de todas las materias sin especialidad de la carrera de sistemas
SELECT nombre_asignatura, clave_asignatura
from asignaturas
where id_asignatura IN 
      (select id_asignatura
      from asignaturas_carrera
      where id_carrera=
            (select id_carrera
            from carreras
            where nombre_carrera='Ingenieria en Sistemas Computacionales'));

-- Obtener un listado de todas las especialidades de una carrera
Select nombre_especialidad,clave_oficial
From especialidades
Where id_carrera = 
      (Select id_carrera
      From carreras
      Where nombre_carrera = "Ingenieria en Sistemas Computacionales");


-- Obtener un listado de las especialidades activas
Select nombre_especialidad,clave_oficial
From especialidades
Where deleted_at IS NULL;


-- Obtener las materias de una reticula ordenada por semestres (seleccione la reticula no 1)
/**/
CREATE TEMPORARY TABLE IF NOT EXISTS tabla_t_p1
AS
SELECT asig.nombre_asignatura,asig_esp .semestre_recomendado
FROM asignaturas asig
JOIN asignaturas_especialidad asig_esp ON asig.id_asignatura = asig_esp.id_asignatura
where asig_esp.id_especialidad = 
            (select id_especialidad
            from reticulas
            where id_reticula = 1);

CREATE TEMPORARY TABLE IF NOT EXISTS tabla_t_p2
AS
SELECT asig.nombre_asignatura,asig_carr.semestre_recomendado
FROM asignaturas asig
JOIN asignaturas_carrera asig_carr ON asig.id_asignatura = asig_carr.id_asignatura
where asig_carr.id_carrera = 
            (select id_carrera
            from reticulas
            where id_reticula=1);

CREATE TEMPORARY TABLE IF NOT EXISTS orden_materias_reticula
AS
SELECT nombre_asignatura,semestre_recomendado
from tabla_t_p1
UNION
select nombre_asignatura,semestre_recomendado
from tabla_t_p2;

select *
from orden_materias_reticula
order by semestre_recomendado;