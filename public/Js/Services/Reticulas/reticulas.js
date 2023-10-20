import config from '../../config.js';
import Requests from '../../Tools/request.js';

/**
 * @class
 * Servicio para hacer operaciones con las reticulas
 */
export default class Reticulas {
	/**
	 * Url para crear una reticula
	 * @type {String}
	 */
	urlCreate;

	/**
	 * Url para guardar el JSON de una reticula
	 * @type {String}
	 */
	urlSaveJson;

	/**
	 * Url para obtener el JSON de una reticula que la herramienta de reticulas comprende
	 * @type {String}
	 */
	urlGetJsonRendered;

	/**
	 * Instancia de la clase especializada en hacer peticiones AJAX
	 * @type {Requests}
	 */
	requests;

	constructor() {
		this.urlSaveJson = config.BASE_URL('reticulas/save-json-reticula');
		this.urlGetJsonRendered = config.BASE_URL('reticulas/get-json-rendered');
		this.urlCreate = config.BASE_URL('reticulas/create');

		this.requests = new Requests();
	}

	/**
	 * @description Función para crear una nueva reticula
	 *
	 * @param {string} name - Nombre de la reticula
	 * @param {string|Int8Array} idCarrera - Id de la carrera de la nueva reticula
	 * @param {string|Int8Array} idEspecialidad - Id de la especialidad para la nueva reticula
	 * @param {boolean} useReticula - Parametro para saber si se debe utilizar una reticula anterior como base para la nueva
	 * @param {string|null} idUseReticula - Id de la reticula que se usara como base (null si no se usuara una reticula como base)
	 * @returns {string|boolean} Retorna la url a la nueva reticula si la operacion fue exitosa, de lo contrario retorna false
	 */
	create = async (
		name,
		idCarrera,
		idEspecialidad,
		useReticula,
		idUseReticula,
	) => {
		const params = {
			nombre_reticula: name,
			id_carrera: idCarrera,
			id_especialidad: idEspecialidad,
			newReticula: useReticula,
			useReticula: idUseReticula,
		};
		const res = await this.requests.request(this.urlCreate, params);
		// Si la operacion fue exitosa
		if ('success' in res) {
			return res.urlNewReticula;
		}
		// Si no lo fue
		return false;
	};

	/**
	 * @description Función para guardar el JSON de una reticula
	 *
	 * @param {string|Int8Array} idRet - Id de la reticula
	 * @param {object} jsonRet - Objeto que representa la reticula a guardar
	 * @returns {boolean}
	 */
	saveJson = async (idRet, jsonRet) => {
		const res = await this.requests.request(this.urlSaveJson, {
			idReticula: idRet,
			jsonReticula: JSON.stringify(jsonRet),
		});
		// Si la operacion fue exitosa
		if ('success' in res) {
			return true;
		}
		// Si no lo fue
		return false;
	};

	/**
	 *
	 * @param {String|Int8Array} idRet - Id de la reticula a obtener el JSON
	 * @returns {object|boolean}
	 */
	getJsonRendered = async (idRet) => {
		const res = await this.requests.request(this.urlGetJsonRendered, {
			idReticula: idRet,
		});
		// Si la operacion fue exitosa
		if ('success' in res) {
			return res.reticula;
		}
		// Si no lo fue
		return false;
	};
}
