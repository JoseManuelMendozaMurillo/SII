import Reticulas from './HerramientaReticulas/reticulas.js';

$(document).ready(async function () {
	const reticula = new Reticulas('reticula');
	const reticulaJson = {
		name: 'ISIC-DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES',
		idCarrera: 1,
		idEspecialidad: 5,
		status: 'Borrador',
		semestre1: [
			'AED-1285',
			'ACA-0907',
			'AEF-1041',
			'SCH-1024',
			'ACC-0906',
			'ACF-0901',
		],

		semestre2: [
			'ACF-0902',
			'AED-1286',
			'AEC-1008',
			'AEC-1058',
			'ACF-0903',
			'AEF-1052',
		],

		semestre3: [
			'SCC-1005',
			'SCF-1006',
			'ACD-0908',
			'SCC-1013',
			'AED-1026',
			'ACF-0904',
		],

		semestre4: [
			'ACF-0905',
			'SCC-1017',
			'SCD-1027',
			'AEF-1031',
			'SCD-1022',
			'SCD-1018',
			'SCD-1003',
		],
		semestre5: [
			'SCC-1010',
			'SCC-1007',
			'SCA-1025',
			'AEC-1061',
			'SCC-1019',
			'SCD-1015',
			'AEC-1034',
		],

		semestre6: [
			'SCD-1016',
			'SCD-1021',
			'SCA-1026',
			'SCB-1001',
			'SCD-1011',
			'SCC-1014',
			'ADD-2301',
		],
		semestre7: [
			'SCD-1004',
			'ADF-2305',
			'SCC-1023',
			'SCG-1009',
			'ACA-0909',
			'AEB-1055',
			'SCC-1012',
		],

		semestre8: ['SCA-1002', 'ACA-0910', 'DWD-2002', 'DWD-2001', 'DWD-2004'],
	};
	const reticulaJsonRenderizada = {
		name: 'ISIC-DESARROLLO PARA LA WEB Y APLICACIONES PARA DISPOSITIVOS MOVILES',
		idCarrera: 1,
		idEspecialidad: 5,
		status: 'Borrador',
		semestre1: {
			materias: {
				'AED-1285': {
					name: 'FUNDAMENTOS DE PROGRAMACIÓN',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'ACA-0907': {
					name: 'TALLER DE ÉTICA',
					horasTeoricas: 0,
					horasPracticas: 4,
				},
				'AEF-1041': {
					name: 'MATEMÁTICAS DISCRETAS',
					horasTeoricas: 3,
					horasPracticas: 2,
				},
				'SCH-1024': {
					name: 'TALLER DE ADMINISTRACIÓN',
					horasTeoricas: 1,
					horasPracticas: 3,
				},
				'ACC-0906': {
					name: 'FUNDAMENTOS DE INVESTIGACIÓN',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'ACF-0901': {
					name: 'CÁLCULO DIFERENCIAL',
					horasTeoricas: 3,
					horasPracticas: 2,
				},
			},
			totalCreditos: 27,
		},
		semestre2: {
			materias: {
				'ACF-0902': {
					name: 'CÁLCULO INTEGRAL',
					horasTeoricas: 3,
					horasPracticas: 2,
				},
				'AED-1286': {
					name: 'PROGRAMACIÓN ORIENTADA A OBJETOS',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'AEC-1008': {
					name: 'CONTABILIDAD FINANCIERA',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'AEC-1058': {
					name: 'QUÍMICA',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'ACF-0903': {
					name: 'ÁLGEBRA LINEAL',
					horasTeoricas: 3,
					horasPracticas: 2,
				},
				'AEF-1052': {
					name: 'PROBABILIDAD Y ESTADÍSTICA',
					horasTeoricas: 3,
					horasPracticas: 2,
				},
			},
			totalCreditos: 28,
		},
		semestre3: {
			materias: {
				'SCC-1005': {
					name: 'CULTURA EMPRESARIAL',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'SCF-1006': {
					name: 'FÍSICA GENERAL',
					horasTeoricas: 3,
					horasPracticas: 2,
				},
				'ACD-0908': {
					name: 'DESARROLLO SUSTENTABLE',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'SCC-1013': {
					name: 'INVESTIGACIÓN DE OPERACIONES',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'AED-1026': {
					name: 'ESTRUCTURA DE DATOS',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'ACF-0904': {
					name: 'CÁLCULO VECTORIAL',
					horasTeoricas: 3,
					horasPracticas: 2,
				},
			},
			totalCreditos: 28,
		},
		semestre4: {
			materias: {
				'ACF-0905': {
					name: 'ECUACIONES DIFERENCIALES',
					horasTeoricas: 3,
					horasPracticas: 2,
				},
				'SCC-1017': {
					name: 'MÉTODOS NUMÉRICOS',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'SCD-1027': {
					name: 'TÓPICOS AVANZADOS DE PROGRAMACIÓN',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'AEF-1031': {
					name: 'FUNDAMENTOS DE BASE DE DATOS',
					horasTeoricas: 3,
					horasPracticas: 2,
				},
				'SCD-1022': {
					name: 'SIMULACIÓN',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'SCD-1018': {
					name: 'PRINCIPIOS ELÉCTRICOS Y APLICACIONES DIGITALES',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'SCD-1003': {
					name: 'ARQUITECTURA DE COMPUTADORAS',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
			},
			totalCreditos: 34,
		},
		semestre5: {
			materias: {
				'SCC-1010': {
					name: 'GRAFICACIÓN',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'SCC-1007': {
					name: 'FUNDAMENTOS DE ING. DE SOFTWARE',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'SCA-1025': {
					name: 'TALLER DE BASE DE DATOS',
					horasTeoricas: 0,
					horasPracticas: 4,
				},
				'AEC-1061': {
					name: 'SISTEMAS OPERATIVOS',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'SCC-1019': {
					name: 'PROGRAMACIÓN LÓGICA Y FUNCIONAL',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'SCD-1015': {
					name: 'LENGUAJES Y AUTÓMATAS I',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'AEC-1034': {
					name: 'FUNDAMENTOS DE TELECOMUNICACIONES',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
			},
			totalCreditos: 29,
		},
		semestre6: {
			materias: {
				'SCD-1016': {
					name: 'LENGUAJES Y AUTÓMATAS II',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'SCD-1021': {
					name: 'REDES DE COMPUTADORAS',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'SCA-1026': {
					name: 'TALLER DE SISTEMAS OPERATIVOS',
					horasTeoricas: 0,
					horasPracticas: 4,
				},
				'SCB-1001': {
					name: 'ADMINISTRACIÓN DE BASE DE DATOS',
					horasTeoricas: 1,
					horasPracticas: 4,
				},
				'SCD-1011': {
					name: 'INGENIERÍA DE SOFTWARE',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'SCC-1014': {
					name: 'LENGUAJES DE INTERFAZ',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'ADD-2301': {
					name: 'TECNOLOGÍAS DE DESARROLLO PARA DISPOSITIVOS MÓVILES',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
			},
			totalCreditos: 33,
		},
		semestre7: {
			materias: {
				'SCD-1004': {
					name: 'CONMUTACIÓN Y ENRUTAMIENTO EN REDES DE DATOS',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'ADF-2305': {
					name: 'COMPUTO EN LA NUBE',
					horasTeoricas: 3,
					horasPracticas: 2,
				},
				'SCC-1023': {
					name: 'SISTEMAS PROGRAMABLES',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
				'SCG-1009': {
					name: 'GESTIÓN DE PROY. DE SOFTWARE',
					horasTeoricas: 3,
					horasPracticas: 3,
				},
				'ACA-0909': {
					name: 'TALLER DE INVESTIGACIÓN I',
					horasTeoricas: 0,
					horasPracticas: 4,
				},
				'AEB-1055': {
					name: 'PROGRAMACIÓN WEB',
					horasTeoricas: 1,
					horasPracticas: 4,
				},
				'SCC-1012': {
					name: 'INTELIGENCIA ARTIFICIAL',
					horasTeoricas: 2,
					horasPracticas: 2,
				},
			},
			totalCreditos: 33,
		},
		semestre8: {
			materias: {
				'SCA-1002': {
					name: 'ADMINISTRACIÓN DE REDES',
					horasTeoricas: 0,
					horasPracticas: 4,
				},
				'ACA-0910': {
					name: 'TALLER DE INVESTIGACIÓN II',
					horasTeoricas: 0,
					horasPracticas: 4,
				},
				'DWD-2002': {
					name: 'GESTORES DE CONTENIDO CMS DE SOFTWARE LIBRE',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'DWD-2001': {
					name: 'HERRAMIENTAS EMERGENTES PARA DESARROLLO EN LA WEB',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
				'DWD-2004': {
					name: 'PROGRAMACIÓN WEB PARA DISPOSITIVOS MÓVILES',
					horasTeoricas: 2,
					horasPracticas: 3,
				},
			},
			totalCreditos: 23,
		},
		totalCreditos: 235,
	};
	await reticula.setReticula(reticulaJsonRenderizada);
});
