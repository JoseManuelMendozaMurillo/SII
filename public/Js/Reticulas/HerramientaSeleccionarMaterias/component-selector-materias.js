import CreateHtmlElements from '../create-html-elements.js';

/**
 * @class
 * Clase constructora de componentes para la herramienta de selección de materias
 */
export default class ComponentSelectorMaterias {
	selectorMaterias;
	htmlElements;

	// Id containers
	idMateriasAvailable;
	idMateriasSelected;

	constructor(instanceClassSelectorMaterias) {
		this.selectorMaterias = instanceClassSelectorMaterias;
		this.htmlElements = new CreateHtmlElements();

		// Agregamos los id de los containers
		this.idMateriasAvailable = 'containerMateriasAvailable';
		this.idMateriasSelected = 'containerMateriasSelected';
	}

	/**
	 * @name getInstanceMateriasAvailable
	 * @description Función para obtener una instancia del contenedor con las materias disponibles
	 *
	 * @returns {HTMLElement}
	 */
	getInstanceMateriasAvailable = () => {
		return document.getElementById(this.idMateriasAvailable);
	};

	/**
	 * @name getInstanceMateriasSelected
	 * @description Función para obtener una instancia del contenedor con las materias seleccionadas
	 *
	 * @returns {HTMLElement}
	 */
	getInstanceMateriasSelected = () => {
		return document.getElementById(this.idMateriasSelected);
	};

	/**
	 * @name getModal
	 * @description Función para obtener toda la herramienta de seleccion de materias
	 *
	 * @returns {HTMLElement}
	 */
	getModal = () => {
		const container = this.htmlElements.getContainer({
			class: 'container-modal',
		});

		// Obtenemos los elementos del modal
		const containerFilters = this.getContainerFilters();
		const containerMaterias = this.getContainerMaterias();

		// Unimos todos los elementos del modal
		container.append(containerFilters, containerMaterias);

		return container;
	};

	/**
	 * @name getContainerFilters
	 * @description Función para obtener el contenedor con los filtros (El buscador y el selector de
	 * 				los tipos de materias)
	 *
	 * @returns {HTMLElement}
	 */
	getContainerFilters = () => {
		const filters = this.htmlElements.getContainer({
			class: 'container-modal-filters',
		});

		// Obtenemos los elementos del apartado de filtros
		const seeker = this.getSeeker();
		const selectByTypeMaterias = this.getSelectByTypeMaterias();

		// Contruimos el contenedor de filtros
		filters.append(seeker, selectByTypeMaterias);

		return filters;
	};

	/**
	 * @name getContainerFilters
	 * @description Función para crear el contenedor con los contenedores de materias disponibles y
	 * 				materias seleccionadas
	 *
	 * @returns {HTMLElement}
	 */
	getContainerMaterias = () => {
		const containerMaterias = this.htmlElements.getContainer({
			class: 'container-modal-containers-materias',
		});

		// Obtenemos los recuadros donde se muestran las materias
		const containerMateriasAvailable = this.getContainerMateriasAvailable();
		const containerMateriasSelected = this.getContainerMateriasSelected();

		// Agregamos los contenedores al contenedor de materias
		containerMaterias.append(
			containerMateriasAvailable,
			containerMateriasSelected,
		);

		return containerMaterias;
	};

	/**
	 * @name getContainerMateriasAvailable
	 * @description Función para crear el contenedor con las materias disponibles
	 *
	 * @returns {HTMLElement}
	 */
	getContainerMateriasAvailable = () => {
		// Creamos el encabezado de la columna
		const header = this.htmlElements.getSpan({
			class: 'container-title-text-title',
			textContent: 'Materias',
		});

		// Creamos la columna
		const containerMateriasAvailable = this.htmlElements.getContainer({
			class: 'container-modal-materias',
			id: this.idMateriasAvailable,
			htmlContent: header,
		});

		// Agregamos las materias
		for (let index = 0; index < 20; index++) {
			const newItemMateria =
				this.getItemMateriasAvailable('Materia de ejemplo');
			containerMateriasAvailable.append(newItemMateria);
		}

		return containerMateriasAvailable;
	};

	/**
	 * @name getContainerMateriasAvailable
	 * @description Función para crear el contenedor con las materias seleccionadas
	 *
	 * @returns {HTMLElement}
	 */
	getContainerMateriasSelected() {
		// Creamos el titulo del encabezado
		const headerTitle = this.htmlElements.getSpan({
			class: 'container-title-text-title',
			textContent: 'Materias seleccionadas',
		});

		// Creamos el icono del encabezado
		const stringHeaderIcon = this.getIconCheck('container-title-icon-title');

		// Creamos el header de la columna
		const header = this.htmlElements.getContainer({
			class: 'container-title',
			htmlContent: headerTitle.outerHTML + stringHeaderIcon,
		});

		// Retornamos el contendor
		return this.htmlElements.getContainer({
			class: 'container-modal-materias',
			id: this.idMateriasSelected,
			htmlContent: header,
		});
	}

