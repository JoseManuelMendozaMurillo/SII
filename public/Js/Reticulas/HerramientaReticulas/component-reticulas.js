import SelectorMaterias from '../HerramientaSeleccionarMaterias/selector-materias.js';
import CreateHtmlElements from '../../Tools/create-html-elements.js';
import AlertModal from '../../Tools/alert-modal.js';
import Asignaturas from '../../Services/Reticulas/asignaturas.js';
import config from '../../config.js';

/**
 * @class
 * Clase constructora de componentes para las reticulas
 */
export default class ComponentReticulas {
	/**
	 * Instancia de la clase Reticulas para obtener informacion.
	 * @type {Reticulas}
	 */
	reticulas;

	/**
	 * Instancia de la clase SelectorMaterias para la selección de materias.
	 * @type {SelectorMaterias}
	 */
	selectorMaterias;

	/**
	 * Instancia del servicio asignaturas
	 * @type {Asignaturas}
	 */
	asignaturas;
	allAsignaturas;

	/**
	 * Instancia de la clase CreateHtmlElements para la creación de elementos HTML.
	 * @type {CreateHtmlElements}
	 */
	htmlElements;

	constructor(reticulas) {
		this.reticulas = reticulas;
		this.htmlElements = new CreateHtmlElements();
		this.asignaturas = new Asignaturas();
		this.selectorMaterias = null;
		this.allAsignaturas = null;
	}

	/**
	 * @name getInputNameReticula
	 * @description Función para obtener el input donde se mostrara el nombre de la reticula
	 *
	 * @returns {String} Html en formato string
	 */
	getInputNameReticula = () => {
		// Creamos el input
		const inputNameReticula = this.htmlElements.getInput({
			id: 'nameReticula',
			class: 'form-control input-name-reticula',
			type: 'text',
			placeholder: '0001-2221',
		});
		// desactivamos el input si el estatus de la reticula es Borrador
		if (this.reticulas.getStatus() !== 'borrador') {
			inputNameReticula.disabled = true;
		}

		// Creamos el label
		const labelNameReticula = this.htmlElements.getLabel({
			class: 'form-label label-input-name-reticula',
			for: 'nameReticula',
			textContent: 'Nombre de la reticula: *',
		});

		return labelNameReticula.outerHTML + inputNameReticula.outerHTML;
	};

	/**
	 * @name getInputNameReticula
	 * @description Función para obtener el input donde se mostrara el estatus de la reticula
	 *
	 * @returns {String} Html en formato string
	 */
	getLabelStatusReticula = () => {
		// Creamos el input
		const labelStatusReticula = this.htmlElements.getContainer({
			class: 'label-reticula',
			id: 'statusReticula',
		});

		return labelStatusReticula;
	};

	/**
	 * @name getHeader
	 * @description Función para obtener el header de la reticula (donde se muestra el nombre y el
	 * 				estatus de la reticula)
	 *
	 * @returns {HTMLElement}
	 */
	getHeader = () => {
		const header = this.htmlElements.getContainer({
			id: 'header',
			class: 'header',
		});

		const containerInputNameReticula = this.htmlElements.getContainer({
			class: 'item-header',
			htmlContent: this.htmlElements.getContainer({
				class: 'container-input-name-reticula',
				htmlContent: this.getInputNameReticula(),
			}),
		});

		// Si el estatus es borrador, agregamos el listener para cambiar el nombre de la reticula
		if (this.reticulas.getStatus() === 'borrador') {
			const inputNameReticula =
				containerInputNameReticula.childNodes[0].childNodes[1];
			inputNameReticula.addEventListener('input', (e) => {
				const newName = e.target.value;
				this.reticulas.setName(newName);
			});
		}

		const containerInputStatusReticula = this.htmlElements.getContainer({
			class: 'item-header justify-align-end',
			htmlContent: this.getLabelStatusReticula(),
		});

		header.append(containerInputNameReticula, containerInputStatusReticula);

		return header;
	};

