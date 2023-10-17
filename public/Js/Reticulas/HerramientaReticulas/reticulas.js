import RenderReticulas from './render-reticulas.js';
import Asignaturas from '../../Services/Reticulas/asignaturas.js';
import ServiceReticulas from '../../Services/Reticulas/reticulas.js';
import AlertModal from '../../Tools/alert-modal.js';
import ValidateReticulas from './validate-reticulas.js';

/**
 * @class
 * Clase para manipular el JSON que representa una reticula. Esta clase implementa el patron de
 * diseño observer y los cambios en esta clase pueden ser notificados a sus obervadores
 */
export default class Reticulas {
	/**
	 * Eventos personalizados para la gestión de la retícula.
	 * @event eventCreateReticula
	 * @event eventAddSemestre
	 * @event eventRemoveSemestre
	 * @event eventAddMateria
	 * @event eventRemoveMateria
	 * @event eventUpdateMateria
	 * @event eventChangeNameReticula
	 */
	eventCreateReticula;
	eventAddSemestre;
	eventRemoveSemestre;
	eventAddMateria;
	eventRemoveMateria;
	eventUpdateMateria;
	eventChangeNameReticula;

	/**
	 * Lista de observadores que responden a los eventos de la retícula.
	 * @type {Array}
	 * @memberOf Reticulas
	 */
	observadores = [];

	/**
	 * Objeto JSON que representa la estructura de la retícula educativa.
	 * @type {Object}
	 * @memberOf Reticulas
	 */
	reticulaJson = {};

	/**
	 * Instancia del servicio asignaturas encargado de traer datos de asignaturas.
	 * @type {Asignaturas}
	 * @memberOf Reticulas
	 */
	asignaturas;

	/**
	 * Instancia del servicio reticulas encargado de gestionar los datos de una reticula
	 * @type {ServiceReticulas};
	 * @memberof Reticula
	 */
	serviceReticulas;

	/**
	 * Instancia de las clase para validar reticulas
	 * @type {ValidateReticulas}
	 */
	validateReticulas;

	/**
	 * @name constructor
	 * @description El constructor se encarga de inicializar los parametros que necesitaremos tales
	 *              como la intancia de la clase que renderiza los cambios del JSON en la interfaz
	 *              y los eventos para cada cambio
	 *
	 * @param {String} idContainer Id del contenedor principal donde será renderizada la reticula
	 * @param {JSON} reticulaJson Archivo JSON que representa la reticula
	 */
	constructor(
		idContainer,
		reticulaJson = {
			name: null,
			status: 'Borrador',
			saved: true,
			idCarrera: null, // Creo que deberia ser por clave
			idEspecialidad: null, // Creo que deberia ser por clave
		},
	) {
		this.reticulaJson = reticulaJson;
		this.asignaturas = new Asignaturas();
		this.serviceReticulas = new ServiceReticulas();
		this.validateReticulas = new ValidateReticulas(this);

		/* Suscribimos una instancia de la clase render reticulas para que pueda observar 
           los cambios en la estructura del JSON y renderizarlos en la interfaz 
        */
		this.attach(new RenderReticulas(idContainer, this));

		// Creamos los eventos personalizados
		this.eventCreateReticula = new Event('createreticula');
		this.eventAddSemestre = new Event('addsemestre');
		this.eventRemoveSemestre = new Event('removesemestre');
		this.eventAddMateria = new Event('addmateria');
		this.eventRemoveMateria = new Event('removemateria');
		this.eventUpdateMateria = new Event('updatemateria');
		this.eventChangeNameReticula = new Event('changenamereticula');
	}

	/**
	 * @name attach
	 * @description Función para subscribir un observador de esta clase
	 *
	 * @param {Object} observador Instancia de la clase observadora
	 */
	attach(observador) {
		this.observadores.push(observador);
	}

	/**
	 * @name detach
	 * @description Función para eliminar la subscripción de un observador de esta clase
	 *
	 * @param {Object} observador Instancia de la clase observadora a eliminar
	 */
	detach(observador) {
		const index = this.observadores.indexOf(observador);
		if (index === -1) return;
		this.observadores.splice(index, 1);
	}

