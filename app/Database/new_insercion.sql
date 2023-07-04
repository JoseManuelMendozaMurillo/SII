/*Insertar valores en tabla carreras*/
insert into carreras
values
(0,'Ingeniería en Sistemas Computacionales','ISCTEC','ISCTECNM','ISC',200,35,45),
(0,'Ingeniería Logística','ILTEC','ILTECNM','IL',200,15,45),
(0,'Ingeniería Electromecánica','IETEC','IETECNM','IE',200,35,65),
(0,'Ingeniería Gestión Empresarial','IGETEC','IGETECNM','IGE',200,35,45),
(0,'Ingeniería Industrial','IITEC','IITECNM','II',200,35,85),
(0,'Contador publico','LCTEC','LCTECNM','LC',200,25,55);
/**/

insert into especialidades 
values 
(0,'Desarrollo para la Web y Aplicaciones para Dispositivos Móviles','1','1',45,'1','WYM'),
(0,'Analisis de datos','2','2',45,'2','AD');
/**/

insert into tipos_materia 
values
(0,'Universal'),
(0,'Carrera'),
(0,'Especialidad');
/**/

insert into materias 
values
/* Materias de la carrera de sistemas ( Especialidad en Analisis de Datos (AD) ) */
-- Semestre 1
(0,'Cálculo Diferencial','CD',1,null,null),
(0,'Fundamentos de Programación','FP',2,1,null),
(0,'Taller de Ética','TE',1,null,null),
(0,'Matemáticas Discretas','MD',2,1,null),
(0,'Taller de Administración','TA',1,null,null),
(0,'Fundamentos de Investigación','FI',1,null,null),
-- Semestre 2
(0,'Cálculo Integral','CI',1,null,null),
(0,'Programación Orientada a Objetos','POO',2,1,null),
(0,'Contabilidad Financiera','CF',1,null,null),
(0,'Química','Q',1,null,null),
(0,'Algebra Lineal','AL',1,null,null),
(0,'Probabilidad y Estadística','PE',1,null,null),
-- Semestre 3
(0,'Cálculo Vectorial','CV',1,null,null),
(0,'Estructuras de Datos','ED',2,1,null),
(0,'Cultura Empresarial','CE',1,null,null),
(0,'Investigacion de Operaciones','IO Sis',2,1,null),
(0,'Desarrollo Sustentable','DS',1,null,null),
(0,'Física General','FG',1,null,null),
-- Semestre 4
(0,'Ecuaciones Diferenciales','ED',1,null,null),
(0,'Métodos Númericos','MN',1,null,null),
(0,'Tópicos Avanzados de Programación','TAP',2,1,null),
(0,'Fundamentos de Bases de Datos','FBD',2,1,null),
(0,'Simulación','SM',1,null,null),
(0,'Principios Electricos y Aplicaciones Digitales','PEAD',2,1,null),
(0,'Arquitectura de Computadoras','AC',2,1,null),
-- Semestre 5
(0,'Graficación','GR',2,1,null),
(0,'Lenguajes y Automatas 1','LA1',2,1,null),
(0,'Programación Lógica y Funcional','PLF',2,1,null),
(0,'Fundamentos de Telecomunicaciones','FT',2,1,null),
(0,'Sistemas Operativos','SO',2,1,null),
(0,'Taller de Bases de Datos','TBD',2,1,null),
(0,'Fundamentos de Ingeniería de Software','FIS',2,1,null),
-- Semestre 6
(0,'Tecnologias de Desarrollo para Dispositivos Moviles','TDDM',3,null,2), -- Especialidad (AD)
(0,'Lenguajes y Automatas 2','LA2	',2,1,null),
(0,'Redes de Computadoras','RC',2,1,null),
(0,'Taller de Sistemas Operativos','TSO',2,1,null),
(0,'Administración de Bases de Datos','ABD',2,1,null),
(0,'Ingeniería de Software','IS',2,1,null),
(0,'Lenguajes de Interfaz','LI',2,1,null),
-- Semestre 7
(0,'Computación en la Nube','CN',3,null,2), -- Especialidad (AD)
(0,'Inteligencia Artificial','IA',2,1,null),
(0,'Programación Web','PWEB',2,1,null),
(0,'Conmutación y Enrutamiento en Redes de Datos','CERD',2,1,null),
(0,'Taller de Investigación 1','TI1',1,null,null),
(0,'Gestión de Proyectos de Software','GPS',2,1,null),
(0,'Sistemas Programables','SP',2,1,null),
-- Semestre 8
(0,'Sistemas de Gestión de Contenidos de Software Libre','SGCSL',3,null,2), -- Especialidad (AD)
(0,'Herramientas Emergentes para Desarrollo en la Web','HEDW',3,null,2), -- Especialidad (AD)
(0,'Ingeniería de los Datos','ID',3,null,2), -- Especialidad (AD)
(0,'Administración de Redes','AR',2,1,null),
(0,'Taller de Investigación 2','TI2',1,null,null),
-- Semestre 9
(0,'Residencias Profesionales','RP',1,null,null),
(0,'Servicio Social','SS',1,null,null),
(0,'Actividades Complementarias','AC',1,null,null),

-- Materias para la especialidad de Desarrollo web y Aplicaciones para Dispositivos Moviles (DWADM)
(0,'Taller de programación de dispositivos móviles con Android','TPDMA',3,null,1),
(0,'Tópicos Avanzados de Programación con Dispositivos Móviles e Interfaces','TAPDMI',3,null,1),
(0,'Gestores  de  contenido  CMS  de  software libre','CMS',3,null,1),
(0,'Programación Web para Dispositivos Móviles','PWDM',3,null,1),
(0,'Herramientas Emergentes para la Web','HEW',3,null,1),

-- Otras materias
(0,'Investigacion de Operaciones Induatrial','IO Indus',2,5,null),
/**/

insert into reticulas 
values
(0,'Sistemas DWADM',1,null),
(0,'Sistemas AD',1,null);
/**/

insert into materias_reticula 
values
(1,3),
(1,4),
(4,5);
/**/

insert into combalidaciones 
values
(2,1,65.8);
/**/

select * 
from reticulas
where id_carrera =1;
select * from carreras; 
/**/

select * 
from materias_reticula 
where id_reticula =(select id_reticula 
		from reticulas
		where id_c);
/**/
	
select * 
from materias_reticula 
where (select id_reticula 
		from reticulas
		where nombre_reticula='Sistemas PWYDM');


/* PREGUNTAS IMPORTANTES */
-- 1. ¿Una materia de especialidad puede pertenecer a mas de una especialidad?
-- 2. 