	/**
	 * @name getBtnGoBack
	 * @description Función para obtener el componente del botón para regresar
	 *
	 * @param {String} goBackToURL - Url a donde se redirigira al usuario cuando se presione el boton
	 * @returns {HTMLElement}
	 */
	getBtnGoBack = (goBackToURL = '') => {
		const btnGoBack = this.htmlElements.getButton({
			id: 'btnGoBack',
			class: 'btns btn-cancel',
			textContent: 'Cancelar',
		});

		btnGoBack.addEventListener('click', (e) => {
			this.actionBtnGoBack(e, goBackToURL);
		});

		return btnGoBack;
	};

	/**
	 * @name getBtnSave
	 * @description Función para obtener el componente del botón para gaurdar la reticula
	 *
	 * @returns {HTMLElement}
	 */
	getBtnSave = () => {
		const btnSave = this.htmlElements.getButton({
			id: 'btnSave',
			class: 'btns btn-save',
			textContent: 'Guardar',
		});

		btnSave.addEventListener('click', async (e) => {
			this.actionBtnSave(e);
		});

		return btnSave;
	};

	/**
	 * @name getBtnPost
	 * @description Función para obtener el componente del botón para gaurdar publicar la reticula
	 *
	 * @returns {HTMLElement}
	 */
	getBtnPost = () => {
		const btnPost = this.htmlElements.getButton({
			id: 'btnPost',
			class: 'btns btn-publicate',
			textContent: 'Publicar',
		});

		btnPost.addEventListener('click', (e) => {
			this.actionBtnPost(e);
		});

		return btnPost;
	};

	/**
	 * @name getFooter
	 * @description Función para obtener el footer de la reticula (apartado donde se muestran los
	 * 				botones)
	 *
	 * @returns {HTMLElement}
	 */
	getFooter = () => {
		const footer = this.htmlElements.getContainer({
			id: 'footer',
			class: 'footer',
		});
		const idCarrera = this.reticulas.getReticula().idCarrera;
		footer.append(
			this.getBtnGoBack(config.BASE_URL(`reticulas/by-carrera/${idCarrera}`)),
		);

		// Si la reticula esta en estado de borrador agregamos los botones para guardar y publicar
		if (this.reticulas.getStatus() === 'borrador') {
			footer.append(this.getBtnSave());
			footer.append(this.getBtnPost());
		}

		return footer;
	};

	/**
	 * @name getContainerReticula
	 * @description Función para obtener el contenedor donde se almacenara la estructura de la
	 * 				reticula
	 *
	 * @returns {HTMLElement}
	 */
	getContainerReticula = () => {
		const containerReticula = this.htmlElements.getContainer({
			id: 'containerReticula',
			class: 'reticula',
		});
		return containerReticula;
	};

	/**
	 * @name getColumn
	 * @description Función para una columna vacia (semestre)
	 *
	 * @param {Int} numColumn - Número de columna (Semestre)
	 * @returns
	 */
	getColumn = (numColumn = '1') => {
		return this.htmlElements.getContainer({
			'data-num-col': numColumn,
		});
	};

	/**
	 * @name getTitleColumn
	 * @description Función para obtener el identificador del semestre
	 *
	 * @param {String} title - Indentificador del semestre Ej: Semestre 1
	 * @returns {HTMLElement}
	 */
	getTitleColumn = (title = '') => {
		// Creamos el contenedor del titulo
		const titleColumn = this.htmlElements.getContainer({
			id: 'title',
			name: 'title',
			class: 'item title',
			htmlContent: this.htmlElements.getSpan({ textContent: title }),
		});

		// Añadimos la accion para eliminar la columna si el estatus de la reticula es Borrador
		if (this.reticulas.getStatus() === 'borrador') {
			// Creamos el icono para eliminar un semestre y lo agregamos al contenedor del titulo
			const stringIconDelete = this.getIconDelete('icon-delete-semestre');
			titleColumn.innerHTML = stringIconDelete + titleColumn.innerHTML;

			// Añadimos el evento click al icono para eliminar columnas (semestres)
			const svgIconDelete = titleColumn.children[0];
			const self = this;
			svgIconDelete.addEventListener('click', function (e) {
				self.actionBtnDeleteColumn(e, this);
			});
		}

		return titleColumn;
	};