	/**
	 * @name notify
	 * @description Función para notificar a los subscriptores un cambio
	 *
	 * @param {Event} event Evento sobre el cambio que se produjo en la estructura del JSON (reticula)
	 */
	notify(event) {
		this.observadores.forEach((observador) => {
			observador.update(event);
		});
	}

	/**
	 * @name setReticula
	 * @description Funcion para agregar una reticula
	 *
	 * @param {JSON} reticula
	 */
	async setReticula(reticula) {
		this.reticulaJson = reticula;
		// console.log('Construyendo la reticula....');
		// await this.__renderReticula(this.reticulaJson);
		// console.log('Reticula construida');
		this.notify(this.eventCreateReticula);
		console.log(this.reticulaJson);
	}

	/**
	 * @name getReticula
	 * @description Función para obtener el JSON que representa la reticula
	 *
	 * @returns {JSON}
	 */
	getReticula() {
		return this.reticulaJson;
	}

	/**
	 * @name setName
	 * @description Función para agregar un nombre a la reticula
	 *
	 * @param {String} name Nombre de la reticula
	 */
	setName(name) {
		// Implemetar validacion del nombre
		// Validar la nomeclatura

		this.reticulaJson.name = name;
		this.setSaved(false);
		this.notify(this.eventChangeNameReticula);
	}

	/**
	 * @name getName
	 * @description Función para obtener el nombre de la reticula
	 *
	 * @returns {String}
	 */
	getName() {
		return this.reticulaJson.name;
	}

	/**
	 *
	 * @param {Boolean} isSaved
	 */
	setSaved(isSaved) {
		this.reticulaJson.saved = isSaved;
	}

	/**
	 *
	 * @returns {Boolean}
	 */
	getSaved() {
		return this.reticulaJson.saved;
	}

	/**
	 * @name getStatus
	 * @description Función para obtener en letras minusculas el estatus de la reticula
	 *
	 * @returns {String}
	 */
	getStatus = () => {
		return this.reticulaJson.status.toLowerCase();
	};

	/**
	 * @name addSemestre
	 * @description Función para agregar semestres a una reticula
	 *
	 * @param {Int} num Número de semestre a agregar. Por default es 1
	 */
	addSemestre(num = 1) {
		let lastSemestre = this.__getNumUltimoSemestre();
		for (let index = 0; index < num; index++) {
			lastSemestre++;
			// Definimos un núevo semestre en el json de la reticula
			Object.defineProperty(this.reticulaJson, `semestre${lastSemestre}`, {
				value: {},
				writable: true,
				enumerable: true,
				configurable: true,
			});
		}
		this.setSaved(false);
		this.notify(this.eventAddSemestre);
		console.log(this.getReticula());
	}

	/**
	 * @name removeSemestre
	 * @description Función para eliminar un semestre de la reticula
	 *
	 * @param {Int} numSemestre Número de semestre a eliminar
	 */
	removeSemestre(numSemestre) {
		// Si el semestre a eliminar no esta vacio
		if (Object.keys(this.reticulaJson[`semestre${numSemestre}`]).length > 0) {
			// Obtenemos los creditos del semestre que se eliminara
			const semDeleteCredits =
				this.reticulaJson[`semestre${numSemestre}`].totalCreditos;
			// Actualizamos el número de creditos de la reticula
			this.reticulaJson.totalCreditos =
				this.reticulaJson.totalCreditos - semDeleteCredits;
		}

		// Eliminamos el semestre
		delete this.reticulaJson[`semestre${numSemestre}`];

		// Hacemos la reasignación de claves
		const lastSemestre = this.__getNumUltimoSemestre();
		for (let index = numSemestre + 1; index <= lastSemestre; index++) {
			const materias = this.reticulaJson[`semestre${index}`];
			delete this.reticulaJson[`semestre${index}`];
			Object.defineProperty(this.reticulaJson, `semestre${index - 1}`, {
				value: materias,
				writable: true,
				enumerable: true,
				configurable: true,
			});
		}

		// Agregamos informacion al evento
		const details = {
			numSemestreDelete: numSemestre,
		};
		this.eventRemoveSemestre.detail = details;
		this.setSaved(false);
		this.notify(this.eventRemoveSemestre);
		console.log(this.getReticula());
	}

