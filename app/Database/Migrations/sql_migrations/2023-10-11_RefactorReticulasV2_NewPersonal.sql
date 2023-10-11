CREATE TABLE personal(
    id_personal int UNSIGNED AUTO_INCREMENT,
    user_id int UNSIGNED,
    imagen varchar(255),
    curp varchar(18),
    apellido_paterno varchar(255),
    apellido_materno varchar(255),
    nombre varchar(255),
    rfc varchar(13),
    fecha_nacimiento date,
    genero varchar(10),
    primary key(id_personal)
);