	/**
	 * @name getContainerItems
	 * @description Función para obtener el contenedor de las materias de un semestre
	 *
	 * @returns {HTMLElement}
	 */
	getContainerItems = () => {
		return this.htmlElements.getContainer({
			class: 'column',
			name: 'rows',
		});
	};

	/**
	 * @name getItemAddMateria
	 * @description Función para obtener el componente que permite agregar materias a un semestre
	 *
	 * @param {Int} numRow - Número de fila
	 * @returns {HTMLElement}
	 */
	getItemAddMateria = (numRow = 1) => {
		const itemAddMateria = this.htmlElements.getContainer({
			class: 'item add',
			name: 'row',
			'data-row': numRow,
			htmlContent: this.getIconAdd('icon-custom icon-add-materia'),
		});

		// Agregamos la acción para agregar materias
		const self = this;
		itemAddMateria.addEventListener('click', async function (e) {
			self.actionBtnAddMaterias(e, this);
		});

		return itemAddMateria;
	};

	/**
	 * @name getItemMateria
	 * @description Función para obtener el componente donde se mostrar una materia
	 *
	 * @param {String} nameMateria - Nombre de la materia
	 * @param {Int} numRow - Número de fila en la que se agregara
	 * @returns {HTMLElement}
	 */
	getItemMateria = (clave = '', nameMateria = '', numRow = 1) => {
		const itemMateria = this.htmlElements.getContainer({
			class: 'item materia',
			name: 'row',
			'data-row': numRow,
			'data-clave': clave,
			htmlContent: this.htmlElements.getSpan({ textContent: nameMateria }),
		});

		// Si el estatus esta en borrador, damos la opción para actualizar o eliminar la materia
		if (this.reticulas.getStatus() === 'borrador') {
			// Creamos el icono para eliminar una materia
			const stringIconDelete = this.getIconDelete(
				'icon-action-materia icon-delete-materia',
			);

			// Creamos el icono para actualizar una materia
			const stringIconUpdate = this.getIconUpdate(
				'icon-action-materia icon-update-materia',
			);

			// Creamos el contenedor para las acciones
			const containerActions = this.htmlElements.getContainer({
				class: 'container-action-materia',
				htmlContent: stringIconDelete + stringIconUpdate,
			});

			// Añadimos el evento click al icono para eliminar materias
			const self = this;
			const svgIconDelete = containerActions.children[0];
			svgIconDelete.addEventListener('click', function (e) {
				self.actionBtnDeleteMateria(e, this);
			});

			// Añadimos el evento click al icono para actualizar materias
			const svgIconUpdate = containerActions.children[1];
			svgIconUpdate.addEventListener('click', async function (e) {
				self.actionBtnUpdateMateria(e, this);
			});

			// Añadimos al contenedor de la materia el contenedor de las acciones
			itemMateria.append(containerActions);
		}

		return itemMateria;
	};

	/**
	 * @name getItemAddColumn
	 * @description Función para obtener el componente que agrega nuevas columnas (Semestres)
	 *
	 * @returns {HTMLElement}
	 */
	getItemAddColumn = () => {
		const itemAddColumn = this.htmlElements.getContainer({
			id: 'addColumn',
			class: 'item add-semestre',
			htmlContent: this.getIconAdd('icon-custom add-semestre-icon'),
		});

		// Agregamos el evento click para agregar una nueva columna (Semestre)
		itemAddColumn.addEventListener('click', () => {
			this.actionBtnAddColumn();
		});

		return itemAddColumn;
	};

	getIconAdd(className = '') {
		const path1 = this.htmlElements.getPath({
			d: 'M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z',
		});
		const path2 = this.htmlElements.getPath({
			d: 'M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z',
		});

		const iconAdd = this.htmlElements.getSvg({
			class: className,
			viewBox: '0 0 16 16',
			htmlContent: path1.outerHTML + path2.outerHTML,
		});
		return iconAdd.outerHTML; // Devolvemos el svg en formato string
	}

