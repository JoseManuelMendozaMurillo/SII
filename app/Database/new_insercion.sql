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
/*Valores en carreras*/
insert into carreras
values
(0,'Ingenieria en Sistemas Computacionales','ISC2015-2019','ISCWYDM','ISC',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,'Ingenieria en Logistica','IL2015-2019','ISLMYP','IL',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,'Ingenieria Industrial','II2014-2018','IICYM','II',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,'Ingenieria en Electromecanica','IE2016-2020','IEWYDM','IE',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,'Ingenieria en Gestion Empresarial','IGE2020-2024','IGEWYDM','IGE',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,'Licenciatura en Contaduria','LC2015-2019','LCWYDM','LC',250,1,SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 10 YEAR),'1','1','1','1',SYSDATE(),SYSDATE(),null,'mike','mike',null);

#select * from carreras;
/*valores en especialidades*/
insert into especialidades
values
(0,1,'Programacion web y dispositivos moviles','PWYDM','PWYDM2015-2019',250,'PWYDM','PWM',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,1,'Analisis de datos y machine learning','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,2,'','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,2,'','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,3,'Analisis de datos y machine learning','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,3,'Analisis de datos y machine learning','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,4,'Analisis de datos y machine learning','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,4,'Analisis de datos y machine learning','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,5,'Analisis de datos y machine learning','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,5,'Analisis de datos y machine learning','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,6,'Analisis de datos y machine learning','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null),
(0,6,'Analisis de datos y machine learning','ADYML','ADYML2023-2026',250,'PWYDM','ADML',SYSDATE(),DATE_ADD(SYSDATE(), INTERVAL 3 YEAR),1,SYSDATE(),SYSDATE(),null,'mike','mike',null);