	/**
	 * @name getItemMateriasAvailable
	 * @description Función para crear un item de una materia disponible
	 *
	 * @param {String} name - Nombre de la materia
	 * @returns {HTMLElement}
	 */
	getItemMateriasAvailable = (name = '') => {
		// Creamos la etiqueta para el nombre de la materia
		const nameMateria = this.htmlElements.getSpan({
			class: 'item-materia-name',
			textContent: name,
		});

		// Creamos el icono para el item de la materia
		const stringIconRowRight = this.getIconRowRight('item-materia-icon');

		// Creamos el item
		const containerItemMateria = this.htmlElements.getContainer({
			class: 'item-materia available',
			htmlContent: nameMateria.outerHTML + stringIconRowRight,
		});

		// Agregamos el evento click para pasar al estado de seleccion una materia
		const iconRowRight = containerItemMateria.lastChild;
		const self = this;
		iconRowRight.addEventListener('click', function (e) {
			self.selectorMaterias.addMateria(this.parentNode);
		});

		return containerItemMateria;
	};

	/**
	 * @name getItemMateriasAvailable
	 * @description Función para crear un item de una materia seleccionada
	 *
	 * @param {String} name - Nombre de la materia
	 * @returns {HTMLElement}
	 */
	getItemMateriasSelected = (name = '') => {
		// Creamos la etiqueta para el nombre de la materia
		const nameMateria = this.htmlElements.getSpan({
			class: 'item-materia-name',
			textContent: name,
		});

		// Creamos el icono para el item de la materia
		const stringIconRowLeft = this.getIconRowLeft('item-materia-icon');

		// Creamos el item de la materia seleccionada
		const containerItemMateria = this.htmlElements.getContainer({
			class: 'item-materia selected',
			htmlContent: nameMateria.outerHTML + stringIconRowLeft,
		});

		// Agregamos el evento click para pasar al estado de seleccion una materia
		const iconRowLeft = containerItemMateria.lastChild;
		const self = this;
		iconRowLeft.addEventListener('click', function (e) {
			self.selectorMaterias.removeMateria(this.parentNode);
		});

		return containerItemMateria;
	};

	/**
	 * @name getSeeker
	 * @description Funcion para obtener el componente del buscardor de materias
	 *
	 * @returns {HTMLElement}
	 */
	getSeeker() {
		// Obtenemos los elementos para el buscardor
		const labelSeeker = this.htmlElements.getLabel({
			class: 'input-group-text',
			for: 'searchMateria',
			htmlContent: this.getIconSeeker('container-modal-filters-search-icon'),
		});
		const inputSeeker = this.getInputSeeker();

		// Unimos los elementos del buscador para crearlo
		return this.htmlElements.getContainer({
			class: 'input-group w-50',
			htmlContent: labelSeeker.outerHTML + inputSeeker.outerHTML,
		});
	}

	/**
	 * @name getInputSeeker
	 * @description Funcion para crear el input para el buscardor de materias
	 *
	 * @returns {HTMLElement}
	 */
	getInputSeeker = () => {
		return this.htmlElements.getInput({
			id: 'searchMateria',
			name: 'searchMateria',
			class: 'form-control',
			type: 'text',
			placeholder: 'Buscar...',
		});
	};

	/**
	 * @name getInputSeeker
	 * @description Funcion para crear el select para el filtrado de materias por su tipo
	 *
	 * @returns {HTMLElement}
	 */
	getSelectByTypeMaterias = () => {
		const selectTypes = this.htmlElements.getSelect({
			id: 'typeMateria',
			name: 'typeMateria',
			class: 'form-select w-50',
		});

		// Agregamos las opciones al select
		const typesMaterias = ['Todas', 'Basicas', 'Genericas', 'Especiales'];
		let val = 1;
		typesMaterias.forEach((type) => {
			const newOption = this.htmlElements.getOption({
				textContent: type,
				value: val,
				selected: val === 1,
			});
			selectTypes.append(newOption);
			val++;
		});

		return selectTypes;
	};

	getIconSeeker = (className = '') => {
		// Creamos el icono de una lupa
		const iconSeeker = this.htmlElements.getSvg({
			class: className,
			viewBox: '0 0 16 16',
			htmlContent: this.htmlElements.getPath({
				d: 'M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z',
			}),
		});
		return iconSeeker.outerHTML;
	};

	getIconRowRight = (className = '') => {
		// Creamos el icono de una flecha apuntando a la derecha
		const iconRowRight = this.htmlElements.getSvg({
			class: className,
			viewBox: '0 0 16 16',
			htmlContent: this.htmlElements.getPath({
				d: 'M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z',
				'fill-rule': 'evenodd',
			}),
		});
		return iconRowRight.outerHTML;
	};

	getIconRowLeft = (className = '') => {
		// Creamos el icono de una flecha apuntando a la izquierda
		const iconRowLeft = this.htmlElements.getSvg({
			class: className,
			viewBox: '0 0 16 16',
			htmlContent: this.htmlElements.getPath({
				d: 'M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8zs',
				'fill-rule': 'evenodd',
			}),
		});
		return iconRowLeft.outerHTML;
	};

	getIconCheck = (className = '') => {
		// Creamos el icono check
		const iconCheck = this.htmlElements.getSvg({
			class: className,
			viewBox: '0 0 16 16',
			htmlContent: this.htmlElements.getPath({
				d: 'M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z',
			}),
		});
		return iconCheck.outerHTML;
	};
}
