#1
CREATE TABLE acceso (
    contrasena VARCHAR(255),
    nombre_usuario VARCHAR(255),
    status CHAR,
    tipo_usuario CHAR,
    usuario CHAR PRIMARY KEY
);
#2
CREATE TABLE acceso_log (
    fecha DATE,
    ip VARCHAR(255),
    usuario VARCHAR(255)
);
#2
CREATE TABLE actividades_apoyo (
    actividad CHAR PRIMARY KEY,
    descripcion_actividad VARCHAR(255)
);
#4
CREATE TABLE acumulado_historico (
    creditos_aprobados DECIMAL,
    creditos_autorizados DECIMAL,
    creditos_cursados DECIMAL,
    estatus_periodo_alumno CHAR,
    indice_reprobacion_acumulado DECIMAL,
    indice_reprobacion_semestre DECIMAL,
    materias_a_examen_especial INT,
    materias_cursadas INT,
    materias_especial_reprobadas INT,
    materias_reprobadas INT,
    no_de_control VARCHAR(255),
    periodo VARCHAR(255),
    promedio_aritmetico DECIMAL,
    promedio_aritmetico_acumulado DECIMAL,
    promedio_certificado DECIMAL,
    promedio_ponderado DECIMAL,
    promedio_ponderado_acumulado DECIMAL,
    PRIMARY KEY (no_de_control,periodo)
);
#5
CREATE TABLE adeudos (
    clave_area CHAR,
    costo FLOAT,
    descripcion CHAR,
    fecha CHAR,
    laboratorio CHAR,
    no_de_control VARCHAR(255),
    periodo VARCHAR(255),
    tipo CHAR
);
#6
CREATE TABLE alumnos (
    apellido_materno VARCHAR(255),
    apellido_paterno VARCHAR(255),
    becado_por VARCHAR(255),
    carrera VARCHAR(255),
    ciudad_procedencia VARCHAR(255),
    clave_interna CHAR,
    clave_servicio_medico CHAR,
    correo_electronico VARCHAR(255),
    creditos_aprobados DECIMAL,
    creditos_cursados DECIMAL,
    curp_alumno VARCHAR(255),
    domicilio_escuela VARCHAR(255),
    entidad_procedencia VARCHAR(255),
    escuela_procedencia VARCHAR(255),
    especialidad VARCHAR(255),
    estado_civil VARCHAR(255),
    estatus_alumno CHAR,
    estatus_alumno_anterior CHAR,
    estatus_alumno_fecha DATE,
    estatus_alumno_usuario VARCHAR(255),
    fecha_actualizacion DATETIME,
    fecha_nacimiento DATE,
    fecha_titulacion DATE,
    firma BLOB,
    folio INT,
    folio_probable INT,
    foto BLOB,
    hijo_trabajador CHAR,
    indice_reprobacion_acumulado DECIMAL,
    nacionalidad CHAR,
    nip INT,
    nivel_escolar CHAR,
    no_de_control VARCHAR(255) PRIMARY KEY,
    nombre_alumno VARCHAR(255),
    opcion_titulacion NVARCHAR(255),
    periodo_ingreso_it VARCHAR(255),
    periodo_titulacion VARCHAR(255),
    periodos_revalidacion INT,
    plan_de_estudios CHAR,
    promedio_aritmetico_acumulado DECIMAL,
    promedio_final_alcanzado DECIMAL,
    promedio_periodo_anterior DECIMAL,
    reticula VARCHAR(255),
    semestre INT,
    sexo CHAR,
    tipo_alumno CHAR,
    tipo_escuela INT,
    tipo_ingreso INT,
    tipo_servicio_medico CHAR,
    ultimo_periodo_inscrito VARCHAR(255),
    usuario CHAR
);
#7
CREATE TABLE alumnos_becados (
    beca CHAR,
    estatus_asignacion CHAR,
    nip VARCHAR(255),
    no_de_control VARCHAR(255),
    no_oficio CHAR,
    periodo VARCHAR(255),
    PRIMARY KEY (no_de_control,periodo,beca)
);
#8
CREATE TABLE alumnos_equivalencias (
    autoridad_educativa CHAR,
    fecha_elaboracion DATETIME,
    folio INT,
    no_de_control VARCHAR(255) PRIMARY KEY
);
#9
CREATE TABLE alumnos_generales (
    antiguedad VARCHAR(255),
    cargo_desempenado VARCHAR(255),
    ciudad VARCHAR(255),
    clave_preparatoria CHAR,
    codigo_postal INT,
    comunidad_indigena VARCHAR(255),
    domicilio_calle VARCHAR(255),
    domicilio_calle_empresa VARCHAR(255),
    domicilio_calle_madre VARCHAR(255),
    domicilio_calle_padre VARCHAR(255),
    domicilio_calle_tutor VARCHAR(255),
    domicilio_ciudad_empresa VARCHAR(255),
    domicilio_ciudad_madre VARCHAR(255),
    domicilio_ciudad_padre VARCHAR(255),
    domicilio_ciudad_tutor VARCHAR(255),
    domicilio_colonia VARCHAR(255),
    domicilio_colonia_empresa VARCHAR(255),
    domicilio_colonia_madre VARCHAR(255),
    domicilio_colonia_padre VARCHAR(255),
    domicilio_colonia_tutor VARCHAR(255),
    domicilio_entidad_fed_empresa VARCHAR(255),
    domicilio_entidad_fed_madre VARCHAR(255),
    domicilio_entidad_fed_padre VARCHAR(255),
    domicilio_entidad_federativa_titular INT,
    domicilio_telefono_empresa VARCHAR(255),
    domicilio_telefono_madre VARCHAR(255),
    domicilio_telefono_padre VARCHAR(255),
    domicilio_telefono_tutor VARCHAR(255),
    entidad_federativa VARCHAR(255),
    entidad_federativa_prepa VARCHAR(255),
    ingreso_mensual DECIMAL(18, 2),
    lengua_indigena VARCHAR(255),
    lugar_nacimiento VARCHAR(255),
    municipio VARCHAR(255),
    municipio_dom VARCHAR(255),
    municipio_nac VARCHAR(255),
    no_de_control VARCHAR(255),
    no_dependientes INT,
    nombre_empresa VARCHAR(255),
    nombre_esposa VARCHAR(255),
    nombre_jefe VARCHAR(255),
    nombre_madre VARCHAR(255),
    nombre_padre VARCHAR(255),
    nombre_tutor VARCHAR(255),
    ocupacion_esposa VARCHAR(255),
    ocupacion_madre VARCHAR(255),
    ocupacion_padre VARCHAR(255),
    telefono VARCHAR(255),
    turno INT,
    PRIMARY KEY (no_de_control)
);
#10
CREATE TABLE alumnos_materias_inscripcion (
    calificacion DECIMAL(18, 2),
    carrera VARCHAR(255),
    creditos_materia INT,
    fecha_calificacion DATETIME,
    materia VARCHAR(255),
    max_materias INT,
    no_de_control VARCHAR(255),
    nombre_abreviado_materia NCHAR,
    periodo VARCHAR(255),
    renglon INT,
    reticula VARCHAR(255),
    semestre_alumno INT,
    semestre_reticula INT,
    semestres INT,
    tipo_evaluacion CHAR,
    tipocur CHAR
);
#11
CREATE TABLE alumnos_mensajes (
    fecha_final DATETIME,
    fecha_inicial DATETIME,
    mensaje TEXT,
    no_de_control VARCHAR(255),
    tiempo_caduca INT
);
#12
CREATE TABLE alumnos_pagos (
    fecha_hora DATETIME,
    no_de_control VARCHAR(255),
    observacion VARCHAR(255),
    periodo VARCHAR(255)
);
#13
CREATE TABLE alumnos_prorrogas (
    no_de_control VARCHAR(255),
    observacion VARCHAR(255),
    pago CHAR,
    periodo VARCHAR(255),
    PRIMARY KEY (no_de_control,periodo)
);
#14
CREATE TABLE alumnos_socioeconomicos (
    calle_no VARCHAR(255),
    casa_vives CHAR,
    codigo_postal INT,
    colonia VARCHAR(255),
    comunicar_con VARCHAR(255),
    con_quien_vives INT,
    cuartos_casa INT,
    de_quien_dependes INT,
    entidad_federativa VARCHAR(255),
    ingresos_hermanos INT,
    ingresos_madre INT,
    ingresos_otros INT,
    ingresos_padre INT,
    ingresos_propios INT,
    lugar_trabajo VARCHAR(255),
    municipio VARCHAR(255),
    nivel_estudios_madre INT,
    nivel_estudios_padre INT,
    no_de_control VARCHAR(255),
    ocupacion_madre INT,
    ocupacion_padre INT,
    personas_casa INT,
    personas_dependen INT,
    telefono VARCHAR(255),
    telefono_trabajo VARCHAR(255),
    tipo_sangre VARCHAR(255),
    total_ingresos INT,
    PRIMARY KEY (no_de_control)
);
#15
CREATE TABLE apoyo_docencia (
    actividad CHAR,
    consecutivo INT,
    especifica_actividad VARCHAR(255),
    periodo VARCHAR(255),
    rfc CHAR,
    PRIMARY KEY (periodo, rfc, actividad,consecutivo)
);
#16
CREATE TABLE aseguradores (
    clave_aseguradora INT,
    fecha_final DATETIME,
    fecha_inicial DATETIME,
    no_seguro VARCHAR(255),
    nombre VARCHAR(255)
);
#17
CREATE TABLE aspectos (
    aspecto VARCHAR(255),
    consecutivo INT,
    descripcion VARCHAR(255),
    encuesta VARCHAR(255),
    PRIMARY KEY (aspecto, encuesta, consecutivo)
);
#18
CREATE TABLE aulas (
    aula CHAR,
    capacidad_aula INT,
    estatus CHAR,
    observaciones VARCHAR(255),
    permite_cruce CHAR,
    ubicacion CHAR,
    PRIMARY KEY (aula)
);
#19
CREATE TABLE aulas_aspirantes (
    aula CHAR,
    capacidad INT,
    carrera VARCHAR(255),
    disponibles INT,
    PRIMARY KEY (aula)
);
#20
CREATE TABLE autorizaciones_inscripcion (
    cantidad INT,
    fecha_hora_autorizada DATETIME,
    materia_afectada VARCHAR(255),
    motivo_autorizacion VARCHAR(255),
    no_de_control VARCHAR(255),
    periodo VARCHAR(255),
    quien_autoriza CHAR,
    tipo_autorizacion CHAR
);
#21
CREATE TABLE autorizaciones_inscripcion_h (
    cantidad INT,
    fecha_hora_autorizada DATETIME,
    materia_afectada VARCHAR(255),
    motivo_autorizacion VARCHAR(255),
    no_de_control VARCHAR(255),
    periodo VARCHAR(255),
    quien_autoriza CHAR,
    tipo_autorizacion CHAR
);
#22
CREATE TABLE avisos_reinscripcion (
    adeuda_biblioteca CHAR,
    adeuda_escolar CHAR,
    adeuda_financieros CHAR,
    adeudo_especial CHAR,
    autoriza_escolar CHAR,
    baja CHAR,
    creditos_autorizados INT,
    cuenta_pago VARCHAR(255),
    egresa CHAR,
    encuesto CHAR,
    estatus_reinscripcion CHAR,
    fecha_hora_pago DATETIME,
    fecha_hora_seleccion DATETIME,
    fecha_recibo DATETIME,
    indice_reprobacion FLOAT,
    lugar_pago VARCHAR(255),
    lugar_seleccion VARCHAR(255),
    motivo_aviso_baja VARCHAR(255),
    no_de_control VARCHAR(255),
    otro_mensaje VARCHAR(255),
    periodo VARCHAR(255),
    proareas CHAR,
    promedio INT,
    promedio_acumulado DECIMAL,
    recibo_pago CHAR,
    regular CHAR,
    semestre INT,
    vobo_adelanta_sel CHAR,
    PRIMARY KEY (no_de_control, periodo)
);
#23
CREATE TABLE becas (
    beca CHAR,
    descripcion_beca VARCHAR(255),
    total_asignados INT,
    total_becas INT,
    PRIMARY KEY (beca)
);
# 24 
CREATE TABLE biblioteca_autoincrement_libros (
    indice INT AUTO_INCREMENT PRIMARY KEY
);
# 25 
CREATE TABLE biblioteca_categorias (
    categoria VARCHAR(255),
    descripcion VARCHAR(255),
    PRIMARY KEY (categoria)
);
# 26 
CREATE TABLE biblioteca_codigos_libros (
    clave_libro VARCHAR(255),
    consecutivo INT,
    estatus CHAR,
    exclusivo CHAR,
    fecha_registro DATETIME,
    id_libro INT,
    PRIMARY KEY (id_libro,clave_libro)
);
# 27 
CREATE TABLE biblioteca_ediciones (
    anio INT,
    edicion INT,
    id_libro INT,
    isbn VARCHAR(255),
    num_paginas INT,
    PRIMARY KEY (id_libro)
);
# 28 
CREATE TABLE biblioteca_editorial (
    ciudad VARCHAR(255),
    clave_editorial VARCHAR(255),
    cp INT,
    direccion VARCHAR(255),
    estado VARCHAR(255),
    nombre VARCHAR(255),
    pais VARCHAR(255),
    PRIMARY KEY (clave_editorial)
);
# 29 
CREATE TABLE biblioteca_errores (
    codigo INT,
    descripcion VARCHAR(255),
    PRIMARY KEY (codigo)
);
# 30 
CREATE TABLE biblioteca_libro_categoria (
    categoria VARCHAR(255),
    id_libro INT
);
# 31 
CREATE TABLE biblioteca_libros (
    clave_editorial VARCHAR(255),
    descripcion TEXT,
    id_libro INT,
    nombre VARCHAR(255),
    PRIMARY KEY (id_libro)
);
# 32 
CREATE TABLE biblioteca_libros_autores (
    id_libro INT,
    nombre_autor VARCHAR(255)
);
# 33 
CREATE TABLE biblioteca_prestamos (
    clave_libro VARCHAR(255),
    estatus CHAR,
    fecha_devolucion DATETIME,
    fecha_prestamo DATETIME,
    no_de_control VARCHAR(255),
    periodo VARCHAR(255),
    PRIMARY KEY (clave_libro, fecha_prestamo,no_de_control)
);
# 34 
CREATE TABLE biblioteca_tipo_estatus_libro (
    descripcion VARCHAR(255),
    estatus CHAR,
    PRIMARY KEY (estatus)
);
# 35 
CREATE TABLE calendario_rh (
    descripcion VARCHAR(255),
    fecha_calendario DATE,
    periodo VARCHAR(255)
);
# 36 
CREATE TABLE calificacion_evaluacion (
    calificacion VARCHAR(255),
    consecutivo INT,
    encuesta VARCHAR(255),
    porcentaje_fin DECIMAL,
    porcentaje_ini DECIMAL,
    PRIMARY KEY (encuesta,calificacion,consecutivo)
);
# 37 
CREATE TABLE capitulos (
    capitulo CHAR,
    descripcion_capitulo TEXT,
    estado_capitulo CHAR,
    nombre_capitulo VARCHAR(255),
    PRIMARY KEY (capitulo)
);
# 38 
CREATE TABLE carrera_ingredbon_egredbon (
    carrera VARCHAR(255),
    egredbon INT,
    ingredbon INT,
    periodo VARCHAR(255)
);
# 39 
CREATE TABLE carrera_ingresan_egresan (
    carrera VARCHAR(255),
    ingresan INT,
    egresan INT,
    periodo VARCHAR(255),
    PRIMARY KEY (periodo,carrera)
);
# 40 
CREATE TABLE carreras (
    carga_maxima INT,
    carga_minima INT,
    carrera VARCHAR(255),
    clave VARCHAR(255),
    clave_cosnet CHAR,
    clave_oficial CHAR,
    consecutivo_carrera VARCHAR(255),
    creditos_totales INT,
    fecha_inicio DATE,
    fecha_termino DATE,
    id_area_carr VARCHAR(255),
    id_nivel_carr VARCHAR(255),
    id_sub_area_carr VARCHAR(255),
    modalidad CHAR,
    nivel VARCHAR(255),
    nivel_escolar CHAR,
    nombre_carrera VARCHAR(255),
    nombre_reducido VARCHAR(255),
    reticula VARCHAR(255),
    siglas VARCHAR(255),
    PRIMARY KEY (carrera,reticula)
);
# 41 
CREATE TABLE carreras_encuestas (
    carrera VARCHAR(255),
    encuesta CHAR,
    reticula VARCHAR(255),
    PRIMARY KEY (carrera, encuesta, reticula)
);
# 42 
CREATE TABLE categorias (
    categoria CHAR,
    descripcion_categoria VARCHAR(255),
    horas_categoria INT,
    horas_grupo INT,
    nivel INT,
    PRIMARY KEY (categoria,horas_categoria)
);
# 43 
CREATE TABLE caudbo_superavit (
    caudbo CHAR,
    horas_grupo INT,
    horas_plaza INT,
    horas_super INT,
    id_caudbo INT,
    periodo VARCHAR(255),
    rfc CHAR
);
# 44 
CREATE TABLE causa_superavit (
    causa CHAR,
    horas_grupo INT,
    horas_plaza INT,
    horas_super INT,
    id_causa INT,
    periodo VARCHAR(255),
    rfc CHAR,
    PRIMARY KEY (rfc,periodo)
);
# 45 
CREATE TABLE centros_trabajo (
    centro_trabajo CHAR,
    ciudad_ct VARCHAR(255),
    clave_centro_seit CHAR,
    codigo_postal_ct INT,
    colonia_ct VARCHAR(255),
    domicilio_ct VARCHAR(255),
    entidad_federativa VARCHAR(255),
    fecha_fundacion DATETIME,
    nombre_ct VARCHAR(255),
    telefono_ct VARCHAR(255),
    zona_economica CHAR,
    PRIMARY KEY (clave_centro_seit)
);
# 46 
CREATE TABLE comision_comisiones (
  clave_area CHAR,
  destino VARCHAR(255),
  fecha_emision DATETIME,
  fecha_presentacion DATETIME,
  fecha_salida DATETIME,
  fecha_termino DATETIME,
  hora_presentacion VARCHAR(255),
  hora_termino VARCHAR(255),
  motivo TEXT,
  oficio_no CHAR,
  pepc CHAR,
  presentar_en VARCHAR(255),
  proceso VARCHAR(255),
  rfc CHAR,
  rfc_jefe CHAR,
  transporte_regreso CHAR,
  transporte_salida CHAR
);
# 47 
CREATE TABLE comision_transportes (
  clave_transporte CHAR,
  descripcion VARCHAR(255)
);
# 48 
CREATE TABLE comite_opciones (
  descripcion VARCHAR(255),
  id_opcion INT
);
# 49 
CREATE TABLE comite_solicitudes (
  autorizacion CHAR,
  estatus CHAR,
  fecha DATETIME,
  fecha_autorizacion DATETIME,
  fecha_reunion DATETIME,
  folio VARCHAR(255),
  id_opcion INT,
  libro VARCHAR(255),
  motivo TEXT,
  motivo_academico TEXT,
  motivo_otros TEXT,
  motivo_personal TEXT,
  no_de_control VARCHAR(255),
  periodo VARCHAR(255),
  respuesta TEXT
);
# 50 
CREATE TABLE concentrado_autoevaluacion (
  academicos_consolidacion CHAR,
  academicos_consolidados CHAR,
  academicos_formacion CHAR,
  anio INT,
  conclusion1 TEXT,
  conclusion2 TEXT,
  conclusion3 TEXT,
  conclusion4 TEXT,
  conclusion5 TEXT,
  cursos_capacitacion_profesional CHAR,
  departamento CHAR,
  eficiencia_egreso CHAR,
  eficiencia_terminal CHAR,
  estudianntes_proyectos_inv CHAR,
  estudiantes_residencias_extranjero CHAR,
  estudiantes_servicio_comunitario CHAR,
  estudiantes_tutoria CHAR,
  habilidades_docentes CHAR,
  profesores_organismos_empresarial CHAR,
  ptc_adscritos_sni CHAR,
  ptc_perfil_deseable CHAR,
  ptc_posgrado CHAR,
  resultados1 TEXT,
  resultados2 TEXT,
    PRIMARY KEY (departamento,anio)
);
# 51 
CREATE TABLE concentrado_autoevaluacion_avances (
  anio INT,
  departamento CHAR,
  nivel CHAR,
  p10 INT,
  p100 INT,
  p20 INT,
  p30 INT,
  p40 INT,
  p50 INT,
  p60 INT,
  p70 INT,
  p80 INT,
  p90 INT,
  tipo CHAR,
  PRIMARY KEY (departamento, tipo)
);
# 52 
CREATE TABLE concentrado_autoevaluacion_fortalecimiento (
  anio INT,
  departamento CHAR,
  indice_desercion CHAR,
  indice_desercion_1er_sem CHAR,
  indice_reprobacion_1er_sem CHAR,
  indice_reprobacion_general DECIMAL,
  no_materias_reprobacion_mayor CHAR,
  solo_posgrado CHAR,
  PRIMARY KEY (departamento, anio)
);
# 53 
CREATE TABLE credencial_folios (
  dia_atencion VARCHAR(255),
  folio INT,
  hora_atencion VARCHAR(255),
  no_de_control VARCHAR(255),
  recibo VARCHAR(255),
  PRIMARY KEY (folio)
);
# 54 
CREATE TABLE crt_calificaciones_parciales (
  calificacion INT,
  fecha_captura DATE,
  grupo CHAR,
  materia VARCHAR(255),
  no_de_control VARCHAR(255),
  no_de_unidad CHAR,
  periodo VARCHAR(255),
  rfc CHAR,
  tipo_evaluacion CHAR
);
# 55 
CREATE TABLE crt_criterios_acreditacion (
  criterios_acreditacion TEXT,
  grupo CHAR,
  id_criterios_acreditacion CHAR,
  materia VARCHAR(255),
  no_de_unidad CHAR,
  observaciones TEXT,
  periodo VARCHAR(255),
  rfc CHAR
);
# 56 
CREATE TABLE crt_datos_instrumentacion_nuevo (
  apoyos_didacticos VARCHAR(255),
  apoyos_didacticos1 TEXT,
  calendarizacion_evaluacion_hp INT,
  calendarizacion_evaluacion_hr INT,
  competencia_especifica_unidad VARCHAR(255),
  competencia_especifica_unidad1 TEXT,
  criterios_evaluacion_unidad VARCHAR(255),
  criterios_evaluacion_unidad1 TEXT,
  fuentes_informacion VARCHAR(255),
  fuentes_informacion1 TEXT,
  grupo CHAR,
  ia CHAR,
  materia VARCHAR(255),
  no_de_unidad CHAR,
  periodo VARCHAR(255),
  rfc CHAR
);
# 57 
CREATE TABLE crt_equipo_requerido (
  equipo_requerido VARCHAR(255),
  equipo_requerido1 TEXT,
  grupo CHAR,
  id_equipo_requerido CHAR,
  materia VARCHAR(255),
  no_de_unidad CHAR,
  periodo VARCHAR(255),
  rfc CHAR
);
# 58 
CREATE TABLE crt_fechas_seguimiento (
  fecha_entrega_programacion DATE,
  final_primer_seguimiento DATE,
  final_reporte_final DATE,
  final_segundo_seguimiento DATE,
  final_tercer_seguimiento DATE,
  inicial_primer_seguimiento DATE,
  inicial_reporte_final DATE,
  inicial_segundo_seguimiento DATE,
  inicial_tercer_seguimiento DATE,
  periodo VARCHAR(255)
);
# 59 
CREATE TABLE crt_fechas_subtemas (
  fec_inicial_programada_periodo DATE,
  fecha_final_programada_periodo DATE,
  fecha_final_real DATE,
  fecha_final_real_programada_periodo DATE,
  fecha_inicial_real_programada_periodo DATE,
  fecha_inicio_real DATE,
  grupo CHAR,
  materia VARCHAR(255),
  no_de_subtema CHAR,
  no_de_unidad CHAR,
  periodo VARCHAR(255),
  rfc CHAR
);
# 60 
CREATE TABLE crt_fechas_unidades_tematicas (
  f_real_ev DATE,
  fec_inicial_programada_periodo DATE,
  fecha_final_programada_periodo DATE,
  fecha_programada_evaluacion DATE,
  fecha_real_evaluacion DATE,
  fecha_registro DATE,
  grupo CHAR,
  materia VARCHAR(255),
  no_de_unidad CHAR,
  observaciones CHAR,
  observaciones1 TEXT,
  periodo VARCHAR(255),
  rfc CHAR,
  tiempo INT
);
# 61 
CREATE TABLE crt_fuentes_informacion (
  fuentes_informacion VARCHAR(255),
  fuentes_de_informacion1 TEXT,
  grupo CHAR,
  id_fuentes_informacion CHAR,
  materia VARCHAR(255),
  periodo VARCHAR(255),
  rfc CHAR
);
# 62 
CREATE TABLE crt_indices_reprobacion (
  grupo CHAR,
  indice_reprobacion INT,
  materia VARCHAR(255),
  periodo VARCHAR(255),
  rfc CHAR
);
# 63 
CREATE TABLE crt_instrumentacion_didactica (
  actividades_facilitador VARCHAR(255),
  actividades_facilitador1 TEXT,
  actividades_participante VARCHAR(255),
  actividades_participante1 TEXT,
  grupo CHAR,
  id_inst_didactica CHAR,
  materia VARCHAR(255),
  no_de_unidad CHAR,
  periodo VARCHAR(255),
  productos_aprendizaje VARCHAR(255),
  productos_aprendizaje1 TEXT,
  rfc CHAR,
  tiempo INT
);
# 64 
CREATE TABLE crt_instrumentacion_didactica_nuevo (
  actividades_aprendizaje VARCHAR(255),
  actividades_aprendizaje1 TEXT,
  actividades_ensenanza VARCHAR(255),
  actividades_ensenanza1 TEXT,
  desarrollo_competencias VARCHAR(255),
  desarrollo_competencias1 TEXT,
  grupo CHAR,
  horas INT,
  materia VARCHAR(255),
  no_de_unidad CHAR,
  periodo VARCHAR(255),
  rfc CHAR
);
# 65 
CREATE TABLE crt_llenado_opciones (
  descripcion_corta_evaluacion VARCHAR(255),
  grupo CHAR,
  materia VARCHAR(255),
  no_de_control VARCHAR(255),
  periodo VARCHAR(255),
  tipo_evaluacion VARCHAR(255)
);
# 66 
CREATE TABLE crt_material_apoyo (
  grupo CHAR,
  id_material_apoyo CHAR,
  materia VARCHAR(255),
  materiales_apoyo VARCHAR(255),
  materiales_apoyo1 TEXT,
  no_de_unidad CHAR,
  periodo VARCHAR(255),
  rfc CHAR
);
# 67 
CREATE TABLE crt_programa_oficial (
  caracterizacion VARCHAR(255),
  competencia VARCHAR(255),
  materia VARCHAR(255),
  no_de_actividades CHAR,
  objetivo_materia VARCHAR(255),
  PRIMARY KEY (materia)
);
# 68 
CREATE TABLE crt_subtemas (
  materia VARCHAR(255),
  no_de_subtema CHAR,
  no_de_unidad CHAR,
  nombre_subtema VARCHAR(255),
  PRIMARY KEY (materia, no_de_subtema, no_de_unidad)
);
# 69 
CREATE TABLE crt_unidades_tematicas (
  materia VARCHAR(255),
  no_de_unidad CHAR,
  nombre_unidad VARCHAR(255),
  objetivo_aprendizaje VARCHAR(255),
  PRIMARY KEY (no_de_unidad, materia)
);
# 70 
CREATE TABLE cursos (
  area_especialidad CHAR,
  curso_taller CHAR,
  documento CHAR,
  domicilio_curso VARCHAR(255),
  duracion_hrs INT,
  estatus_curso CHAR,
  fecha_curso DATETIME,
  institucion_curso VARCHAR(255),
  nombre_curso VARCHAR(255),
  participacion CHAR,
  recibido_impartido CHAR,
  rfc CHAR,
  PRIMARY KEY (rfc, recibido_impartido,fecha_curso)
);
# 71 
CREATE TABLE departamentos_evaluan (
  clave_area CHAR,
  encuesta CHAR,
  PRIMARY KEY (clave_area, encuesta)
);
# 72 
CREATE TABLE distribucion_pago (
  cantidad INT,
  fecha DATETIME,
  PRIMARY KEY (fecha)
);
# 73 
CREATE TABLE distribucion_seleccion (
  cantidad INT,
  carrera VARCHAR(255),
  fecha DATETIME,
  reticula VARCHAR(255),
  PRIMARY KEY (fecha,carrera)
);
# 74 
CREATE TABLE documentos_alumnos (
  id_tipo_docto INT,
  imagen_documento LONGBLOB,
  no_de_control VARCHAR(255),
  nombre_documento VARCHAR(255),
  PRIMARY KEY (id_tipo_docto,no_de_control)
);
# 75 
CREATE TABLE documentos_empleado (
  documento LONGBLOB,
  id_tipo_docto INT,
  nombre_docto VARCHAR(255),
  rfc CHAR(255),
  PRIMARY KEY (rfc, id_tipo_docto,nombre_docto)
);
# 76 
CREATE TABLE encuesta_sga (
  no_de_control VARCHAR(255),
  respuesta CHAR
);
# 77 
CREATE TABLE entidades_federativas (
  clave_entidad CHAR,
  entidad_federativa VARCHAR(255),
  nombre_entidad VARCHAR(255),
  PRIMARY KEY (entidad_federativa)
);
# 78 
CREATE TABLE equipamiento (
  descripcion_equipo VARCHAR(255),
  tipo_equipo CHAR,
  PRIMARY KEY (tipo_equipo)
);
# 79 
CREATE TABLE equipamiento_aula (
  aula CHAR,
  cantidad INT,
  notas VARCHAR(255),
  tipo_equipo CHAR,
  PRIMARY KEY (aula,tipo_equipo)
);
# 80 
CREATE TABLE escuelas (
  clave_coepes CHAR,
  clave_escuela INT PRIMARY KEY,
  nombre_escuela VARCHAR(255),
  tipo_escuela INT
);
# 81 
CREATE TABLE especialidades (
  carrera VARCHAR(255),
  creditos_especialidad VARCHAR(255),
  creditos_optativos VARCHAR(255),
  especialidad VARCHAR(255),
  nombre_especialidad VARCHAR(255),
  periodo_inicio VARCHAR(255),
  periodo_termino VARCHAR(255),
  reticula VARCHAR(255),
  PRIMARY KEY (especialidad)
);
# 82 
CREATE TABLE estatus_alumno (
  descripcion VARCHAR(255),
  estatus CHAR PRIMARY KEY
);
# 83 
CREATE TABLE evaluacion_alumnos (
  clave_area CHAR,
  consecutivo INT,
  encuesta CHAR,
  fecha_hora_evaluacion DATETIME,
  grupo CHAR,
  materia VARCHAR(255),
  no_de_control CHAR,
  periodo VARCHAR(255),
  resp_abierta VARCHAR(255),
  respuestas VARCHAR(255),
  rfc CHAR,
  usuario VARCHAR(255),
  PRIMARY KEY (consecutivo,materia,no_de_control,periodo)
);
# 84 
CREATE TABLE evaluacion_depto (
  clave_area CHAR,
  consecutivo INT,
  encuesta CHAR,
  grupo CHAR,
  materia VARCHAR(255),
  periodo VARCHAR(255),
  resp_abierta VARCHAR(255),
  respuestas VARCHAR(255),
  rfc CHAR,
  usuario VARCHAR(255),
  PRIMARY KEY (consecutivo,encuesta,grupo,materia,periodo)
);
# 85 
CREATE TABLE evaluacion_depto_aplicada (
  C CHAR,
  clave_area VARCHAR(255),
  D CHAR,
  E CHAR,
  periodo VARCHAR(255),
  rfc CHAR,
  PRIMARY KEY (periodo,rfc)
);
# 86 
CREATE TABLE experiencia_laboral (
  actividades_desarrolladas VARCHAR(255),
  cargo_desempenadp VARCHAR(255),
  direccion VARCHAR(255),
  empresa VARCHAR(255),
  fecha_inicio DATETIME,
  fecha_termino DATETIME,
  rfc CHAR,
  tipo_experiencia CHAR,
  PRIMARY KEY (empresa,fecha_inicio,rfc,tipo_experiencia)
);
# 87 
CREATE TABLE extra_actividades (
  actividad VARCHAR(255),
  descripcion_actividad VARCHAR(255),
  tipo_actividad VARCHAR(255)
);
# 88 
CREATE TABLE extra_grupo_actividades (
  actividad VARCHAR(255),
  alumnos_inscritos INT,
  capacidad_grupo INT,
  grupo VARCHAR(255),
  periodo VARCHAR(255),
  rfc CHAR
);
# 89 
CREATE TABLE extra_historia_actividades (
  actividad VARCHAR(255),
  grupo VARCHAR(255),
  no_de_control VARCHAR(255),
  periodo VARCHAR(255),
  resultado VARCHAR(255),
  semestre_cur INT,
  semestre_ext INT
);
# 90 
CREATE TABLE extra_horarios_actividades (
  actividad VARCHAR(255),
  dia_semana VARCHAR(255),
  dias VARCHAR(255),
  grupo VARCHAR(255),
  hora_final DATETIME,
  hora_inicial DATETIME,
  lugar VARCHAR(255),
  periodo VARCHAR(255),
  rfc CHAR,
  tipo_horario VARCHAR(255)
);
# 91 
CREATE TABLE extra_inscritos_actividades (
  actividad VARCHAR(255),
  grupo VARCHAR(255),
  no_de_control VARCHAR(255),
  periodo VARCHAR(255),
  seleccionado VARCHAR(255),
  semestre_cur INT
);
# 92 
CREATE TABLE extra_lugares_actividades (
  capacidad_lugar INT,
  descripcion VARCHAR(255),
  lugar VARCHAR(255)
);
# 93 
CREATE TABLE extra_monitor_actividades (
  apellidos VARCHAR(255),
  nombre VARCHAR(255),
  rfc CHAR
);
# 94 
CREATE TABLE extra_tipo_actividades (
  descripcion_actividad VARCHAR(255),
  tipo_actividad VARCHAR(255)
);
# 95 
CREATE TABLE extra_tipos_usuarios (
  departamento VARCHAR(255),
  rfc CHAR,
  usuario CHAR
);
# 96 
CREATE TABLE extracurricular_aulas (
  aula CHAR,
  descripcion VARCHAR(255),
  estatus CHAR,
  nombre_aula VARCHAR(255),
  PRIMARY KEY (aula)
);
# 97 
CREATE TABLE extracurricular_grupos (
  alumnos_inscritos INT,
  capacidad_grupo INT,
  grupo CHAR,
  materia VARCHAR(255),
  modulo INT,
  periodo VARCHAR(255),
  PRIMARY KEY (grupo, materia, periodo)
);
# 98 
CREATE TABLE extracurricular_horarios (
  aula CHAR,
  dia_semana INT,
  grupo CHAR,
  hora_final DATETIME,
  hora_inicial DATETIME,
  materia VARCHAR(255),
  periodo VARCHAR(255)
);
# 99 
CREATE TABLE extracurricular_materias (
  materia VARCHAR(255),
  nombre_abreviado_materia VARCHAR(255),
  nombre_completo_materia VARCHAR(255),
  PRIMARY KEY (materia)
);
# 100 
CREATE TABLE extraescolares (
  descripcion_extraescolar VARCHAR(255),
  extraescolar INT,
  PRIMARY KEY (extraescolar)
);
# 101 
CREATE TABLE fecha_evaluacion (
  encuesta CHAR,
  fecha_fin DATETIME,
  fecha_inicio DATETIME,
  fecha_programada DATETIME,
  periodo VARCHAR(255),
  PRIMARY KEY (encuesta,periodo)
);
# 102
CREATE TABLE fechas_carrera_sele (
  carrera VARCHAR(255),
  cuantos_sel INT,
  fecha_sel DATETIME
);
# 103
CREATE TABLE fechas_carreras (
  carrera VARCHAR(255),
  fecha_fin DATE,
  fecha_inicio DATE,
  fecha_inscripcion DATE,
  intervalo TEXT,
  periodo VARCHAR(255),
  personas INT,
  puntero INT
);
# 104
CREATE TABLE fichas_admision (
  anio_termino_bachillerato INT,
  apellidos_aspirante TEXT,
  area_formacion TEXT,
  calle TEXT,
  carrera VARCHAR(255),
  cuidad TEXT,
  clave_escuela INT,
  codigo_postal INT,
  colonia TEXT,
  compara_itq TEXT,
  comunidad_indigena TEXT,
  contribucion_prof_itq TEXT,
  convencido_carrera_sol TEXT,
  correo_electronico TEXT,
  cual_estudios TEXT,
  cual_otra_carrera TEXT,
  cuales_mate_repro TEXT,
  curp TEXT,
  entidad_federativa VARCHAR(255),
  entidad_federativa_proc VARCHAR(255),
  escuela_procedencia INT,
  especifica_formacion TEXT,
  estado_civil TEXT,
  estatus_admision TEXT,
  estudios_carrera TEXT,
  estudios_otra_institucion TEXT,
  fecha_hora_atencion DATETIME,
  fecha_nacimiento DATE,
  ficha INT,
  folio_solicitud INT,
  habitos_suficientes TEXT,
  intentos_ingreso INT,
  interes_otra_carrera TEXT,
  lengua_indigena TEXT,
  materias_complejas TEXT,
  materias_deficiencia TEXT,
  motivos_estudios_itq TEXT,
  municipio TEXT,
  nacionalidad TEXT,
  necesario_habitos_estudio TEXT,
  nombre_aspirante TEXT,
  ofertar_otras_carreras TEXT,
  orientacion_profesional TEXT,
  otros_periodos TEXT,
  periodo VARCHAR(255),
  periodos_realizacion_bach INT,
  prestigio_eleccion TEXT,
  promedio_bachillerato DECIMAL,
  reticula VARCHAR(255),
  sexo TEXT,
  telefono TEXT,
  tiene_mate_repro_prepa TEXT,
  tipo_escuela INT,
  PRIMARY KEY (folio_solicitud,periodo)
);
# 105
CREATE TABLE fichas_configuracion (
  banco TEXT,
  costo_examen INT,
  cuenta TEXT,
  direccion_url_ceneval VARCHAR(255),
  fecha_examen_ceneval DATE,
  fecha_inicio_solicitudes DATE,
  fecha_termino_solicitudes DATE,
  folios_por_dia_atencion INT,
  hora_examen_ceneval VARCHAR(255),
  hora_fin_dia_atencion VARCHAR(255),
  hora_inicio_dia_atencion VARCHAR(255),
  periodo VARCHAR(255),
  PRIMARY KEY (periodo)
);
# 106
CREATE TABLE fichas_configuracion_fechas (
  fecha_atencion DATE,
  orden INT,
  periodo VARCHAR(255)
);
# 107
CREATE TABLE fichas_examen (
  descripcion_examen TEXT,
  id_examen CHAR,
  nombre_documento TEXT,
  soluciones TEXT,
  tiempo_total_examen INT,
  total_preguntas INT,
  PRIMARY KEY (id_examen)
);
# 108
CREATE TABLE fichas_examen_carrera (
  carrera VARCHAR(255),
  fecha_fin DATETIME,
  fecha_inicio DATETIME,
  id_examen CHAR,
  PRIMARY KEY (carrera, id_examen)
);
# 109
CREATE TABLE fichas_examen_preg_canceladas (
  id_examen CHAR,
  no_pregunta NUMERIC,
  PRIMARY KEY (id_examen,no_pregunta)
);
# 110
CREATE TABLE fichas_examen_respuestas (
  aciertos INTEGER,
  estatus CHAR,
  ficha INTEGER,
  id_examen CHAR,
  periodo VARCHAR(255),
  respuestas VARCHAR(255),
  seccion_actual INTEGER,
  tiempo_examen INTEGER,
  PRIMARY KEY (ficha,id_examen,periodo)
);
# 111
CREATE TABLE fichas_examen_seccion (
  docto_seccion VARCHAR(255),
  id_examen CHAR,
  id_seccion INTEGER,
  pregunta_final INTEGER,
  pregunta_inicial INTEGER,
  tiempo_seccion INTEGER,
  PRIMARY KEY (id_examen,id_seccion)
);
# 112
CREATE TABLE fichas_horas_examen (
  cantidad_periodo INTEGER,
  carrera VARCHAR(255),
  hora_comida DATETIME,
  hora_examen DATETIME,
  hora_fin_periodo DATETIME,
  hora_inicio_periodo DATETIME,
  horas_comida INTEGER,
  minutos_periodo INTEGER,
  periodo VARCHAR(255),
  restan INTEGER,
  PRIMARY KEY (carrera,periodo)
);
# 113 
CREATE TABLE fichas_lugar (
  fecha_exa_cono VARCHAR(255),
  fecha_exa_hab VARCHAR(255),
  fecha_hora_otro VARCHAR(255),
  fichaf INTEGER,
  fichai INTEGER,
  hora_examen VARCHAR(255),
  lugar_examen VARCHAR(255),
  nombre_otro VARCHAR(255),
  PRIMARY KEY (fichai,fichaf)
);
# 114 
CREATE TABLE fichas_sol_aspirantes (
  aceptado CHAR,
  aula CHAR,
  clave_ceneval VARCHAR(255),
  fecha_modificacion DATE,
  fecha_pago DATE,
  fecha_registro DATE,
  inserta_tipo INT,
  nivelacion CHAR,
  no_ficha INT,
  no_recibo INT,
  no_solicitud INT,
  pago CHAR,
  periodo VARCHAR(255),
  usuario VARCHAR(255),
  PRIMARY KEY (no_ficha,periodo)
);
# 115 
CREATE TABLE folio_solicitudes (
  cantidad_periodo INT,
  fecha_hora_atencion DATETIME,
  folio_solicitud INT,
  hora_fin_periodo DATETIME,
  hora_inicio_periodo INT,
  minutos_periodo INT,
  restan INT,
  PRIMARY KEY (folio_solicitud)
);
# 116 
CREATE TABLE folios_atencion_carreras (
  cantidad_periodo INT,
  carrera VARCHAR(255),
  fecha_hora_atencion DATETIME,
  folio INT,
  hora_comida DATETIME,
  hora_fin_periodo DATETIME,
  hora_inicio_periodo DATETIME,
  horas_comida INT,
  minutos_periodo INT,
  periodo VARCHAR(255),
  restan INT,
  reticula VARCHAR(255),
  PRIMARY KEY (carrera,periodo)
);
# 117 
CREATE TABLE folios_especiales (
  folio_especial VARCHAR(255),
  materia VARCHAR(255),
  periodo VARCHAR(255),
  PRIMARY KEY (materia,periodo)
);
# 118 
CREATE TABLE folios_fichas (
  carrera VARCHAR(255),
  ficha_inicial INT,
  numero_fichas INT,
  periodo VARCHAR(255),
  reticula VARCHAR(255),
  siguiente_ficha INT,
  PRIMARY KEY (carrera,periodo,reticula)
);
# 119 
CREATE TABLE funciones_sistema (
  descripcion_funcion VARCHAR(255),
  funcion INT,
  seccion VARCHAR(255),
  PRIMARY KEY (funcion)
);
# 120 
CREATE TABLE funciones_tipo_usuario (
  funcion INT,
  tipo_usuario CHAR,
  PRIMARY KEY (funcion,tipo_usuario)
);
# 121 
CREATE TABLE generar_listas_temporales (
  apellido_materno VARCHAR(255),
  apellido_paterno VARCHAR(255),
  fecha_hora_seleccion DATETIME,
  no_de_control VARCHAR(255),
  nombre_alumno VARCHAR(255),
  promedio_ponderado DECIMAL,
  semestre INT
);
# 122 
CREATE TABLE grupos (
  alumnos_inscritos INT,
  capacidad_grupo INT,
  estatus_grupo CHAR,
  exclusivo_carrera VARCHAR(255),
  exclusivo_reticula INT,
  folio_acta INT,
  grupo CHAR,
  materia VARCHAR(255),
  paralelo_de VARCHAR(255),
  periodo VARCHAR(255),
  rfc CHAR,
  seleccionado_en_bloque CHAR,
  tipo_personal CHAR,
  PRIMARY KEY (periodo,materia,grupo)
);
# 123 
CREATE TABLE gtv_residencias (
  aceptado CHAR,
  acreditado CHAR,
  asesor_externo VARCHAR(255),
  asesor_interno VARCHAR(255),
  autoriza_asesor CHAR,
  ciudad_dependencia VARCHAR(255),
  colonia_dependencia VARCHAR(255),
  coordinador VARCHAR(255),
  correo VARCHAR(255),
  cp_dependencia VARCHAR(255),
  domicilio_dependencia VARCHAR(255),
  fax_dependencia VARCHAR(255),
  giro INT,
  impreso CHAR,
  intermediraio VARCHAR(255),
  mision TEXT,
  no_de_control VARCHAR(255),
  no_seguro VARCHAR(255),
  nombre_empresa VARCHAR(255),
  num_residentes INT,
  opcion INT,
  periodo VARCHAR(255),
  proyecto VARCHAR(255),
  puesto_asesor_externo VARCHAR(255),
  puesto_asesor_interno VARCHAR(255),
  puesto_titular VARCHAR(255),
  revisor_1 VARCHAR(255),
  revisor_2 VARCHAR(255),
  rfc VARCHAR(255),
  seguro INT,
  tel_dependencia VARCHAR(255),
  titular VARCHAR(255)
);
# 124 
CREATE TABLE gtv_servicio_social (
  aceptado INT,
  acreditado CHAR,
  actividades TEXT,
  ciudad VARCHAR(255),
  dependencia VARCHAR(255),
  domicilio_dependencia VARCHAR(255),
  estado VARCHAR(255),
  fecha_inicio DATETIME,
  fecha_termino DATETIME,
  folio CHAR,
  modalidad INT,
  motivo VARCHAR(255),
  no_de_control VARCHAR(255),
  observaciones TEXT,
  periodo VARCHAR(255),
  programa VARCHAR(255),
  puesto VARCHAR(255),
  responsable VARCHAR(255),
  tipo_programa INT,
  titular VARCHAR(255)
);
# 125 
CREATE TABLE historia_alumno (
  calificacion DECIMAL,
  checksum VARCHAR(255),
  estatus_materia CHAR,
  fecha_actualizacion DATETIME,
  fecha_calificacion DATE,
  grupo CHAR,
  materia VARCHAR(255),
  no_de_control VARCHAR(255),
  nopresento CHAR,
  periodo VARCHAR(255),
  periodo_acredita_materia VARCHAR(255),
  plan_de_estudios CHAR,
  tipo_evaluacion CHAR,
  usuario CHAR,
  PRIMARY KEY (fecha_calificacion,materia,no_de_control,periodo)
);
# 126 
CREATE TABLE historia_alumno_egresado (
  calificacion DECIMAL,
  checksum VARCHAR(255),
  estatus_materia CHAR,
  fecha_actualizacion DATETIME,
  fecha_calificacion DATE,
  grupo CHAR,
  materia VARCHAR(255),
  no_de_control VARCHAR(255),
  nopresento CHAR,
  periodo VARCHAR(255),
  periodo_acredita_materia VARCHAR(255),
  plan_de_estudios CHAR,
  tipo_evaluacion CHAR,
  usuario CHAR
);
# 127 
CREATE TABLE historia_alumnos_log (
  calificacion DECIMAL,
  fecha DATE,
  ip VARCHAR(255),
  materia VARCHAR(255),
  motivo VARCHAR(255),
  no_de_control VARCHAR(255),
  periodo VARCHAR(255),
  tipo CHAR,
  usuario CHAR
);
# 128 
CREATE TABLE horario_administrativo (
  consecutivo_admvo INT,
  descripcion_horario VARCHAR(255),
  periodo VARCHAR(255),
  rfc CHAR,
  status_horario CHAR,
  tipo_control CHAR,
  vigencia_fin DATETIME,
  vigencia_inicio DATETIME,
  PRIMARY KEY (consecutivo_admvo,periodo,rfc,vigencia_inicio)
);
# 129 
CREATE TABLE horario_no_docente (
  consecutivo INT,
  especifica_actividad VARCHAR(255),
  observaciones VARCHAR(255),
  periodo VARCHAR(255),
  puesto INT,
  rfc CHAR
);
# 130 
CREATE TABLE horarios (
  actividad CHAR,
  aula CHAR,
  consecutivo INT,
  consecutivo_admvo INT,
  dia_semana INT,
  grupo CHAR,
  hora_final DATETIME,
  hora_inicial DATETIME,
  materia VARCHAR(255),
  periodo VARCHAR(255),
  rfc CHAR,
  tipo_horario CHAR,
  tipo_personal CHAR,
  vigencia_fin DATETIME,
  vigencia_inicio DATETIME
);
# 131 
CREATE TABLE horarios_relog (
  dia_semana INT,
  hora_entrada TIME,
  hora_salida TIME,
  numero_horario INT,
  periodo VARCHAR(255),
  rfc CHAR
);
# 132 
CREATE TABLE horas_verano (
  creditos INT,
  horas_semana CHAR,
  usuario CHAR,
  PRIMARY KEY (creditos)
);
# 133 
CREATE TABLE incidencias_justificaciones (
  fecha_hora_incidencia DATETIME,
  fecha_hora_usuario DATETIME,
  id_incidencia CHAR,
  incidencia CHAR,
  periodo VARCHAR(255),
  rfc CHAR,
  usuario CHAR
);
# 134 
CREATE TABLE ingredbon_egredbon (
  carrera VARCHAR(255),
  egresos INT,
  ingresos INT,
  periodo VARCHAR(255)
);
# 135 
CREATE TABLE ingresan_egresan (
  carrera VARCHAR(255),
  egresos INT,
  ingresos INT,
  periodo VARCHAR(255),
  PRIMARY KEY (periodo,carrera)
);
# 136 
CREATE TABLE instituto (
  clave_centro_seit CHAR,
  director_dgit VARCHAR(255),
  director_per_seit VARCHAR(255),
  firma_dgit LONGBLOB,
  firma_per_seit LONGBLOB,
  rfc_director CHAR,
  rfc_jescolares CHAR,
  rfc_jrechum CHAR,
  rfc_subacademico CHAR,
  rfc_subadmvo CHAR,
  rfc_subplaneacion CHAR,
  PRIMARY KEY (clave_centro_seit)
);
# 137 
CREATE TABLE ip_paginas (
  descripcion VARCHAR(255),
  ip_valido_final VARCHAR(255),
  ip_valido_inicial VARCHAR(255),
  pagina VARCHAR(255),
  PRIMARY KEY (ip_valido_final,ip_valido_inicial,pagina)
);
# 138 
CREATE TABLE jefes (
  clave_area CHAR,
  descripcion_area VARCHAR(255),
  jefe_area VARCHAR(255),
  rfc CHAR,
  PRIMARY KEY (clave_area)
);
# 139 
CREATE TABLE justificacion (
  descripcion VARCHAR(255),
  id_justificacion INT,
  PRIMARY KEY (id_justificacion)
);
# 140 
#CREATE TABLE justificacion (
#  descripcion VARCHAR(255),
#  id_justificacion INT
#);
# 141 
CREATE TABLE laboratorios (
  carrera VARCHAR(255),
  laboratorio CHAR,
  rfc CHAR
);
# 142 
CREATE TABLE mat_solicitadas_esp (
  aula CHAR,
  fecha_examen DATE,
  fecha_fin_ex DATE,
  fecha_inicio_ex DATE,
  folio_acta VARCHAR(255),
  hora_fin_ex CHAR,
  hora_inicio_ex CHAR,
  materia VARCHAR(255),
  periodo VARCHAR(255),
  presidente_ex CHAR,
  secretario_ex CHAR,
  vocal_ex CHAR,
  PRIMARY KEY (materia,periodo)
);
# 143 
CREATE TABLE materia_necesidad (
  grupo CHAR,
  horas INT,
  id_necesidad INT,
  materia VARCHAR(255),
  periodo VARCHAR(255),
  PRIMARY KEY (grupo,materia,periodo)
);
# 144 
CREATE TABLE materia_necesidad_20080807 (
  grupo CHAR,
  horas INT,
  id_necesidad INT,
  materia VARCHAR(255),
  periodo VARCHAR(255)
);
# 145 
CREATE TABLE materias (
  clave_area CHAR,
  materia VARCHAR(255),
  nivel_escolar CHAR,
  nombre_abreviado_materia VARCHAR(255),
  nombre_completo_materia VARCHAR(255),
  tipo_materia INT,
  PRIMARY KEY (materia)
);
# 146 
CREATE TABLE materias_carreras (
  carrera VARCHAR(255),
  clave_oficial_materia CHAR,
  creditos_materia INT,
  creditos_prerrequisito INT,
  especialidad VARCHAR(255),
  estatus_materia_carrera CHAR,
  horas_practicas INT,
  horas_teoricas INT,
  materia VARCHAR(255),
  orden_certificado INT,
  programa_estudios TEXT,
  renglon INT,
  reticula INT,
  semestre_reticula INT,
  PRIMARY KEY (carrera,especialidad,materia,reticula)
);
# 147 
CREATE TABLE materias_extraescolares (
  extraescolar INT,
  materia VARCHAR(255),
  PRIMARY KEY (extraescolar,materia)
);
# 148 
CREATE TABLE materias_omitidas_evl (
  descripcion VARCHAR(255),
  grupo CHAR,
  materia VARCHAR(255),
  PRIMARY KEY (materia)
);
# 149 
CREATE TABLE motivos (
  clasificacion_motivo CHAR,
  descripcion_motivo VARCHAR(255),
  motivo CHAR,
  PRIMARY KEY (motivo)
);
# 150 
CREATE TABLE necesidad (
  descripcion TEXT,
  id_necesidad INT,
  necesidad TEXT,
  PRIMARY KEY (id_necesidad)
);
# 151 
CREATE TABLE nivel_areas (
  descripcion_nivel_area VARCHAR(255),
  nivel CHAR,
  PRIMARY KEY (nivel)
);
# 152 
CREATE TABLE nivel_de_estudios (
  descripcion_nivel_estudios VARCHAR(255),
  nivel_estudios CHAR,
  PRIMARY KEY (nivel_estudios)
);
# 153 
CREATE TABLE nivel_escolar (
  descripcion_nivel VARCHAR(255),
  nivel_escolar CHAR primary key
);
# 154 
CREATE TABLE opciones_titulacion (
  detalle_opcion CHAR,
  nombre_opcion CHAR,
  opcion_titulacion CHAR PRIMARY KEY
);
# 155 
CREATE TABLE organigrama (
  area_depende CHAR,
  clave_area VARCHAR(255),
  descripcion_area VARCHAR(255),
  extension CHAR,
  nivel CHAR,
  p_s CHAR,
  p_sus CHAR,
  p_sustantivos CHAR,
  pro_sus CHAR,
  siglas CHAR,
  tipo_area CHAR,
  PRIMARY KEY (clave_area)
);
# 156 
CREATE TABLE pais (
  abrev VARCHAR(255),
  clave VARCHAR(255),
  pais VARCHAR(255)
);
# 157 
CREATE TABLE partidas_presupuestales (
  capitulo CHAR,
  descripcion_partida TEXT,
  estado_partida CHAR,
  nivel_partida CHAR,
  nombre_partida VARCHAR(255),
  partida CHAR,
  PRIMARY KEY (partida)
);
# 158 
CREATE TABLE periodos_escolares (
  cierre_horarios CHAR,
  cierre_seleccion CHAR,
  fecha_inicio DATE,
  fecha_termino DATE,
  filtro CHAR,
  fin_cal_docentes DATE,
  fin_enc_estudiantil DATETIME,
  fin_especial DATE,
  fin_sele_alumnos DATETIME,
  identificacion_corta CHAR,
  identificacion_larga CHAR,
  inicio_cal_docentes DATE,
  inicio_enc_estudiantil DATETIME,
  inicio_especial DATE,
  inicio_sele_alumnos DATETIME,
  inicio_vacacional DATE,
  inicio_vacacional_ss DATETIME,
  nota TEXT,
  nota_resp CHAR,
  num_dias_clase INT,
  parcial1_fin DATE,
  parcial1_inicio DATE,
  parcial2_fin DATE,
  parcial2_inicio DATE,
  parcial3_fin DATE,
  parcial3_inicio DATE,
  periodo VARCHAR(255),
  status CHAR,
  termino_vacacional DATE,
  termino_vacacional_ss DATETIME,
  PRIMARY KEY (periodo)
);
# 159 
CREATE TABLE periodos_recursos_humanos (
  fecha_final DATETIME,
  fecha_final2 DATETIME,
  fecha_inicial DATETIME,
  fecha_inicial2 DATETIME,
  periodo VARCHAR(255)
);
# 160 
CREATE TABLE permiso_tipo_adeudo (
  tipo CHAR,
  usuario CHAR
);
# 161 
CREATE TABLE permisos (
  aplicacion VARCHAR(255),
  carrera VARCHAR(255),
  clave_area CHAR,
  usuario CHAR
);
# 162 
CREATE TABLE permisos_funciones (
  funcion INT,
  usuario CHAR,
  PRIMARY KEY (funcion,usuario)
);
# 163 
CREATE TABLE personal (
  acta_nacimiento_ano INT,
  acta_nacimiento_foja INT,
  acta_nacimiento_libro CHAR,
  acta_nacimiento_numero INT,
  ano_clase INT,
  ano_inicio_estudios INT,
  ano_termino_estudios INT,
  apellido_materno VARCHAR(255),
  apellido_paterno VARCHAR(255),
  apellidos_empleado VARCHAR(255),
  area_academica CHAR,
  boca CHAR,
  cedula_profesional CHAR,
  cejas CHAR,
  clases CHAR,
  clave_area CHAR,
  clave_centro_seit CHAR,
  codigo_postal_empleado INT,
  colonia_empleado VARCHAR(255),
  conyuge VARCHAR(255),
  correo_electronico VARCHAR(255),
  curp_empleado CHAR,
  documento_obtenido VARCHAR(255),
  documento_obtenido_fecha DATE,
  documento_obtenido_institucion VARCHAR(255),
  domicilio_empleado VARCHAR(255),
  domicilio_empleado_numero CHAR,
  emergencia VARCHAR(255),
  entidad_federativa VARCHAR(255),
  entrada_salida CHAR,
  especializacion VARCHAR(255),
  estado_civil CHAR,
  estaturamts DECIMAL,
  estudios VARCHAR(255),
  estudios1 VARCHAR(255),
  fecha_cedula DATE,
  fecha_nacimiento DATETIME,
  fecha_titulacion DATETIME,
  firma LONGBLOB,
  fm CHAR,
  foto LONGBLOB,
  frente CHAR,
  grado_maximo_estudios INT,
  hijos INT,
  horas_nombramiento INT,
  idiomas_domina VARCHAR(255),
  inactivo_rc CHAR,
  ingreso_rama CHAR,
  inicio_gobierno CHAR,
  inicio_plantel CHAR,
  inicio_sep CHAR,
  institucion_egreso VARCHAR(255),
  institucion_expide_cedula VARCHAR(255),
  institucion_expide_titulo VARCHAR(255),
  instituto_titulacion VARCHAR(255),
  localidad VARCHAR(255),
  lugar_nacimiento INT,
  madre VARCHAR(255),
  municipio_empleado VARCHAR(255),
  nacionalidad VARCHAR(255),
  nariz CHAR,
  nivel_estudios CHAR,
  no_tarjeta INT,
  nombramiento CHAR,
  nombre_empleado VARCHAR(255),
  num_cartilla_smn CHAR,
  observaciones_empleado VARCHAR(255),
  ojos CHAR,
  otros_pendientes INT,
  padre VARCHAR(255),
  pais VARCHAR(255),
  pasaporte INT,
  pasaporte_puesto_autorizado VARCHAR(255),
  pasaporte_vigencia_fin DATE,
  pasaporte_vigencia_inicio DATE,
  pelo CHAR,
  pesokg DECIMAL,
  pigmentacion CHAR,
  rfc CHAR,
  senas_visibles VARCHAR(255),
  sexo_empleado CHAR,
  status_empleado CHAR,
  telefono_empleado VARCHAR(255),
  tipo_control CHAR,
  tipo_personal CHAR,
  tit_abreviado VARCHAR(255),
  titulo_num VARCHAR(255),
  titulo_num_ano INT,
  titulo_num_foja INT,
  titulo_num_libro CHAR,
  PRIMARY KEY (rfc)
);
# 164 
CREATE TABLE personal_huella (
  huella1 LONGBLOB,
  huella2 LONGBLOB,
  rfc CHAR
);
# 165 
CREATE TABLE planes_de_estudio (
  descripcion_del_plan VARCHAR(255),
  fin_plan DATETIME,
  inicio_plan DATETIME,
  plan_de_estudios CHAR primary key
);
# 166 
CREATE TABLE plazas (
  categoria CHAR,
  centro_trabajo_creacion CHAR,
  diagonal CHAR,
  documento_de_creacion CHAR,
  efectos_finales_plaza CHAR,
  efectos_iniciales_plaza CHAR,
  estatus_plaza CHAR,
  fecha_de_creacion DATE,
  horas CHAR,
  partida CHAR,
  subunidad CHAR,
  unidad CHAR,
  PRIMARY KEY (categoria,diagonal,horas,subunidad,unidad)
);
# 167 
CREATE TABLE plazas_log (
  categoria VARCHAR(255),
  diagonal VARCHAR(255),
  fecha DATE,
  horas CHAR,
  periodo VARCHAR(255),
  subunidad CHAR,
  tipo CHAR,
  unidad CHAR,
  usuario VARCHAR(255)
);
# 168 
CREATE TABLE plazas_personal (
  categoria CHAR,
  diagonal CHAR,
  efectos_finales_movto CHAR,
  efectos_iniciales_movto CHAR,
  estatus_plaza_empleado CHAR,
  fecha_modif DATE,
  horas INT,
  interino CHAR,
  motivo CHAR,
  referencia_movimiento CHAR,
  rfc CHAR,
  rfc_sustituido CHAR,
  subunidad CHAR,
  tipo_movimiento INT,
  unidad CHAR
);
# 169 
CREATE TABLE plazas_personal_log (
  categoria VARCHAR(255),
  diagonal VARCHAR(255),
  fecha DATE,
  horas INT,
  periodo VARCHAR(255),
  rfc VARCHAR(255),
  subunidad VARCHAR(255),
  tipo VARCHAR(255),
  unidad VARCHAR(255),
  usuario VARCHAR(255)
);
# 170 
CREATE TABLE plazas_temp (
  cadena VARCHAR(255),
  nombre VARCHAR(255),
  rfc VARCHAR(255),
  total INT
);
# 171 
CREATE TABLE poa_accion (
  accion VARCHAR(255),
  anio INT,
  cantidad_periodo_1 INT,
  cantidad_periodo_2 INT,
  id_accion INT,
  id_meta_institucional INT
);
# 172 
CREATE TABLE poa_accion_departamento (
  anio INT,
  id_accion INT,
  id_departamento INT,
  id_meta_institucional INT
);
# 173 
CREATE TABLE poa_capitulo (
  capitulo VARCHAR(255),
  dsc_capitulo VARCHAR(255),
  id_capitulo INT,
  PRIMARY KEY (id_capitulo)
);
# 174 
CREATE TABLE poa_clave_presupuestal (
  anio INT,
  id_clave_presupuestal VARCHAR(255),
  id_meta_institucional INT,
  id_proceso_clave INT,
  id_proceso_estrategico INT,
  PRIMARY KEY (anio,id_clave_presupuestal)
);
# 175 
CREATE TABLE poa_concepto (
  concepto VARCHAR(255),
  dsc_concepto VARCHAR(255),
  id_capitulo INT,
  id_concepto INT AUTO_INCREMENT PRIMARY KEY
);
# 176 
CREATE TABLE poa_fuente_ingreso (
  fuente_ingreso VARCHAR(255),
  id_fuente_ingreso INT,
  PRIMARY KEY (id_fuente_ingreso)
);
# 177 
CREATE TABLE poa_fuente_ingreso_capitulo (
  id_capitulo INT,
  id_fuente_ingreso INT,
  id_fuente_ingreso_capitulo INT,
  PRIMARY KEY (id_fuente_ingreso_capitulo)
);
# 178 
CREATE TABLE poa_insumo (
  id_insumo INT PRIMARY KEY,
  id_partida INT,
  id_unidad INT,
  insumo VARCHAR(255),
  precio_actualidad DECIMAL
);
# 179 
CREATE TABLE poa_insumo_accion_departamento (
  anio INT,
  cantidad_periodo_1 INT,
  cantidad_periodo_2 INT,
  id_accion NUMERIC,
  id_departamento INT,
  id_fuente_ingreso_capitulo INT,
  id_insumo INT,
  id_meta_institucioal INT,
  justificacion VARCHAR(255),
  partida VARCHAR(255),
  precio_unitarios NUMERIC
);
# 180 
CREATE TABLE poa_partida (
  capitulo CHAR,
  dsc_partida VARCHAR(255),
  id_concepto INT,
  id_partida INT PRIMARY KEY,
  nombre VARCHAR(255),
  partida CHAR
);
# 181 
CREATE TABLE poa_partida_departamento (
  id_departamento INT,
  id_partida INT
);
# 182 
CREATE TABLE poa_unidad (
  id_unidad INT,
  unidad VARCHAR(255),
  PRIMARY KEY (id_unidad)
);
# 183 
CREATE TABLE poblacion_esperada (
  a_especial INT,
  carrera VARCHAR(255),
  cursando INT,
  cursando_repe INT,
  en_repe INT,
  especial_repro INT,
  especialidad VARCHAR(255),
  materia VARCHAR(255),
  periodo VARCHAR(255),
  probables INT,
  requisitos_credito INT,
  requisitos_ok INT,
  reticula VARCHAR(255),
  PRIMARY KEY (carrera,materia,periodo/*,reticula*/)
);
# 184 
CREATE TABLE preguntas (
  aspecto VARCHAR(255),
  consecutivo INT,
  encuesta VARCHAR(255),
  no_pregunta INT,
  pregunta VARCHAR(255),
  resp_val INT,
  respuestas VARCHAR(255),
  PRIMARY KEY (aspecto,consecutivo,encuesta,no_pregunta)
);
# 185 
CREATE TABLE preparatorias_de_procedencia (
  clave_preparatoria CHAR,
  colonia CHAR,
  entidad_federativa VARCHAR(255),
  municipio CHAR,
  nombre_preparatoria CHAR,
  servicio CHAR,
  sostenimiento CHAR,
  PRIMARY KEY (clave_preparatoria)
);
# 186 
CREATE TABLE prestamo_maestros (
  clave_area CHAR,
  periodo VARCHAR(255),
  rfc CHAR,
  PRIMARY KEY (clave_area,periodo,rfc)
);
# 187 
CREATE TABLE problemas_seleccion (
  estatus CHAR,
  fecha_hora_atencion DATETIME,
  folio INT,
  no_de_control VARCHAR(255),
  periodo VARCHAR(255),
  problema TEXT,
  PRIMARY KEY (folio, no_de_control,periodo)
);
# 188 
CREATE TABLE pronabes (
  dia_atencion VARCHAR(255),
  folio INT PRIMARY KEY,
  hora_atencion VARCHAR(255),
  no_de_control VARCHAR(255)
);
# 189 
CREATE TABLE pta_estructura_programatica (
  actividad_institucional CHAR,
  funcion CHAR,
  grupo_funcional CHAR,
  idestructuraprogramatica INT,
  programa_prioritario CHAR,
  subfuncion CHAR,
  PRIMARY KEY (idestructuraprogramatica)
);
# 190 
CREATE TABLE pta_indicador (
  desc_indicador VARCHAR(255),
  idindicador INT,
  PRIMARY KEY (idindicador)
);
# 191 
CREATE TABLE pta_meta_institucional (
  anio_vigencia INT,
  desc_meta_institucional VARCHAR(255),
  formula VARCHAR(255),
  idindicador INT,
  idmetainstitucional INT,
  idmetapiid INT,
  idprocesoclave INT,
  idprocesoestrategico INT,
  idunidaddemedida INT
);
# 192 
CREATE TABLE pta_meta_nivel_jerarquico (
  anio INT,
  desc_metaniveljearquico VARCHAR(255),
  idmetainstitucional INT,
  idmetaniveljerarquico INT
);
# 193 
CREATE TABLE pta_meta_pidd (
  anio INT,
  clave_meta_pidd NCHAR,
  idmetapiid INT PRIMARY KEY,
  meta_piid VARCHAR(255)
);
# 194 
CREATE TABLE pta_periodo_captura (
  anio INT,
  estatus INT,
  fecha_fin DATE,
  fecha_inicio DATE,
  idperiodocaptura INT
);
# 195 
CREATE TABLE pta_periodo_seguimiento (
  anio INT,
  idperiodo INT PRIMARY KEY,
  periodo_seguimiento VARCHAR(255)
);
# 196 
CREATE TABLE pta_proceso_clave (
  idestructuraprogramatica INT,
  idprocesoclave INT PRIMARY KEY,
  idprocesoestrategico INT,
  proceso_clave VARCHAR(255)
);
# 197 
CREATE TABLE pta_proceso_estrategico (
  desc_proceso_estrategico VARCHAR(255),
  idproceso_estrategico INT PRIMARY KEY
);
# 198 
CREATE TABLE pta_programa_trabajo_anual (
  anio INT,
  anio_previa INT,
  cantidad INT,
  idmetainstitucional INT,
  idmetainstitucionalprevia INT,
  idperiodoseguimiento INT,
  meta_institucional_adaptada VARCHAR(255),
  porcentaje_programado INT
);
# 199 
CREATE TABLE pta_puesto_nivel_jerarquico (
  anio INT,
  idmetainstitucional INT,
  idmetaniveljerarquico INT,
  idpuesto INT
);
# 200 
CREATE TABLE pta_seguimiento (
  anio INT,
  avance INT,
  departamento INT,
  idmetainstitucional INT,
  idmetaniveljerarquico INT,
  idperiodo INT,
  idresponsable INT
);
# 201 
CREATE TABLE pta_unidad_medida (
  desc_unidad_medida VARCHAR(255),
  idunidadmedida INT,
  PRIMARY KEY (idunidadmedida)
);
# 202 
CREATE TABLE puestos (
  clave_puesto INT,
  descripcion_puesto INT,
  funciones_puesto TEXT,
  nivel_puesto INT,
  tipo_puesto CHAR,
  PRIMARY KEY (clave_puesto)
);
# 203 
CREATE TABLE puestos_personal (
  clave_puesto INT,
  fecha_de_ratificacion_puesto DATETIME,
  fecha_ingreso_puesto DATETIME,
  fecha_termino_puesto DATETIME,
  horas_asignadas INT,
  rfc CHAR,
  PRIMARY KEY (clave_puesto,rfc)
);
# 204 
CREATE TABLE quejas_sugerencias (
  clave_area CHAR,
  fecha DATETIME,
  mensaje TEXT,
  no INT,
  no_de_control CHAR,
  periodo VARCHAR(255),
  titulo CHAR
);
# 205 
CREATE TABLE reloj_checador (
  dia_semana INT,
  fecha_hora DATETIME,
  incidencia CHAR,
  numero_horario CHAR,
  periodo VARCHAR(255),
  rfc CHAR
);
# 206 
CREATE TABLE reporte_docente (
  calificacion INT,
  clave_area CHAR,
  desertados INT,
  grupo VARCHAR(255),
  materia VARCHAR(255),
  periodo VARCHAR(255),
  reprobados INT,
  rfc CHAR,
  PRIMARY KEY (grupo, materia,periodo)
);
# 207 
#CREATE TABLE reporte_docente (
#  calificacion INT,
#  clave_area CHAR,
#  desertados INT,
#  grupo VARCHAR(255),
#  materia VARCHAR(255),
#  periodo VARCHAR(255),
#  reprobados INT,
#  rfc CHAR
#);
# 208 
CREATE TABLE reportes_parciales (
  grupo CHAR,
  materia VARCHAR(255),
  periodo VARCHAR(255),
  reporte INT
);
# 209 
CREATE TABLE reportes_parciales_calif (
  calificacion DECIMAL,
  grupo CHAR,
  materia VARCHAR(255),
  no_de_control VARCHAR(255),
  parcial INT,
  periodo VARCHAR(255),
  reporte INT
);
# 210 
CREATE TABLE requisiciones (
  anio INT,
  comentarios_accion VARCHAR(255),
  estatus CHAR,
  fecha_atencion DATE,
  fecha_atencion_direccion DATETIME,
  fecha_atencion_planeacion DATETIME,
  fecha_atencion_subdireccion DATETIME,
  fecha_emision DATE,
  fecha_registro DATETIME,
  folio INT,
  id INT PRIMARY KEY,
  id_accion NUMERIC,
  id_departamento CHAR,
  jefe INT,
  jefe_solicitante VARCHAR(255),
  jefe_usuario VARCHAR(255),
  programa CHAR,
  revisado INT,
  vobo_direccion CHAR,
  vobo_planeacion CHAR,
  vobo_subdireccion CHAR
);
# 211 
CREATE TABLE requisiciones_comentarios (
  comentarios VARCHAR(255),
  fecha_hora DATETIME,
  id_requisicion INT,
  log INT PRIMARY KEY,
  mostrar CHAR,
  usuario VARCHAR(255),
  visto CHAR
);
# 212 
#ct requisiciones_detalles
#--salio borrosa la foto--
# 213 
CREATE TABLE requisiciones_materia (
  carrera VARCHAR(255),
  materia VARCHAR(255),
  materia_relacion VARCHAR(255),
  reticula VARCHAR(255),
  tipo_requisito CHAR,
  PRIMARY KEY (carrera,materia,materia_relacion/*,reticula*/)
);
# 214 
CREATE TABLE residencias (
  asesor_interno VARCHAR(255),
  calificacion INT,
  empresa VARCHAR(255),
  estatus_residencia CHAR,
  fecha_inicio DATETIME,
  fecha_termino DATETIME,
  folio_acta_residencia VARCHAR(255),
  no_de_control VARCHAR(255),
  nombre_asesor_externo VARCHAR(255),
  nombre_proyecto VARCHAR(255),
  observaciones VARCHAR(255),
  periodo VARCHAR(255)
);
# 215 
CREATE TABLE respaldoAR (
  adeuda_biblioteca CHAR,
  adeuda_escolar CHAR,
  adeuda_financieros CHAR,
  adeudo_especial CHAR,
  autoriza_escolar CHAR,
  baja CHAR,
  creditos_autorizados INT,
  cuenta_pago VARCHAR(255),
  egresa CHAR,
  encuesto CHAR,
  estatus_reinscripcion CHAR,
  fecha_hora_pago DATETIME,
  fecha_hora_seleccion DATETIME,
  fecha_recibo DATETIME,
  indice_reprobacion FLOAT,
  lugar_pago VARCHAR(255),
  lugar_seleccion VARCHAR(255),
  motivo_aviso_baja VARCHAR(255),
  no_de_control CHAR,
  otro_mensaje VARCHAR(255),
  periodo VARCHAR(255),
  promedio INT,
  promedio_acumulado NUMERIC,
  recibo_pago CHAR,
  regular CHAR,
  semestre INT,
  vobo_adelanta_sel CHAR
);
# 216 
CREATE TABLE respuestas_quejas (
  entrega CHAR,
  fecha DATETIME,
  no INT,
  no_de_control VARCHAR(255),
  periodo VARCHAR(255),
  respuesta TEXT
);
# 217 
CREATE TABLE resultados (
  clave_area CHAR,
  encuesta CHAR,
  grupo CHAR,
  materia VARCHAR(255),
  no_de_control VARCHAR(255),
  periodo VARCHAR(255),
  resp_abierta VARCHAR(255),
  respuestas VARCHAR(255),
  rfc CHAR,
  PRIMARY KEY (materia,no_de_control,periodo)
);
# 218 
CREATE TABLE rf_conceptos_banco (
  concepto CHAR,
  descripcion_banco VARCHAR(255),
  descripcion_concepto VARCHAR(255),
  monto VARCHAR(255),
  num CHAR
);
# 219 
CREATE TABLE rf_conceptos_cobro (
  concepto VARCHAR(255),
  descripcion_concepto VARCHAR(255),
  monto DECIMAL,
  PRIMARY KEY (concepto)
);
# 220 
CREATE TABLE rf_recibo (
  concepto VARCHAR(255),
  estatus CHAR,
  fecha DATE,
  folio INT,
  monto DECIMAL,
  no_de_control VARCHAR(255),
  periodo VARCHAR(255),
  usuario VARCHAR(255)
);
# 221 
CREATE TABLE seleccion_materias (
  calificacion DECIMAL,
  fecha_hora_seleccion DATETIME,
  global CHAR,
  grupo CHAR,
  materia VARCHAR(255),
  no_de_control VARCHAR(255),
  nopresento CHAR,
  periodo VARCHAR(255),
  repeticion CHAR,
  status_seleccion CHAR,
  tipo_evaluacion CHAR,
  PRIMARY KEY (grupo,materia,no_de_control,periodo)
);
# 222 
CREATE TABLE seleccion_materias_bajas (
  calificacion VARCHAR(255),
  fecha_hora_seleccion DATETIME,
  grupo CHAR,
  materia VARCHAR(255),
  no_de_control VARCHAR(255),
  nopresento CHAR,
  periodo VARCHAR(255),
  repeticion CHAR,
  status_seleccion CHAR,
  tipo_evaluacion CHAR,
  PRIMARY KEY (grupo,materia,no_de_control/*,periodo*/)
);
# 223 
CREATE TABLE seleccion_materias_log (
  calificacion DECIMAL,
  fecha_hora_modif DATETIME,
  fecha_hora_seleccion DATETIME,
  grupo VARCHAR(255),
  lugar VARCHAR(255),
  materia VARCHAR(255),
  motivo VARCHAR(255),
  no_de_control VARCHAR(255),
  nopresento CHAR,
  periodo VARCHAR(255),
  repeticion CHAR,
  status_seleccion CHAR,
  tipo_evaluacion CHAR,
  tipo_operacion CHAR,
  usuario CHAR
);
# 224 
CREATE TABLE semestres_permitidos (
  carrera VARCHAR(255),
  reticula VARCHAR(255),
  semestres_permitidos INT,
  PRIMARY KEY (carrera,reticula)
);
# 225 
CREATE TABLE sistema_acceso (
  idacceso INT,
  idaplicacion INT,
  tipo_usuario CHAR
);
# 226 
CREATE TABLE sistema_aplicacion (
  aplicacion VARCHAR(255),
  idaplicacion INT
);
# 227 
CREATE TABLE situaciones (
  descripcion_situacion VARCHAR(255),
  situacion CHAR,
  PRIMARY KEY (situacion)
);
# 228 
CREATE TABLE sol_ds_cuartos_personales (
  descripcion VARCHAR(255),
  numero INT,
  PRIMARY KEY (numero)
);
# 229 
CREATE TABLE sol_ds_de_quien_dependes (
  de_quien INT PRIMARY KEY,
  descripcion CHAR
);
# 230 
CREATE TABLE sol_ds_estudios_padres (
  descripcion CHAR,
  nivel_estudios INT PRIMARY KEY
);
# 231 
CREATE TABLE sol_ds_ocupacion_padres (
  descripcion CHAR,
  ocupacion INT PRIMARY KEY
);
# 232 
CREATE TABLE sol_ds_quien_vives_actual (
  con_quien_vives INT PRIMARY KEY,
  descripcion CHAR
);
# 233 
CREATE TABLE sol_ficha_ds (
  calle_no CHAR,
  casa_vives CHAR,
  codigo_postal CHAR,
  colonia CHAR,
  comunicar_con CHAR,
  con_quien_vives INT,
  cuartos_casa INT,
  de_quien_dependes INT,
  entidad_federativa VARCHAR(255),
  ingresos_hermanos INT,
  ingresos_madre INT,
  ingresos_otros INT,
  ingresos_padre INT,
  ingresos_propios INT,
  lugar_trabajo CHAR,
  municipio VARCHAR(255),
  nivel_estudios_madre INT,
  nivel_estudios_padre INT,
  no_solicitud NUMERIC,
  ocupacion_madre INT,
  ocupacion_padre INT,
  periodo VARCHAR(255),
  personas_casa INT,
  personas_dependen INT,
  telefono CHAR,
  telefono_trabajo CHAR,
  tipo_sangre CHAR,
  total_ingresos INT,
  PRIMARY KEY (no_solicitud,periodo)
);
# 234 
CREATE TABLE sol_ficha_examen (
  agnio_egreso INT,
  apellido_materno VARCHAR(255),
  apellido_materno_madre VARCHAR(255),
  apellido_materno_padre VARCHAR(255),
  apellido_paterno VARCHAR(255),
  apellido_paterno_madre VARCHAR(255),
  apellido_paterno_padre VARCHAR(255),
  calle_no CHAR,
  capacidad_diferente CHAR,
  carrera_opcion_1 VARCHAR(255),
  carrera_opcion_2 VARCHAR(255),
  clave_prepatoria CHAR,
  codigo_postal CHAR,
  colonia_aspirante CHAR,
  correo_electronico CHAR,
  curp CHAR,
  entidad_federativa VARCHAR(255),
  entidad_federativa_prepa VARCHAR(255),
  especifique_extranjero CHAR,
  especifique_zona_procedencia CHAR,
  estado_civil VARCHAR(255),
  fecha_atencion DATE,
  fecha_nacimiento DATE,
  fecha_pago DATE,
  fecha_registro DATE,
  folio_ceneval INT,
  hora_atencion NVARCHAR(255),
  instutito CHAR,
  itmin CHAR,
  municipio VARCHAR(255),
  nacionalidad CHAR,
  nip INT,
  no_recibo INT,
  no_solicitud NUMERIC,
  nombre_aspirante VARCHAR(255),
  nombre_madre_aspirante VARCHAR(255),
  nombre_padre_aspirante VARCHAR(255),
  periodo VARCHAR(255),
  programa_oportunidades CHAR,
  promedio_general DECIMAL,
  quien_otorgo CHAR,
  sexo CHAR,
  telefono CHAR,
  vive_madre CHAR,
  vive_padre CHAR,
  zona_procedencia CHAR,
  PRIMARY KEY (no_solicitud,periodo)
);
# 235 
CREATE TABLE solicitudes_ex_especial (
  autodidacta CHAR,
  calificacion_especial VARCHAR(255),
  fecha_especial VARCHAR(255),
  materia VARCHAR(255),
  no_de_control VARCHAR(255),
  numero_autorizacion CHAR,
  periodo VARCHAR(255),
  plan_de_estudios CHAR,
  tipo_evaluacion CHAR,
  PRIMARY KEY (materia,no_de_control,periodo)
);
# 236 
CREATE TABLE solicitudes_ex_especial_log (
  autodidacta CHAR,
  calificacion CHAR,
  fecha_registro DATE,
  materia VARCHAR(255),
  motivo VARCHAR(255),
  no_de_control VARCHAR(255),
  numero_autorizacion CHAR,
  periodo VARCHAR(255),
  tipo_evaluacion CHAR,
  tipo_registro CHAR,
  usuario CHAR
);
# 237 
CREATE TABLE tabulador (
  categoria CHAR,
  periodo VARCHAR(255),
  sueldo NVARCHAR(255)
);
# 238 
CREATE TABLE tipo_adeudo (
  descripcion CHAR,
  tipo CHAR PRIMARY KEY
);
# 239 
CREATE TABLE tipo_incidencias (
  descripcion_incidencia VARCHAR(255),
  incidencia CHAR PRIMARY KEY
);
# 240 
CREATE TABLE tipo_materia (
  nombre_tipo VARCHAR(255),
  tipo_materia INT PRIMARY KEY
);
# 241 
CREATE TABLE tipos_documentos (
  descripcion_general_docto VARCHAR(255),
  extension CHAR,
  fuente_del_documento VARCHAR(255),
  id_tipo_docto INT PRIMARY KEY
);
# 242 
CREATE TABLE tipos_encuestas (
  descripcion CHAR,
  encuesta CHAR PRIMARY KEY,
  tipo CHAR
);
# 243 
CREATE TABLE tipos_escuelas (
  descripcion_tipo VARCHAR(255),
  tipo_escuela INT PRIMARY KEY
);
# 244 
CREATE TABLE tipos_evaluacion (
  calif_minima_aprobatoria INT,
  descripcion_corta_evaluacion VARCHAR(255),
  descripcion_evaluacion VARCHAR(255),
  evaluacion_depende CHAR,
  nosegundas CHAR,
  orden INT,
  plan_de_estudios CHAR,
  prioridad INT,
  tipo_evaluacion CHAR,
  usocurso CHAR,
  PRIMARY KEY (plan_de_estudios,tipo_evaluacion)
);
# 245 
CREATE TABLE tipos_usuario (
  descripcion_tipo VARCHAR(255),
  pagina_inicial VARCHAR(255),
  tipo_usuario CHAR,
  PRIMARY KEY (tipo_usuario)
);
# 246 
CREATE TABLE titulaciones (
  antecedentes VARCHAR(255),
  cedula_profesional CHAR,
  clave VARCHAR(255),
  estatus_titulacion CHAR,
  fecha_expedicion_titulo DATE,
  fecha_recepcion_dgest DATE,
  fecha_registro_tit DATE,
  fecha_solicitud_titulacion DATE,
  fecha_titulacion DATE,
  hora_final_recepcion CHAR,
  hora_inicio_recepcion CHAR,
  jurado_secretario VARCHAR(255),
  jurado_suplente VARCHAR(255),
  jurado_vocal VARCHAR(255),
  no_de_control CHAR,
  nombre_documento_sustento VARCHAR(255),
  numero_cons_tit INT,
  numero_foja_ac INT,
  numero_foja_tit INT,
  numero_libro_ac INT,
  numero_libro_tit INT,
  numero_titulo INT,
  observaciones VARCHAR(255),
  opcion_titulacion CHAR,
  opcion_titulacion_letra CHAR,
  pais VARCHAR(255),
  periodo VARCHAR(255),
  periodo_egresa_prepa VARCHAR(255),
  periodo_ingreso_prepa VARCHAR(255),
  tema VARCHAR(255),
  tipo_cedula CHAR,
  tipo_registro CHAR,
  titulo_entrega VARCHAR(255),
  PRIMARY KEY (no_de_control,opcion_titulacion,periodo)
);
# 247 
CREATE TABLE unidades (
  descripcion_unidad VARCHAR(255),
  subunidad CHAR,
  unidad CHAR,
  PRIMARY KEY (unidad,subunidad)
);
# 248 
CREATE TABLE val_opc_evaluacion (
  consecutivo INT,
  encuesta VARCHAR(255),
  opcion CHAR,
  valor INT,
  PRIMARY KEY (consecutivo,encuesta,opcion)
);
# 249 
CREATE TABLE zonas_economicas (
  salario_minimo DECIMAL,
  zona_economica CHAR,
  PRIMARY KEY (zona_economica)
);