	getIconDelete(className = '') {
		const iconDelete = this.htmlElements.getSvg({
			class: className,
			viewBox: '0 0 16 16',
			htmlContent: this.htmlElements.getPath({
				d: 'M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z',
			}),
		});
		return iconDelete.outerHTML; // Devolvemos el svg en formato string
	}

	getIconUpdate(className = '') {
		const iconUpdate = this.htmlElements.getSvg({
			class: className,
			viewBox: '0 0 16 16',
			htmlContent: this.htmlElements.getPath({
				d: 'M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z',
			}),
		});
		return iconUpdate.outerHTML; // Devolvemos el svg en formato string
	}

	/* Acciones de la interfaz */

	/**
	 * @name actionBtnGoBack
	 * @description Función que se ejecutara cuando el botón para volver sea presionado
	 *
	 * @param {Event} e Evento click del botón
	 * @param {String} urlBack Url a donde se redirigira al usuario
	 */
	actionBtnGoBack = (e, urlBack) => {
		window.location.href = urlBack;
	};

	/**
	 * @name actionBtnSave
	 * @description Función que se ejecutara cuando se presione el botón guardar
	 *
	 * @param {Event} e	- Evento click del boton
	 */
	actionBtnSave = async (e) => {
		// Verificamos que haya cambios en la estructura
		if (this.reticulas.getSaved()) {
			AlertModal.showInfo('No hay cambios por guardar', '');
			return;
		}

		// Guardamos los cambios
		this.reticulas.save();
	};

	/**
	 * @name actionBtnPost
	 * @description Función que se ejecutara cuando se presione el botón publicar
	 *
	 * @param {Event} e	- Evento click del boton
	 */
	actionBtnPost = (e) => {
		// Publicar la reticula
		this.reticulas.publicate();
	};

	/**
	 * @name actionBtnDeleteColumn
	 * @description Función para eliminar un semestre
	 *
	 * @param {Event} e - Evento click del boton
	 * @param {HTMLElement} target - Elemento que fue clickeado
	 */
	actionBtnDeleteColumn = function (e, target) {
		const column = target.parentNode.parentNode;
		const numColumn = column.getAttribute('data-num-col');
		this.reticulas.removeSemestre(parseInt(numColumn));
	};

	/**
	 * @name actionBtnAddColumn
	 * @description Función para agregar un semestre
	 *
	 * @param {Event} e - Evento click del boton
	 */
	actionBtnAddColumn = (e) => {
		this.reticulas.addSemestre(1);
	};

	/**
	 * @name actionBtnAddMaterias
	 * @description Función para agregar materias a un semestre
	 *
	 * @param {Event} e - Evento click
	 * @param {HTMLElement} itemAddMateria - Elemento html que fue clickeado
	 */
	actionBtnAddMaterias = async (e, itemAddMateria) => {
		// Si aun no se inicializa el selector de materias, lo iniciamos
		if (this.selectorMaterias === null) {
			this.allAsignaturas = await this.__getAsignaturas();
			this.selectorMaterias = new SelectorMaterias(this.allAsignaturas);
		}

		// Obtenemos las materias que ya fueron seleccionadas
		const asignaturasSelected = this.__getAsignaturasSelected(
			this.reticulas.getReticula(),
		);
		// Excluimos las materias que ya fueron seleccionadas en el selector de materias
		this.selectorMaterias.setExcludeMaterias(asignaturasSelected);
		this.selectorMaterias.setOnlySelectOneMateria(false);
		// Abrimos el selectoe de materias y esperamos las materias que fueron seleccionadas
		const newAsignaturas = await this.selectorMaterias.open();

		// Si no se selecciono ninguna materia
		if (newAsignaturas === null || newAsignaturas.length === 0) return;

		// Obtenemos el número de semestre donde se agregaran las materias
		const numSemestre =
			itemAddMateria.parentNode.parentNode.getAttribute('data-num-col');
		// Agregamos las materias
		this.reticulas.setMaterias(newAsignaturas, numSemestre);
	};

