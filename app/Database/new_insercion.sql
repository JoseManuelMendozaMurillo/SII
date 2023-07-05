use control_escolar;

show TABLES;
/*Insertar valores en tabla carreras*/
insert into carreras
values
(0,'Ingenieria en Sistemas Computacionales','ISCTEC','ISCTECNM','ISC',200,35,45),
(0,'Ingenieria en Logistica','ILTEC','ILTECNM','IL',200,15,45),
(0,'Ingenieria en Electromecanica','IETEC','IETECNM','IE',200,35,65),
(0,'Ingenieria en Gestion Empresarial','IGETEC','IGETECNM','IGE',200,35,45),
(0,'Ingenieria Industrial','IITEC','IITECNM','II',200,35,85),
(0,'Licenciatura en Contabilidad','LCTEC','LCTECNM','LC',200,25,55);
/**/
insert into especialidades 
values 
(0,1,'Moviles y web','1','1',45,'1','WYM'),
(0,1,'Analisis de datos','2','2',45,'2','AD');
/**/
insert into tipos_materia 
values
(0,'Universal'),
(0,'carrera'),
(0,'Especialidad');
/**/
insert into materias 
values
(0,'Investigacion de Operaciones Induatrial','IO Indus',2,5,null),
(0,'Investigacion de Operaciones Sistemas','IO Sis',2,1,null),
(0,'Quimica','Qui',1,null,null),
(0,'Programacion web sistemas','PW sis',3,null,1),
(0,'Dispositivos moviles','DP Sistemas',3,null,2);
/**/
insert into reticulas 
values
(0,'Sistemas PWYDM2',1,null),
(0,'Sistemas ADD2',1,null);
/**/
insert into materias_reticula 
values
(1,3),
(1,4),
(4,5);
insert into materias_reticula 
values
(4,2);
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
		
select * 
from materias_reticula 
where (select id_reticula 
		from reticulas
		where nombre_reticula='Sistemas PWYDM');