ALTER TABLE informacion_bancaria
ADD column created_at DATETIME AFTER costo_verano,    
ADD column updated_at DATETIME AFTER created_at,
ADD column deleted_at DATETIME AFTER updated_at,
ADD column created_by VARCHAR(255) AFTER deleted_at,
ADD column updated_by VARCHAR(255) AFTER created_by,
ADD column deleted_by VARCHAR(255) AFTER updated_by;