	getMateria() {
		// Se debe obtener a partir de que el usuario presione el la casilla de la materia
	}

	/**
	 * @description Función para agregar materias a un semestre
	 *
	 * @param {Int} numSemestre - Número de semestre al cual se agregaran las materias
	 * @param {Array} asignaturas - Array con las materias a agregar
	 */
	setMaterias(asignaturas, numSemestre) {
		// Validar la nomeclatura de la clave

		// Validamos que el semestre exista
		if (this.reticulaJson[`semestre${numSemestre}`] === undefined) return;

		// Validamos que las materias no excedan el número de creditos por semestre y reticula
		if (!this.validateReticulas.canAddAsignaturas(asignaturas, numSemestre)) {
			AlertModal.showError(
				'Numero maximo de creditos excedido',
				'Las materias exceden el número de creditos permitidos',
			);
			return;
		}

		// Construimos el objeto materia para agregarlo a la reticula
		const newAsignaturas = {};
		let addCredits = 0;
		asignaturas.forEach((asig) => {
			const horasPractica = parseInt(asig.horas_teoricas);
			const horasTeoria = parseInt(asig.horas_practicas);
			newAsignaturas[asig.clave_asignatura] = {
				name: asig.nombre_asignatura,
				horasTeoricas: horasTeoria,
				horasPracticas: horasPractica,
			};
			addCredits += horasTeoria + horasPractica;
		});

		// Agregamos las nuevas asignaturas al Json de la reticula
		const asignaturasReticula =
			this.reticulaJson[`semestre${numSemestre}`].materias;
		this.reticulaJson[`semestre${numSemestre}`].materias = Object.assign(
			{},
			asignaturasReticula,
			newAsignaturas,
		);
		// Actualizamos el número de creditos
		const isCreditsSem =
			this.reticulaJson[`semestre${numSemestre}`].totalCreditos;
		const isCreditsRet = this.reticulaJson.totalCreditos;

		const totalCreditsSem = isCreditsSem === undefined ? 0 : isCreditsSem;
		const totalCreditsRet = isCreditsRet === undefined ? 0 : isCreditsRet;
		this.reticulaJson[`semestre${numSemestre}`].totalCreditos =
			addCredits + totalCreditsSem;
		this.reticulaJson.totalCreditos = addCredits + totalCreditsRet;

		// Agregamos informacion al evento sobre las materias que se agregaron
		this.eventAddMateria.details = {
			semestre: numSemestre,
			addedAsignaturas: newAsignaturas,
		};
		this.setSaved(false);
		this.notify(this.eventAddMateria);
		console.log(this.getReticula());
	}

	/**
	 * @name removeMateria
	 * @description Función para eliminar una materia de un semestre
	 *
	 * @param {Int} numSemestre Número de semestre donde se encuentra la materia a eliminar
	 * @param {String} claveMateriaDelete Clave de la materia a eliminar
	 * @returns {Void}
	 */
	removeMateria(numSemestre, claveMateriaDelete) {
		// Obtenemos el objeto con las materias del semestre
		const semestre = this.reticulaJson[`semestre${numSemestre}`];
		const materiasBySemestre = semestre.materias;

		// Chacamos que la materia exista
		if (
			!Object.prototype.hasOwnProperty.call(
				materiasBySemestre,
				claveMateriaDelete,
			)
		) {
			return;
		}

		// Obtenemos los creditos de la materia a eliminar
		const matDeleteCredits =
			materiasBySemestre[claveMateriaDelete].horasPracticas +
			materiasBySemestre[claveMateriaDelete].horasTeoricas;
		// Eliminamos la materia
		delete materiasBySemestre[claveMateriaDelete];
		// Actualizamos los creditos totales del semestre
		semestre.totalCreditos = semestre.totalCreditos - matDeleteCredits;
		// Actualizamos los creditos totales de la reticula
		this.reticulaJson.totalCreditos =
			this.reticulaJson.totalCreditos - matDeleteCredits;

		// Agregamos informacion al evento
		const details = {
			materiaDelete: claveMateriaDelete,
			semestre: numSemestre,
		};
		this.eventRemoveMateria.details = details;
		this.setSaved(false);
		this.notify(this.eventRemoveMateria);
		console.log(this.getReticula());
	}

