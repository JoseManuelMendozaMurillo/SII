#SELECT VERSION();
/*SELECT TABLE_NAME, CONSTRAINT_NAME
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE REFERENCED_TABLE_SCHEMA = 'nombre_de_tu_base_de_datos'
AND CONSTRAINT_NAME LIKE 'FK_%';

select CONSTRAINT_NAME, TABLE_NAME, COLUMN_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME
from INFORMATION_SCHEMA.KEY_COLUMN_USAGE
where TABLE_SCHEMA ='diagrama'
and REFERENCED_TABLE_NAME is not null;

SELECT TABLE_NAME, COLUMN_NAME
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE CONSTRAINT_NAME = 'PRIMARY'
  AND TABLE_SCHEMA = 'diagrama';

 show databases;
 */
#1
Alter table acceso
add constraint fk_acceso_tipo_usuario_tipos_usuario_tipo_usuario
foreign key (tipo_usuario)
references tipos_usuario(tipo_usuario);
#2
alter TABLE acumulado_historico
add constraint fk_acumulado_historico_no_control_alumnos_no_control
foreign key (no_de_control)
references alumnos(no_de_control);
#3--
alter TABLE acumulado_historico
add constraint fk_acumulado_historico_periodo_periodos_escolares_periodo
foreign key (periodo)
references periodos_escolares(periodo);
#4
alter TABLE alumnos
add constraint fk_alumnos_estatus_alumno_estatus_alumno_estatus
foreign key (estatus_alumno)
references estatus_alumno(estatus);
#5
alter TABLE alumnos
add constraint fk_alumnos_nivel_escolar_nivel_escolar_nivel_escolar
foreign key (nivel_escolar)
references nivel_escolar(nivel_escolar);
#6
alter TABLE alumnos
add constraint fk_alumnos_plan_de_estudios_planes_de_estudio_plan_estudios
foreign key (plan_de_estudios)
references planes_de_estudio(plan_de_estudios);
#7
alter TABLE alumnos
add constraint fk_alumnos_carrera_carreras_carrera
foreign key (carrera)
references carreras(carrera);
#8--
alter TABLE alumnos_becados
add constraint fk_alumnos_becados_beca_becas_beca
foreign key (beca)
references becas(beca);
#9
alter TABLE alumnos_becados
add constraint fk_alumnos_becados_no_de_control_alumnos_no_de_control
foreign key (no_de_control)
references alumnos(no_de_control);
#10--
alter TABLE alumnos_becados
add constraint fk_alumnos_becados_periodo_periodos_escolares_periodo
foreign key (periodo)
references periodos_escolares(periodo);
#11
alter TABLE alumnos_equivalencias
add constraint fk_alumnos_equivalencias_alumn_alumnos_nocontrol
foreign key (no_de_control)
references alumnos(no_de_control);
#12
alter TABLE alumnos_generales
add constraint fk_alumnos_generales_entidadf_entidades_fed_entddf
foreign key (entidad_federativa)
references entidades_federativas(entidad_federativa);
#13
alter TABLE alumnos_generales
add constraint fk_alumnos_generales_nocontrol_alumnos_nocontrol
foreign key (no_de_control)
references alumnos(no_de_control);
#14
alter TABLE alumnos_socioeconomicos
add constraint fk_alumnos_nocontrol_alumnos_noctrl
foreign key (no_de_control)
references alumnos(no_de_control);
#15
alter TABLE apoyo_docencia
add constraint fk_apoyodocen_rfc_personal_rfc
foreign key (rfc)
references personal(rfc);
#16
alter TABLE apoyo_docencia
add constraint fk_apoyodocen_act_actividades_apoyo_act
foreign key (actividad)
references actividades_apoyo(actividad);
#17
alter TABLE apoyo_docencia
add constraint fk_fk_apoyodocen_peri_periodosesc_periodo
foreign key (periodo)
references periodos_escolares(periodo);
#
alter TABLE autorizaciones_inscripcion
add constraint fk_autorinscri_noctrl_alumnos_noctrl
foreign key (no_de_control)
references alumnos(no_de_control);
#
alter TABLE autorizaciones_inscripcion
add constraint fk_autorinscri_priodosesc_periodo
foreign key (periodo)
references periodos_escolares(periodo);
#
alter TABLE biblioteca_codigos_libros
add constraint fk_bibcodlib_biblib_idlib
foreign key (id_libro)
references biblioteca_libros(id_libro);
#
alter TABLE biblioteca_ediciones
add constraint fk_bibedi_idlib_biblib_idlib
foreign key (id_libro)
references biblioteca_libros(id_libro);
#
alter TABLE biblioteca_libro_categoria
add constraint fk_biblibcat_idlib_biblib_idlib
foreign key (id_libro)
references biblioteca_libros(id_libro);
#
alter TABLE  biblioteca_prestamos
add constraint fk_bibpre_noctrl_alum_noctrl
foreign key (no_de_control)
references alumnos(no_de_control);
#
alter TABLE carreras
add constraint fk_carr_nivesc_nivesc_nivesc
foreign key (nivel_escolar)
references nivel_escolar(nivel_escolar);
#
alter TABLE centros_trabajo
add constraint fk_centrab_zoneco_zoneco_zoneco
foreign key (zona_economica)
references zonas_economicas(zona_economica);
#
alter TABLE centros_trabajo
add constraint fk_centrab_entfed_entfed_entfed
foreign key (entidad_federativa)
references entidades_federativas(entidad_federativa);
#
alter TABLE crt_programa_oficial
add constraint fk_crtprogofi_mat_mat_mat
foreign key (materia)
references materias(materia);
#
alter TABLE crt_subtemas
add constraint fk_crtsub_nouni_crtunitem_nouni
foreign key (no_de_unidad)
references crt_unidades_tematicas(no_de_unidad);
#
alter TABLE crt_subtemas
add constraint fk_crtsub_mat_mat_mat
foreign key (materia)
references materias(materia);
#
alter TABLE crt_unidades_tematicas
add constraint fk_unitem_mat_mate_mat
foreign key (materia)
references materias(materia);
#
alter TABLE cursos
add constraint fk_cursos_rfc_personal_rfc
foreign key (rfc)
references personal(rfc);
#
alter TABLE documentos_alumnos
add constraint fk_docalum_noctrl_alumn_noctrl
foreign key (no_de_control)
references alumnos(no_de_control);
#
alter TABLE documentos_alumnos
add constraint fk_docalum_idipdoc_tipdocs_idtipdoc
foreign key (id_tipo_docto)
references tipos_documentos(id_tipo_docto);
#
alter TABLE documentos_empleado
add constraint fk_docemp_rfc_per_rfc
foreign key (rfc)
references personal(rfc);
#
alter TABLE documentos_empleado
add constraint fk_docemp_idtipdoc_tipdocs_idipdoc
foreign key (id_tipo_docto)
references tipos_documentos(id_tipo_docto);
#
alter TABLE equipamiento_aula
add constraint fk_equaul_aul_auls_aula
foreign key (aula)
references aulas(aula);
#
alter TABLE equipamiento_aula
add constraint fk_equaul_tipequ_equi_tipequ
foreign key (tipo_equipo)
references equipamiento(tipo_equipo);
#
alter TABLE especialidades
add constraint fk_esp_carrret_carr_carrret
foreign key (carrera,reticula)
references carreras(carrera,reticula);
#
alter TABLE fichas_admision
add constraint fk_ficadm_escpro_esc_claesc
foreign key (escuela_procedencia)
references escuelas(clave_escuela);
#
alter TABLE fichas_admision
add constraint fk_ficadm_entfed_entidsfed_entfed
foreign key (entidad_federativa)
references entidades_federativas(entidad_federativa);
#
alter TABLE fichas_admision
add constraint fk_ficadm_tipesc_tipsesc_tipesc
foreign key (tipo_escuela)
references tipos_escuelas(tipo_escuela);
#
alter TABLE fichas_admision
add constraint fk_ficadm_entfed_entsfed_entfed
foreign key (entidad_federativa_proc)
references entidades_federativas(entidad_federativa);
#
alter TABLE fichas_admision
add constraint fk_ficadm_carrret_carrs_carrret
foreign key (carrera,reticula)
references carreras(carrera,reticula);
#
alter TABLE fichas_admision
add constraint fk_fecadm_per_peresc_per
foreign key (periodo)
references periodos_escolares(periodo);
#
alter TABLE folios_fichas
add constraint fk_folfic_carrret_carrs_carrret
foreign key (carrera,reticula)
references carreras(carrera,reticula);
#
alter TABLE folios_fichas
add constraint fk_folfic_per_peresc_per
foreign key (periodo)
references periodos_escolares(periodo);
#
alter TABLE funciones_tipo_usuario
add constraint fk_funtpusu_tipusu_tipsusu_tipusu
foreign key (tipo_usuario)
references tipos_usuario(tipo_usuario);
#
alter TABLE funciones_tipo_usuario
add constraint fk_funtipusu_fun_funsis_fun
foreign key (funcion)
references funciones_sistema(funcion);
#
alter TABLE grupos
add constraint fk_grup_grup_pers_rfc
foreign key (grupo)
references personal(rfc);
#
alter TABLE grupos
add constraint fk_grup_per_peresc_per
foreign key (periodo)
references periodos_escolares(periodo);
#
alter TABLE grupos
add constraint fk_grup_mat_mats_mat
foreign key (materia)
references materias(materia);
#
alter TABLE grupos
add constraint fk_grup_exccarr_carrs_carr
foreign key (exclusivo_carrera)
references carreras(carrera);
#
alter TABLE historia_alumno
add constraint fk_hisalum_noctrl_alum_noctrl
foreign key (no_de_control)
references alumnos(no_de_control);
#
alter TABLE historia_alumno
add constraint fk_hisalum_planesttipeva_tipseva_planesttipeva
foreign key (plan_de_estudios,tipo_evaluacion)
references tipos_evaluacion(plan_de_estudios,tipo_evaluacion);
#
alter TABLE horario_administrativo
add constraint fk_horadm_rfc_pers_rfc
foreign key (rfc)
references personal(rfc);
#
alter TABLE horario_administrativo
add constraint fk_horadm_per_peresc_per
foreign key (periodo)
references periodos_escolares(periodo);
#
alter TABLE horarios
add constraint fk_hor_aula_aulas_aula
foreign key (aula)
references aulas(aula);
#
alter TABLE horarios
add constraint fk_hor_conadmperrfcvigini_horadm_caprfcvi
foreign key (consecutivo_admvo,periodo,rfc,vigencia_inicio)
references horario_administrativo(consecutivo_admvo,periodo,rfc,vigencia_inicio);
#
alter TABLE horarios
add constraint fk_hor_actconse_apodoc_actconse
foreign key (actividad,consecutivo)
references apoyo_docencia(actividad,consecutivo);
#
alter TABLE horarios_relog
add constraint fk_horrelog_rfc_pers_rfc
foreign key (rfc)
references personal(rfc);
#
alter TABLE instituto
add constraint fk_inst_clavcenseit_centtrab_clacenseit
foreign key (clave_centro_seit)
references centros_trabajo(clave_centro_seit);
#
alter TABLE mat_solicitadas_esp
add constraint fk_matsolesp_aul_aulas_aul
foreign key (aula)
references aulas(aula);
#
alter TABLE mat_solicitadas_esp
add constraint fk_matsolesp_per_peresc_per
foreign key (periodo)
references periodos_escolares(periodo);
#
alter TABLE mat_solicitadas_esp
add constraint fk_matsolesp_mat_mats_mat
foreign key (materia)
references materias(materia);
#
alter TABLE materias
add constraint fk_mats_tipmat_tipmat_tipmat
foreign key (tipo_materia)
references tipo_materia(tipo_materia);
#
alter TABLE materias
add constraint fk_mats_claare_org_claare
foreign key (clave_area)
references organigrama(clave_area);
#
alter TABLE materias
add constraint fk_mats_nivesc_nicesc_nivesc
foreign key (nivel_escolar)
references nivel_escolar(nivel_escolar);
#
alter TABLE materias_carreras
add constraint fk_matcar_carr_carr_carr
foreign key (carrera)
references carreras(carrera);
#
alter TABLE materias_carreras
add constraint fk_matcarr_mat_mat_mat
foreign key (materia)
references materias(materia);
#
alter TABLE materias_extraescolares
add constraint fk_matext_mat_mats_mat
foreign key (materia)
references materias(materia);
#
alter TABLE materias_extraescolares
add constraint fk_matext_ext_exts_ext
foreign key (extraescolar)
references extraescolares(extraescolar);
#
alter TABLE partidas_presupuestales
add constraint fk_parpre_cap_cap_cap
foreign key (capitulo)
references capitulos(capitulo);
#
alter TABLE permisos
add constraint fk_per_usu_acc_usu
foreign key (usuario)
references acceso(usuario);
#
alter TABLE personal
add constraint fk_pers_claare_org_claare
foreign key (clave_area)
references organigrama(clave_area);
#
alter TABLE personal
add constraint fk_pers_nivest_nivest_nivest
foreign key (nivel_estudios)
references nivel_de_estudios(nivel_estudios);
#
alter TABLE personal
add constraint fk_pers_clacensei_centra_clacensei
foreign key (clave_centro_seit)
references centros_trabajo(clave_centro_seit);
#----------------------------------------------------
alter TABLE personal_huella
add constraint fk_perhue_rfc_pers_rfc
foreign key (rfc)
references personal(rfc);
#
alter TABLE plazas
add constraint fk_pla_unisub_uni_unisub
foreign key (unidad,subunidad)
references unidades(unidad,subunidad);
#
alter TABLE plazas
add constraint fk_pla_par_parpre_par
foreign key (partida)
references partidas_presupuestales(partida);
#
alter TABLE plazas_personal
add constraint fk_plaper_unisub_uni_unisub
foreign key (unidad,subunidad)
references unidades(unidad,subunidad);
#
alter TABLE plazas_personal
add constraint fk_plaper_rfc_pers_rfc
foreign key (rfc)
references personal(rfc);
#
alter TABLE poa_concepto
add constraint fk_poacap_idcap_poacap_idcap
foreign key (id_capitulo)
references poa_capitulo(id_capitulo);
#
alter TABLE poa_fuente_ingreso_capitulo
add constraint fk_poafueingcap_idcap_poacap_idcap
foreign key (id_capitulo)
references poa_capitulo(id_capitulo);
#
alter TABLE poa_fuente_ingreso_capitulo
add constraint fk_poafueingcap_idfueing_poafueing_idfueing
foreign key (id_fuente_ingreso)
references poa_fuente_ingreso(id_fuente_ingreso);
#
alter TABLE poa_insumo
add constraint fk_poains_iduni_poauni_iduni
foreign key (id_unidad)
references poa_unidad(id_unidad);
#
alter TABLE poa_insumo
add constraint fk_poains_idpar_poapar_idpar
foreign key (id_partida)
references poa_partida(id_partida);
#
alter TABLE poa_partida
add constraint fk_poapar_idcon_poacon_idcon
foreign key (id_concepto)
references poa_concepto(id_concepto);
#
alter TABLE preparatorias_de_procedencia
add constraint fk_prepro_entfed_entsfed_entfed
foreign key (entidad_federativa)
references entidades_federativas(entidad_federativa);
#
alter TABLE prestamo_maestros
add constraint fk_premae_rfc_pers_rfc
foreign key (rfc)
references personal(rfc);
#
alter TABLE prestamo_maestros
add constraint fk_premae_claare_org_claare
foreign key (clave_area)
references organigrama(clave_area);
#
alter TABLE prestamo_maestros
add constraint fk_premae_per_peresc_per
foreign key (periodo)
references periodos_escolares(periodo);
#
alter TABLE pta_meta_institucional
add constraint fk_ptametins_idind_ptaind_ididn
foreign key (idindicador)
references pta_indicador(idindicador);
#
alter TABLE pta_meta_institucional
add constraint fk_ptametins_idproes_ptaproest_idpest
foreign key (idprocesoestrategico)
references pta_proceso_estrategico(idproceso_estrategico);
#
alter TABLE pta_meta_institucional
add constraint fk_ptametins_idproc_ptaprocla_idpcla
foreign key (idprocesoclave)
references pta_proceso_clave(idprocesoclave);
#
alter TABLE pta_meta_institucional
add constraint fk_ptametins_idunimed_ptaunimed_idunimed
foreign key (idunidaddemedida)
references pta_unidad_medida(idunidadmedida);
#
alter TABLE pta_proceso_clave
add constraint fk_pta_procla_idpestra_ptaproest_idproes
foreign key (idprocesoestrategico)
references pta_proceso_estrategico(idproceso_estrategico);
#
alter TABLE pta_proceso_clave
add constraint fk_ptaprocla_idestpro_ptaestpro_idestpro
foreign key (idestructuraprogramatica)
references pta_estructura_programatica(idestructuraprogramatica);
#
alter TABLE puestos_personal
add constraint fk_pueper_clapue_pue_clapue
foreign key (clave_puesto)
references puestos(clave_puesto);
#
alter TABLE puestos_personal
add constraint fk_pueper_rfc_per_rfc
foreign key (rfc)
references personal(rfc);
#
alter TABLE requisiciones_materia
add constraint fk_reqmat_carr_carrs_carr
foreign key (carrera)
references carreras(carrera);
#
alter TABLE requisiciones_materia
add constraint fk_reqmat_mat_mats_mat
foreign key (materia)
references materias(materia);
#
alter TABLE seleccion_materias
add constraint fk_selmat_noctrl_alum_noctrl
foreign key (no_de_control)
references alumnos(no_de_control);
#
alter TABLE seleccion_materias
add constraint fk_selmat_per_peresc_per
foreign key (periodo)
references periodos_escolares(periodo);
#
alter TABLE seleccion_materias
add constraint fk_selmat_matgru_grup_matgru
foreign key (materia,grupo)
references grupos(materia,grupo);
#
alter TABLE seleccion_materias_bajas
add constraint fk_selmatbaj_noctrl_alum_noctrl
foreign key (no_de_control)
references alumnos(no_de_control);
#
alter TABLE seleccion_materias_bajas
add constraint fk_selmatbaj_per_peresc_per
foreign key (periodo)
references periodos_escolares(periodo);
#
alter TABLE seleccion_materias_bajas
add constraint fk_selmatbaj_matgru_grup_matgru
foreign key (materia,grupo)
references grupos(materia,grupo);
#
alter TABLE solicitudes_ex_especial
add constraint fk_solexesp_noctrl_alum_noctrl
foreign key (no_de_control)
references alumnos(no_de_control);
#
alter TABLE solicitudes_ex_especial
add constraint fk_solexesp_plaesttipeva_tipseva_plaesttipeva
foreign key (plan_de_estudios,tipo_evaluacion)
references tipos_evaluacion(plan_de_estudios,tipo_evaluacion);
#
alter TABLE tipos_evaluacion
add constraint fk_tipeva_plaest_plansest_planest
foreign key (plan_de_estudios)
references planes_de_estudio(plan_de_estudios);
#
alter TABLE titulaciones
add constraint fk_tit_per_peresc_per
foreign key (periodo)
references periodos_escolares(periodo);
#
alter TABLE titulaciones
add constraint fk_tit_noctrol_alum_noctrl
foreign key (no_de_control)
references alumnos(no_de_control);