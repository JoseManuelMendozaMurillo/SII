/**
 * @class
 * Clase para validar las reglas de las reticula
 */
export default class ValidateReticulas {
	// Reglas de validación
	maxCreditsBySemestre;
	minCreditsBySemestre;
	maxCreditsByReticula;

	/**
	 * Instancia de la clase reticulas
	 * @type {Reticulas}
	 */
	reticulas;

	constructor(reticulas) {
		this.maxCreditsBySemestre = 35;
		this.minCreditsBySemestre = 20;
		this.maxCreditsByReticula = 260;
		this.reticulas = reticulas;
	}

	/**
	 * @description Función para saber si se pueden agregar materias a la reticula
	 *
	 * @param {Array<object>|object} asignaturas - Materias que se quieren agregar
	 * @param {Int} numSemestre - Número de semestre al cual se quieren agregar las materias
	 *
	 * @returns {Boolean}
	 */
	canAddAsignaturas = (asignaturas, numSemestre) => {
		// Normalizar objetos
		if (
			asignaturas !== null &&
			!Array.isArray(asignaturas) &&
			typeof asignaturas === 'object'
		) {
			asignaturas = [asignaturas];
		}

		// Obtenemos el número de creditos que se quiere agregar
		console.log(asignaturas);
		let numCredits = 0;
		asignaturas.forEach((asig) => {
			numCredits +=
				parseInt(asig.horas_teoricas) + parseInt(asig.horas_practicas);
		});
		// Obtenemos los datos para hacer la validación de los creditos
		const reticulaJson = this.reticulas.getReticula();

		const isCreditsSem = reticulaJson[`semestre${numSemestre}`].totalCreditos;
		const isCreditsRet = reticulaJson.totalCreditos;

		const creditsSemestre = isCreditsSem === undefined ? 0 : isCreditsSem;
		const creditsReticula = isCreditsRet === undefined ? 0 : isCreditsRet;

		const totalCreditsSem = creditsSemestre + numCredits;
		const totalCreditsRet = creditsReticula + numCredits;

		// Hacemos las validaciones
		if (totalCreditsSem > this.maxCreditsBySemestre) {
			return false;
		}
		if (totalCreditsRet > this.maxCreditsByReticula) {
			return false;
		}

		return true;
	};

	/**
	 * @description Función para saber si se pueden actualizar una materia de la reticula
	 *
	 * @param {object} asignatura - Materias que se quieren agregar
	 * @param {String} claveOldAsignatura - Clave de la materia que se cambiara
	 * @param {Int|String} numSemestre - Número de semestre al cual se quiere agregar la materia
	 *
	 * @returns {Boolean}
	 */
	canUpdateAsignatura = (asignatura, claveOldAsignatura, numSemestre) => {
		const reticulaJson = this.reticulas.getReticula();

		// Obtenemos el número de creditos que se eliminaran
		const materiaDelete =
			reticulaJson[`semestre${numSemestre}`].materias[claveOldAsignatura];
		const numDeleteCredits =
			materiaDelete.horasPracticas + materiaDelete.horasTeoricas;

		// Obtenemos el número de creditos que se quiere agregar
		const numAddCredits =
			parseInt(asignatura.horas_teoricas) +
			parseInt(asignatura.horas_practicas);

		// Obtenemos los datos para hacer la validación de los creditos
		const isCreditsSem = reticulaJson[`semestre${numSemestre}`].totalCreditos;
		const isCreditsRet = reticulaJson.totalCreditos;

		const creditsSemestre = isCreditsSem === undefined ? 0 : isCreditsSem;
		const creditsReticula = isCreditsRet === undefined ? 0 : isCreditsRet;

		const totalCreditsSem = creditsSemestre - numDeleteCredits + numAddCredits;
		const totalCreditsRet = creditsReticula - numDeleteCredits + numAddCredits;

		// Hacemos las validaciones
		if (totalCreditsSem > this.maxCreditsBySemestre) {
			return false;
		}
		if (totalCreditsRet > this.maxCreditsByReticula) {
			return false;
		}

		return true;
	};

	/**
	 * @description Función para mostrar un modal de error
	 *
	 * @param {String} titleMessage - Titulo del modal de error
	 * @param {String} message - Mensaje del modal de error
	 */
	showErrorMessage = (titleMessage, message) => {
		Swal.fire({
			icon: 'error',
			title: titleMessage,
			text: message,
		});
	};
}