	/**
	 * @description Función para actualizar una materia
	 *
	 * @param {String} numSemestre - Número de semestre donde se encuentra la materia a eliminar
	 * @param {Object} newAsignatura - Objeto con la información de la nueva asignatura
	 * @param {String} claveOldAsignatura - Clave de la asignatura que se cambiara
	 */
	updateMateria(numSemestre, newAsignatura, claveOldAsignatura) {
		// Validamos que el semestre exista
		if (this.reticulaJson[`semestre${numSemestre}`] === undefined) return;

		// Validamos que las materias no excedan el número de creditos por semestre y reticula
		if (
			!this.validateReticulas.canUpdateAsignatura(
				newAsignatura,
				claveOldAsignatura,
				numSemestre,
			)
		) {
			AlertModal.showError(
				'Numero maximo de creditos excedido',
				'Las materia que se quiere agregar excede con el número de creditos permitidos',
			);
			return;
		}

		// Obtenemos el objeto con las materias del semestre
		const semestre = this.reticulaJson[`semestre${numSemestre}`];
		const materiasBySemestre = semestre.materias;

		// Obtenemos los creditos de la materia a eliminar
		const creditsDeleted =
			materiasBySemestre[claveOldAsignatura].horasPracticas +
			materiasBySemestre[claveOldAsignatura].horasTeoricas;
		// Obtenemos los creditos de la materia a agregar
		const horasPractica = parseInt(newAsignatura.horas_teoricas);
		const horasTeoria = parseInt(newAsignatura.horas_practicas);

		/* UPDATE DE LA MATERIA */
		// Agregamos la nueva materia en el lugar de la anterior
		delete materiasBySemestre[claveOldAsignatura];
		materiasBySemestre[newAsignatura.clave_asignatura] = {
			name: newAsignatura.nombre_asignatura,
			horasTeoricas: horasTeoria,
			horasPracticas: horasPractica,
		};

		// Actualizamos el número de creditos
		const isCreditsSem =
			this.reticulaJson[`semestre${numSemestre}`].totalCreditos;
		const isCreditsRet = this.reticulaJson.totalCreditos;

		const totalCreditsSem = isCreditsSem === undefined ? 0 : isCreditsSem;
		const totalCreditsRet = isCreditsRet === undefined ? 0 : isCreditsRet;
		this.reticulaJson[`semestre${numSemestre}`].totalCreditos =
			horasPractica + horasTeoria + totalCreditsSem - creditsDeleted;
		this.reticulaJson.totalCreditos =
			horasPractica + horasTeoria + totalCreditsRet - creditsDeleted;

		// Agregamos los detalles de la materia a actualizar
		this.eventUpdateMateria.details = {
			semestre: numSemestre,
			nuevaAsignatura: newAsignatura,
			claveAignaturaDelete: claveOldAsignatura,
		};
		this.setSaved(false);
		this.notify(this.eventUpdateMateria);
		console.log(this.getReticula());
	}

	/**
	 * @description Guardar una reticula
	 *
	 * @returns {Boolean}
	 */
	async save() {
		if (!this.validateReticulas.canSave()) {
			AlertModal.showError(
				'No se puede guardar',
				'La reticula no se puede guardar porque no paso las validaciones',
			);
			return false;
		}

		// Contrumos el objeto que se guardara en BD
		const reticulaJson = this.getReticula();
		const idReticula = 1;
		const reticualJsonSave = {};
		const semestres = Object.keys(reticulaJson).filter((key) =>
			key.startsWith('semestre'),
		);

		// Creamos el objeto que se guardara en BD
		reticualJsonSave.name = reticulaJson.name;
		reticualJsonSave.idCarrera = reticulaJson.idCarrera;
		reticualJsonSave.idEspecialidad = reticulaJson.idEspecialidad;
		reticualJsonSave.status = reticulaJson.status;
		semestres.forEach((semestre) => {
			const clavesMateriasBySemestre = Object.keys(
				reticulaJson[semestre].materias,
			);
			reticualJsonSave[semestre] = clavesMateriasBySemestre;
		});

		// Guardamos el JSON de la reticula en la BD
		const isSaved = await this.serviceReticulas.saveJson(
			idReticula,
			reticualJsonSave,
		);

		if (isSaved) {
			this.setSaved(true);
			AlertModal.showSuccess('¡Los cambios se guardarón!');
			return true;
		}

		AlertModal.showError('Upps', 'Ucurrio un error al guardar los cambios');
		return false;
	}

