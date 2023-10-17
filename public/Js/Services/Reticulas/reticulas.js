import config from '../../config.js';
import Requests from '../../Tools/request.js';

/**
 * @class
 * Servicio para hacer operaciones con las reticulas
 */
export default class Reticulas {
	// TO DO

	/**
	 * Url para guardar el JSON de una reticula
	 * @type {String}
	 */
	urlSaveJson;

	/**
	 * Instancia de la clase especializada en hacer peticiones AJAX
	 * @type {Requests}
	 */
	requests;

	constructor() {
		this.urlSaveJson = config.BASE_URL('reticulas/save-json-reticula');

		this.requests = new Requests();
	}

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
}
