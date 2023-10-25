/**
 * @class
 * Clase para trabajar con peticiones AJAX
 */
export default class Requests {
	/**
	 * Constante para enviar los datos de la petición como si fuera un formulario
	 * @type {int}
	 */
	static SENDDATALIKEFORM = 1;

	/**
	 * Constante para enviar los datos de la petición como JSON
	 * @type {int}
	 */
	static SENDDATALIKEJSON = 2;

	/**
	 * @name request
	 * @description Función encargada de hacer las peticion AJAX
	 *
	 * @param {String} url - URL de la petición
	 * @param {object} params - Parametros de la peticion
	 * @param {int} typeSendData- Bandera para saber si se deben enviar los parametros como Json o como formulario
	 * @param {object} headers - Cabezeras de la peticion
	 * @return {Promise<Array|undefined>}
	 */
	request = async (
		url,
		params = {},
		typeSendData = this.SENDDATALIKEFORM,
		headers = {},
	) => {
		try {
			const options = this.__constructOptionsRequest(
				params,
				typeSendData,
				headers,
			);
			const response = await fetch(url, options);
			if (!response.ok) {
				const errorMessage = await this.__getMessageError(response);
				throw new Error(errorMessage);
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
	 * @description Función para obtener un mensaje de error en una repsuesta http mala
	 *
	 * @param {Response}
	 * @returns {String}
	 */
	__getMessageError = async (response) => {
		console.log(typeof response);
		let errorMessage = 'Error en la solicitud';
		try {
			const errorData = await response.json();
			if (errorData.error) {
				errorMessage = `Error: ${errorData.error}`;
			}
			return errorMessage;
		} catch (jsonError) {
			return 'Error al parsear la respuesta JSON: ' + jsonError;
		}
	};

	/**
	 * @private
	 * @name constructOptionsRequest
	 * @description Función que permite costruir el objeto de opciones para una peticion AJAX
	 *              utilizando la API nativa de JS fetch
	 *
	 * @param {object} params - Parametros para la petición
	 * @param {int} typeSendData- Bandera para saber si se deben enviar los parametros como Json o como formulario
	 * @param {object} headers - Cabezeras de la peticion
	 * @return {object}
	 */
	__constructOptionsRequest(
		params = {},
		typeSendData = this.SENDDATALIKEFORM,
		headers = {},
	) {
		let options;
		if (Object.keys(headers).length === 0) {
			options = {
				method: 'POST',
				headers: {
					'X-Requested-With': 'XMLHttpRequest',
				},
			};
		} else {
			options = { ...headers };
		}

		// Si existen parametros los agregamos al objeto de opciones
		if (Object.keys(params).length > 0) {
			options.body =
				typeSendData === this.SENDDATALIKEFORM
					? this.__emulateForm(params)
					: JSON.stringify(params);
		}
		return options;
	}

	/**
	 * @private
	 * @name emulateForm
	 * @description Función para construir un formData a partir de los parametros
	 *
	 * @param {object} params - Objeto con los 'inputs' del form
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
