alter table asignaturas_especialidad 
add column created_at DATETIME,
add column updated_at DATETIME,
add column deleted_at DATETIME,
add column created_by VARCHAR(255),
add column updated_by VARCHAR(255),
add column deleted_by VARCHAR(255);