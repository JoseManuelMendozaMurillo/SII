use control_escolar;

show TABLES;
/*Insertar valores en tabla constantes*/
insert into constantes 
values 
(20,80,5);
/*datos en nivel_escolar*/
insert into nivel_escolar
values
(0,'Licenciatura'),
(0,'Maestria');
/*valores tipo_asignatura*/
insert into tipo_asignatura
values
(0,'Basica'),
(0,'Generica'),
(0,'Especifica');
/*Valores en carreras*/
insert into carreras
values
(0,'Ingenieria en Sistemas Computacionales','ISIC-2010-224','ISCWYDM','ISC',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,'Ingenieria en Logistica','ILOG-2009-202','ISLMYP','IL',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,'Ingenieria Industrial','IIND-2010-227','IICYM','II',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,'Ingenieria en Electromecanica','IEME-2010-210','IEWYDM','IE',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,'Ingenieria en Gestion Empresarial','IGEM-2009-201','IGEWYDM','IGE',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,'Contador Publico','COPU-2010-205','LCWYDM','CP',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null);

#select * from carreras;
/*valores en especialidades*/
insert into especialidades
values
(0,1,'Programacion web y dispositivos moviles','PWYDM','PWYDM2015-2019',250,'PWYDM','PWM',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,1,'Analisis de datos y machine learning','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,2,'','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,2,'','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,3,'','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,3,'','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,4,'','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,4,'','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,5,'','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,5,'','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,6,'','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,6,'','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null);