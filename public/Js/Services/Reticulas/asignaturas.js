import Requests from '../../Tools/request.js';
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

	/**
	 * Instancia de la clase especializada en hacer peticiones AJAX
	 * @type {Requests}
	 */
	requests;

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

		this.requests = new Requests();
	}

	/**
	 * @name getBasicas
	 * @description Función para obtener las asignaturas basicas (que se imparten a mas de una carrera)
	 *
	 * @returns {Promise<Array>}
	 */
	getBasicas = async () => {
		const asigBasicas = await this.requests.request(this.urlGetBasicas);
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
		const asigCarrera = await this.requests.request(this.urlGetByCarrera, {
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
		const asigCarrera = await this.requests.request(this.urlGetByCarrera, {
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
		const asigEspecialidad = await this.requests.request(
			this.urlGetByEspecialidad,
			{
				id: idEspecialidad,
			},
		);
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
		const asig = await this.requests.request(this.urlGetByClave, {
			clave: asigClave,
		});
		return asig.data;
	};
}
