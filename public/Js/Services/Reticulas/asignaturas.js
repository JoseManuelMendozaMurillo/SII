import config from '../../config.js';

/**
 * @class
 * Clase para gestionar asignaturas desde JS
 */
export default class Asignaturas {
	urlGetBasicas;
	urlGetByCarrera;
	urlGetByEspecialidad;
	urlGetByClave;

	constructor() {
		// Creamos las rutas
		this.urlGetBasicas = config.BASE_URL('reticulas/asignaturas/get-basicas');
		this.urlGetByCarrera = config.BASE_URL(
			'reticulas/asignaturas/get-by-carrera',
		);
		this.urlGetByEspecialidad = config.BASE_URL(
			'reticulas/asignaturas/get-by-especialidad',
		);
		this.urlGetByClave = config.BASE_URL('reticulas/asignaturas/get-by-clave');
	}

	/**
	 * @name getBasicas
	 * @description Función para obtener las asignaturas basicas (que se imparten a mas de una carrera)
	 *
	 * @returns {Promise<Array>}
	 */
	getBasicas = async () => {
		const asigBasicas = await this.__request(this.urlGetBasicas);
		return asigBasicas.data;
	};

	/**
	 * @name getGenericas
	 * @description Función para obtener las materias genericas
	 *
	 * @returns {Promise<Array>}
	 */
	getGenericas = async () => {
		// TO DO
	};

	/**
	 * @name getEspecificas
	 * @description Función para obtener las materias especificas (de especialidad)
	 *
	 * @returns {Promise<Array>}
	 */
	getEspecificas = async () => {
		// TO DO
	};

	/**
	 * @name getByReticula
	 * @description Función para obtener las materias de una reticula
	 *
	 * @param {String|Int} idReticula
	 * @return {Promise<Array>}
	 */
	getByReticula = async (idReticula) => {
		// TO DO
	};

	/**
	 * @name getBasicasByReticula
	 * @description Función para obtener las materias basicas de una reticula
	 *
	 * @param {String|Int} idReticula
	 * @return {Promise<Array>}
	 */
	getBasicasByReticula = async (idReticula) => {
		// TO DO
	};

	/**
	 * @name getGenericasByReticula
	 * @description Función para obtener las materias genericas de una reticula
	 *
	 * @param {String|Int} idReticula
	 * @return {Promise<Array>}
	 */
	getGenericasByReticula = async (idReticula) => {
		// TO DO
	};

	/**
	 * @name getGenericasByReticula
	 * @description Función para obtener las materias especificas (de especialidad) de una reticula
	 *
	 * @param {String|Int} idReticula
	 * @return {Promise<Array>}
	 */
	getEspecificasByReticula = async (idReticula) => {
		// TO DO
	};

	/**
	 * @name getByCarrera
	 * @description Función para obtener las asignaturas de una carrera
	 *
	 * @param {String|Int} idCarrera
	 * @return {Promise<Array>}
	 */
	getByCarrera = async (idCarrera) => {
		const asigCarrera = await this.__request(this.urlGetByCarrera, {
			id: idCarrera,
			onlyGenericas: false,
		});
		return asigCarrera.data;
	};

	/**
	 * @name getBasicasByCarrera
	 * @description Función para obtener las materias basicas de una carrera
	 *
	 * @param {String|Int} idCarrera
	 * @return {Promise<Array>}
	 */
	getBasicasByCarrera = async (idCarrera) => {
		// TO DO
	};

	/**
	 * @name getGenericas
	 * @description Función para obtener las asignaturas genericas de una carrera
	 *
	 * @param {String|Int} idCarrera
	 * @return {Promise<Array>}
	 */
	getGenericasByCarrera = async (idCarrera) => {
		const asigCarrera = await this.__request(this.urlGetByCarrera, {
			id: idCarrera,
			onlyGenericas: true,
		});
		return asigCarrera.data;
	};

	/**
	 * @name getByEspecialidad
	 * @description Función para obtener la asignaturas de una especialidad
	 *
	 * @param {String|Int} idEspecialidad
	 * @returns {Promise<Array>}
	 */
	getByEspecialidad = async (idEspecialidad) => {
		const asigEspecialidad = await this.__request(this.urlGetByEspecialidad, {
			id: idEspecialidad,
		});
		return asigEspecialidad.data;
	};

	/**
	 * @name getByClave
	 * @description Función para obtener una asignaturas por su clave
	 *
	 * @param {String} asigClave - Clave de la asignatura
	 * @returns {Promise<Array>}
	 */
	getByClave = async (asigClave) => {
		const asig = await this.__request(this.urlGetByClave, {
			clave: asigClave,
		});
		return asig.data;
	};

	/* Metodos privados */

	/**
	 * @private
	 * @name request
	 * @description Función encargada de hacer las peticion AJAX
	 *
	 * @param {String} url - URL de la petición
	 * @param {Object} params - Parametros de la peticion
	 * @return {Promise<Array|undefined>}
	 */
	__request = async (url, params = {}) => {
		try {
			const options = this.__constructOptionsRequest(params);
			const response = await fetch(url, options);
			if (!response.ok) {
				const error = await response.json();
				throw new Error(error.error);
			}
			const data = await response.json(); // Parsear la respuesta JSON
			return data;
		} catch (error) {
			console.error(error);
			return undefined;
		}
	};

	/**
	 * @private
	 * @name constructOptionsRequest
	 * @description Función que permite costruir el objeto de opciones para una peticion AJAX
	 *              utilizando la API nativa de JS fetch
	 *
	 * @param {Object} params - Parametros para la petición
	 * @return {Object}
	 */
	__constructOptionsRequest(params = {}) {
		const options = {
			method: 'POST',
			headers: {
				'X-Requested-With': 'XMLHttpRequest',
			},
		};

		// Si existen parametros los agregamos al objeto de opciones
		if (Object.keys(params).length > 0) {
			// Convertir el objeto con los parametros a una estructura de formulario
			options.body = this.__emulateForm(params);
		}
		return options;
	}

	/**
	 * @name emulateForm
	 * @description Función para construir un formData a partir de los parametros
	 *
	 * @param {Object} params - Objeto con los 'inputs' del form
	 * @returns {FormData}
	 */
	__emulateForm = (params = {}) => {
		const form = new FormData();

		// Si los parametros estan vacios retornamos el form vacio
		if (Object.keys(params).length === 0) return form;

		// Recorremos los parametros para crear los 'inputs' del form
		const claves = Object.keys(params);
		for (const clave of claves) {
			form.append(clave, params[clave]);
		}
		return form;
	};
}