	/**
	 * @name actionBtnDeleteMateria
	 * @description Función para eliminar una materia
	 *
	 * @param {Event} e - Evento click del boton
	 * @param {HTMLElement} target - Elemento que fue clickeado
	 */
	actionBtnDeleteMateria = function (e, target) {
		// Obtenemos los nodos necesarios para saber que materia debe eliminarse
		const itemMateria = target.parentNode.parentNode;
		const column = itemMateria.parentNode.parentNode;

		// Obtenemos los datos para eliminar la materia
		const claveMateria = itemMateria.getAttribute('data-clave');
		const numColumn = column.getAttribute('data-num-col');

		// Ejecutamos la accion de eliminar una materia
		this.reticulas.removeMateria(numColumn, claveMateria);
	};

	/**
	 * @name actionBtnUpdateMateria
	 * @description Función para actualizar una materia
	 *
	 * @param {Event} e - Evento click del boton
	 * @param {HTMLElement} target - Elemento que fue clickeado
	 */
	actionBtnUpdateMateria = async (e, target) => {
		// Si aun no se inicializa el selector de materias, lo iniciamos
		if (this.selectorMaterias === null) {
			this.allAsignaturas = await this.__getAsignaturas();
			this.selectorMaterias = new SelectorMaterias(this.allAsignaturas);
		}

		// Obtenemos las materias que ya fueron seleccionadas
		const asignaturasSelected = this.__getAsignaturasSelected(
			this.reticulas.getReticula(),
		);
		// Excluimos las materias que ya fueron seleccionadas en el selector de materias
		this.selectorMaterias.setExcludeMaterias(asignaturasSelected);
		this.selectorMaterias.setOnlySelectOneMateria(true);
		// Abrimos el selectoe de materias y esperamos las materias que fueron seleccionadas
		const newAsignatura = await this.selectorMaterias.open();

		// Si no se selecciono ninguna materia
		if (newAsignatura === null || newAsignatura.length === 0) return;

		// Obtenemos la clave de la materia a cambiar
		const itemMateria = target.parentNode.parentNode;
		const clave = itemMateria.getAttribute('data-clave');
		// Obtenemos el número de semestre donde se agregaran las materias
		const numSemestre =
			itemMateria.parentNode.parentNode.getAttribute('data-num-col');
		// Cambiamos la materia
		this.reticulas.updateMateria(numSemestre, newAsignatura[0], clave);
	};

	/* Métodos privados */

	/**
	 * @private
	 * @description Función para obtener las asignaturas basicas, las asignaturas de la carrera y
	 * 				de la especialidad segun la reticula
	 *
	 * @return {Object}
	 */
	async __getAsignaturas() {
		// Obtenemos el JSON de la reticula
		const reticula = this.reticulas.getReticula();

		// Obtenemos las materias
		const asigBasicas = await this.asignaturas.getBasicas();
		const asigCarrera = await this.asignaturas.getGenericasByCarrera(
			reticula.idCarrera,
		);
		const asigEspecialidad = await this.asignaturas.getByEspecialidad(
			reticula.idEspecialidad,
		);

		// Contruimos el objetos con todas las materias disponibles para seleccionar
		const allAsignaturas = {
			Basicas: asigBasicas,
			Genericas: asigCarrera,
			Especiales: asigEspecialidad,
		};
		return allAsignaturas;
	}

	/**
	 * @private
	 * @description Función para obtener las claves de todas las materias que ya han sido seleccionadas
	 *
	 * @param {JSON} reticulaJson
	 * @returns {Array}
	 */
	__getAsignaturasSelected = (reticulaJson) => {
		const semestres = Object.keys(reticulaJson).filter((key) =>
			key.startsWith('semestre'),
		);

		let allAsignaturas = [];
		for (let i = 0; i < semestres.length; i++) {
			// Comprabos si es un semestre vacio
			if (Object.keys(reticulaJson[semestres[i]]).length === 0) continue;

			const asignaturas = reticulaJson[semestres[i]].materias;
			const clavesAsignaturas = Object.keys(asignaturas);
			allAsignaturas = [...allAsignaturas, ...clavesAsignaturas];
		}
		return allAsignaturas;
	};
}
