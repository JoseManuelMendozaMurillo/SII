create table periodos_escolares(
    id_periodo INT UNSIGNED AUTO_INCREMENT,
    clave_periodo VARCHAR(255) not null,
    inicio_periodo DATETIME not null,
    fin_periodo DATETIME not null,
    inscripciones BOOLEAN default false,
    created_at DATETIME,
    updated_at DATETIME,
    deleted_at DATETIME,
    created_by VARCHAR(255),
    updated_by VARCHAR(255),
    deleted_by VARCHAR(255),
    PRIMARY KEY (id_periodo),
    constraint clave_periodo_unique unique(clave_periodo)
);