ALTER TABLE aspirantes
ADD no_solicitud VARCHAR(4) AFTER user_id,
ADD nip VARCHAR(4) AFTER no_solicitud,
ADD estatus_pago BOOLEAN DEFAULT FALSE AFTER nip;