	/**
	 * @description Publicar la reticula
	 */
	piblicate() {
		// TO DO
	}

	/* Métodos privados */

	/**
	 * @name getNumUltimoSemestre
	 * @description Obtiene el ultimo número de semestre registrado en el json de la reticula
	 *
	 * @returns {Int} Ultimo número de semestre de la reticula
	 *
	 */
	__getNumUltimoSemestre() {
		const semestres = Object.keys(this.reticulaJson).filter((key) =>
			key.startsWith('semestre'),
		);

		if (semestres.length === 0) {
			return 0;
		}

		const numeroSemestreMasAlto = semestres.reduce(
			(numeroActual, semestreActual) => {
				const newNum = parseInt(semestreActual.split('semestre')[1]);
				return Math.max(numeroActual, newNum);
			},
			0,
		);
		return numeroSemestreMasAlto;
	}

	/**
	 * @private
	 * @description Función para renderizar una reticula y dejarla
	 *
	 * @param {JSON} reticula
	 */
	__renderReticula = async (reticula) => {
		// Obtenemos los semestres
		const semestres = Object.keys(reticula).filter((key) =>
			key.startsWith('semestre'),
		);

		// Procesamos los semestre
		let creditosReticula = 0;
		for (const semestre of semestres) {
			const materiasSemestre = reticula[semestre];
			const newSemestre = await this.__processMateriasSemestre(
				materiasSemestre,
			);

			// Hacemos la sumatoria de creditos para la carrera
			creditosReticula += newSemestre.totalCreditos;

			// Agregamos el nuevo semestre
			reticula[semestre] = newSemestre;
		}
		// Agregamos el total de creditos por semestre
		reticula.totalCreditos = creditosReticula;
	};

	/**
	 * @private
	 * @description Función encargada de procesar las materias de un semestre
	 *
	 * @param {Array} materias - Array con las claves de materias del semestre
	 * @returns {Object}
	 */
	async __processMateriasSemestre(materias) {
		const newDataSemestre = {
			materias: {},
			totalCreditos: null,
		};

		// Recorremos el arreglo con las claves de materia del semestre
		let creditosSemestre = 0;
		for (const claveMateria of materias) {
			// Obtenemos del backen los datos de cada materia y los transformamos
			const dataMateria = await this.asignaturas.getByClave(claveMateria);
			const materia = this.__transformDataMaterias(dataMateria);

			// Agregamos la materia al subobjeto materias usando su clave como propiedad
			newDataSemestre.materias[claveMateria] = materia[claveMateria];

			// Hacemos la sumatoria de los creditos de cada materia para obtener el total de creditos del semestre
			creditosSemestre +=
				materia[claveMateria].horasTeoricas +
				materia[claveMateria].horasPracticas;
		}

		newDataSemestre.totalCreditos = creditosSemestre;
		return newDataSemestre;
	}

	/**
	 * @private
	 * @description Función para transformar los datos de una materia
	 *
	 * @param {Object} dataMateria - Todos los datos de la materia
	 * @returns {Object}
	 */
	__transformDataMaterias = (dataMateria) => {
		const clave = dataMateria.clave_asignatura;
		const materia = {};
		materia[clave] = {
			name: dataMateria.nombre_asignatura,
			horasTeoricas: parseInt(dataMateria.horas_teoricas),
			horasPracticas: parseInt(dataMateria.horas_practicas),
		};
		return materia;
	};

	/**
	 * @private
	 * @description Función para calcular el número de creditos de un semestre
	 *
	 * @param {Object} materias - Materias del semestre
	 * @returns {Int}
	 */
	__getNumCreditsBySemestre(materias) {
		const clavesMaterias = Object.keys(materias);
		let totalCredits = 0;
		clavesMaterias.forEach((clave) => {
			totalCredits +=
				materias[clave].horasPracticas + materias[clave].horasTeoricas;
		});
		return totalCredits;
	}
}
