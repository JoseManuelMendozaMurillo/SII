/**
 * @class
 * Clase para crear etiquetas html
 */
export default class CreateHtmlElements {
	getContainer = (attributes = {}) => {
		return this.__getHtmlElement('div', attributes);
	};

	getLabel = (attributes = {}) => {
		return this.__getHtmlElement('label', attributes);
	};

	getInput = (attributes = {}) => {
		return this.__getHtmlElement('input', attributes);
	};

	getButton = (attributes = {}) => {
		return this.__getHtmlElement('button', attributes);
	};

	getSelect = (attributes = {}) => {
		return this.__getHtmlElement('select', attributes);
	};

	getOption = (attributes = {}) => {
		return this.__getHtmlElement('option', attributes);
	};

	getSpan = (attributes = {}) => {
		return this.__getHtmlElement('span', attributes);
	};

	getSvg = (attributes = {}) => {
		return this.__getHtmlElement('svg', attributes);
	};

	getPath = (attributes = {}) => {
		return this.__getHtmlElement('path', attributes);
	};

	/* Metodos privados */

	/**
	 * @private
	 * @name getHtmlElement
	 * @description Función para crear una nueva etiqueta html
	 *
	 * @param {String} tagElementHtml - Tag de la etiqueta html a crear
	 * @param {Object} attributes - Atributos que se le agregaran a la nueva etiqueta html
	 * @returns {htmlElement}
	 */
	__getHtmlElement = (tagElementHtml, attributes) => {
		try {
			if (this.__validateAttributes(attributes)) {
				// Si los atributos son validos creamos el elemento html y le agregamos los atributos
				const htmlElement = document.createElement(tagElementHtml);
				this.__setAttributes(htmlElement, attributes);
				return htmlElement;
			}
		} catch (error) {
			console.error(error);
			return undefined;
		}
	};

	/**
	 * @private
	 * @name setAttributes
	 * @description Función que agrega atributos a un elementos html
	 *
	 * @param {HTMLElement} htmlElement Elemento html al que se le agregaran los atributos
	 * @param {Object} attributes Atributos a agregar al elemento html
	 */
	__setAttributes(htmlElement, attributes) {
		for (const attribute in attributes) {
			// Verificar si la propiedad es propia del objeto y no se hereda del prototipo
			if (Object.prototype.hasOwnProperty.call(attributes, attribute)) {
				if (attribute === 'textContent') {
					htmlElement.textContent = attributes[attribute];
					continue;
				}

				if (attribute === 'htmlContent') {
					// Verificar si es html en formato string o es un nodo de JS (HTMLElement)
					if (attributes[attribute] instanceof Node) {
						htmlElement.innerHTML = attributes[attribute].outerHTML;
					}

					if (typeof attributes[attribute] === 'string') {
						htmlElement.innerHTML = attributes[attribute];
					}
					continue;
				}

				if (attribute === 'for') {
					htmlElement.htmlFor = attributes[attribute];
					continue;
				}

				if (attribute === 'selected') {
					if (attributes[attribute]) {
						htmlElement.setAttribute('selected', '');
					}
					continue;
				}

				// Agregamos el atributo al elemento html
				htmlElement.setAttribute(attribute, attributes[attribute]);
			}
		}
	}

	/**
	 * @private
	 * @name validateAttributes
	 * @description Función para validar que los atributos sean validos
	 *
	 * @param {Object} attributes - Variable con los atributos que se va a validar.
	 * @throws {Error} Lanza un error si los atributos no son un objeto.
	 * @returns {Boolean}
	 */
	__validateAttributes = (attributes) => {
		if (!this.__isObject(attributes)) {
			throw new Error(
				'Se requiere que los atributos se encuentren dentro de un objeto',
			);
		}
		return true;
	};

	/**
	 * @private
	 * @name isObject
	 * @description Función para saber si una variable es un objeto
	 *
	 * @param {any} variable Variable la cual se quiere validar que sea un objeto
	 * @return {Boolean}
	 */
	__isObject = (variable) => {
		return Object.prototype.toString.call(variable) === '[object Object]';
	};
}
