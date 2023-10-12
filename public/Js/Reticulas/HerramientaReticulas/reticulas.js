import RenderReticulas from './render-reticulas.js';

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
	 * @event eventRemoveMateria
	 * @event eventChangeNameReticula
	 */
	eventCreateReticula;
	eventAddSemestre;
	eventRemoveSemestre;
	eventRemoveMateria;
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
	 * @name constructor
	 * @description El constructor se encarga de inicializar los parametros que necesitaremos tales
	 *              como la intancia de la clase que renderiza los cambios del JSON en la interfaz
	 *              y los eventos para cada cambio
	 *
	 * @param {String} idContainer Id del contenedor principal donde será renderizada la reticula
	 * @param {JSON} reticulaJson Archivo JSON que representa la reticula
	 */
	constructor(idContainer, reticulaJson = { name: null, status: 'Borrador' }) {
		this.reticulaJson = reticulaJson;
		/* Suscribimos una instancia de la clase render reticulas para que pueda observar 
           los cambios en la estructura del JSON y renderizarlos en la interfaz 
        */
		this.attach(new RenderReticulas(idContainer, this));

		// Creamos los eventos personalizados
		this.eventCreateReticula = new Event('createreticula');
		this.eventAddSemestre = new Event('addsemestre');
		this.eventRemoveSemestre = new Event('removesemestre');
		this.eventRemoveMateria = new Event('removemateria');
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
	setReticula(reticula) {
		this.reticulaJson = reticula;
		this.notify(this.eventCreateReticula);
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
		// Validar la nomeclatura
		this.reticulaJson.name = name;
		// TO DO
		// Implemetar validacion del nombre
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
				value: [],
				writable: true,
				enumerable: true,
				configurable: true,
			});
		}
		this.notify(this.eventAddSemestre);
	}

	/**
	 * @name removeSemestre
	 * @description Función para eliminar un semestre de la reticula
	 *
	 * @param {Int} numSemestre Número de semestre a eliminar
	 */
	removeSemestre(numSemestre) {
		delete this.reticulaJson[`semestre${numSemestre}`];
		const lastSemestre = this.__getNumUltimoSemestre();
		// Hacemos la reasignación de claves
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
		this.notify(this.eventRemoveSemestre);
	}

	getMateria() {
		// Se debe obtener a partir de que el usuario presione el la casilla de la materia
	}

	setMateria(numSemestre, claveMateria) {
		// Validar la nomeclatura de la clave

		// Validamos que el semestre exista
		if (this.reticulaJson[`semestre${numSemestre}`] === undefined) return;

		this.reticulaJson[`semestre${numSemestre}`].push(claveMateria);
		console.log(this.reticulaJson);
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
		// Obtenemos el array de materias
		let newMateriasBySemestre = this.reticulaJson[`semestre${numSemestre}`];

		// Validamos que el semestre exista
		if (newMateriasBySemestre === undefined) return;

		// Eliminamos la materia
		newMateriasBySemestre = newMateriasBySemestre.filter(
			(claveMateria) => claveMateria !== claveMateriaDelete,
		);

		// Guardamos el cambio
		this.reticulaJson[`semestre${numSemestre}`] = newMateriasBySemestre;

		// Agregamos informacion al evento
		const details = {
			materiaDelete: claveMateriaDelete,
			semestre: numSemestre,
		};
		this.eventRemoveMateria.details = details;
		this.notify(this.eventRemoveMateria);
	}

	updateMateria(numSemestre, oldClaveMateria, newClaveMateria) {
		this.removeMateria(numSemestre, oldClaveMateria);
		this.setMateria(numSemestre, newClaveMateria);
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
}
