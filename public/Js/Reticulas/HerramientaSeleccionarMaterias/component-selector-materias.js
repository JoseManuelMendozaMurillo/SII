import CreateHtmlElements from '../../Tools/create-html-elements.js';

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

	// Id filters
	idSeeker;
	idSelect;
	filterOptions;

	constructor(instanceClassSelectorMaterias) {
		this.selectorMaterias = instanceClassSelectorMaterias;
		this.htmlElements = new CreateHtmlElements();

		// Agregamos los id de los containers
		this.idMateriasAvailable = 'containerMateriasAvailable';
		this.idMateriasSelected = 'containerMateriasSelected';

		// Agregamos los id de los filtros
		this.idSeeker = 'searchMateria';
		this.idSelect = 'typeMateria';
		// Agregamos las opciones de filtrado
		const options = Object.keys(this.selectorMaterias.materias);
		this.filterOptions = ['Todas', ...options];
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
	 * @description Función para obtener el valor del selector por tipo de asignatura
	 *
	 * @returns {String}
	 */
	getValSelectByTypeAsig = () => {
		return document.getElementById(this.idSelect).value;
	};

	/**
	 * @description Función para obtener el valor del selector por tipo de asignatura
	 *
	 * @returns {String}
	 */
	getValSeeker = () => {
		return document.getElementById(this.idSeeker).value;
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
		containerMaterias.append(containerMateriasAvailable);

		if (!this.selectorMaterias.getOnlySelectOneMateria()) {
			const containerMateriasSelected = this.getContainerMateriasSelected();
			containerMaterias.append(containerMateriasSelected);
		}

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

		// Agregamos las asignaturas
		const tiposAsignaturas = this.filterOptions.slice(1);
		const asignaturas = this.selectorMaterias.materias;
		tiposAsignaturas.forEach((tipo) => {
			asignaturas[tipo].forEach((asignatura) => {
				const claveAsig = asignatura.clave_asignatura;
				// Evaluamos si la materia se debe mostrar en el selector
				if (!this.selectorMaterias.getExcludeMaterias().includes(claveAsig)) {
					const newItemMateria = this.getItemMateriasAvailable(
						tipo,
						asignatura.nombre_asignatura,
						asignatura.clave_asignatura,
					);
					containerMateriasAvailable.append(newItemMateria);
				}
			});
		});
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
	 * @param {String} type - Tipo de materia
	 * @param {String} name - Nombre de la materia
	 * @param {String} clave - Clave de la materia
	 * @returns {HTMLElement}
	 */
	getItemMateriasAvailable = (type = '', name = '', clave = '') => {
		// Creamos la etiqueta para el nombre de la materia
		const nameMateria = this.htmlElements.getSpan({
			class: 'item-materia-name',
			textContent: name,
		});

		// Creamos la etiqueta para la clave de la materia
		const claveMateria = this.htmlElements.getSpan({
			class: 'item-materia-name',
			textContent: clave,
		});

		// Creamos el contenedor para la informacion de la materia
		const containerMateria = this.htmlElements.getContainer({
			class: 'container-materia',
			htmlContent: nameMateria.outerHTML + claveMateria.outerHTML,
		});

		// Creamos el icono para el item de la materia
		const stringIconRowRight = this.getIconRowRight('item-materia-icon');

		// Creamos el item
		const containerItemMateria = this.htmlElements.getContainer({
			class: 'item-materia available',
			'type-asignatura': type,
			'clave-asignatura': clave,
			htmlContent: containerMateria.outerHTML + stringIconRowRight,
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
	 * @name getItemMateriasSelected
	 * @description Función para crear un item de una materia seleccionada
	 *
	 * @param {String} type - Tipo de materia
	 * @param {String} name - Nombre de la materia
	 * @param {String} clave - Clave de la materia
	 * @returns {HTMLElement}
	 */
	getItemMateriasSelected = (type = '', name = '', clave = '') => {
		// Creamos la etiqueta para el nombre de la materia
		const nameMateria = this.htmlElements.getSpan({
			class: 'item-materia-name',
			textContent: name,
		});

		// Creamos la etiqueta para la clave de la materia
		const claveMateria = this.htmlElements.getSpan({
			class: 'item-materia-name',
			textContent: clave,
		});

		// Creamos el contenedor con la informacion de la materia
		const containerMateria = this.htmlElements.getContainer({
			class: 'container-materia',
			htmlContent: nameMateria.outerHTML + claveMateria.outerHTML,
		});

		// Creamos el icono para el item de la materia
		const stringIconRowLeft = this.getIconRowLeft('item-materia-icon');

		// Creamos el item de la materia seleccionada
		const containerItemMateria = this.htmlElements.getContainer({
			class: 'item-materia selected',
			'type-asignatura': type,
			'clave-asignatura': clave,
			htmlContent: stringIconRowLeft + containerMateria.outerHTML,
		});

		// Agregamos el evento click para pasar al estado de seleccion una materia
		const iconRowLeft = containerItemMateria.firstChild;
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
		const seeker = this.htmlElements.getContainer({
			class: 'input-group w-50',
			htmlContent: labelSeeker.outerHTML,
		});
		seeker.append(inputSeeker);
		return seeker;
	}

	/**
	 * @name getInputSeeker
	 * @description Funcion para crear el input para el buscardor de materias
	 *
	 * @returns {HTMLElement}
	 */
	getInputSeeker = () => {
		const seeker = this.htmlElements.getInput({
			id: this.idSeeker,
			name: this.idSeeker,
			class: 'form-control',
			type: 'text',
			placeholder: 'Buscar...',
		});

		// Agregamos el eventos para buscar asignaturas
		const self = this;
		seeker.addEventListener('input', function (e) {
			self.actionInputSeeker(e);
		});

		return seeker;
	};

	/**
	 * @name getSelectByTypeMaterias
	 * @description Funcion para crear el select para el filtrado de materias por su tipo
	 *
	 * @returns {HTMLElement}
	 */
	getSelectByTypeMaterias = () => {
		const selectTypes = this.htmlElements.getSelect({
			id: this.idSelect,
			name: this.idSelect,
			class: 'form-select w-50',
		});

		// Agregamos las opciones al select
		let val = 1;
		this.filterOptions.forEach((type) => {
			const newOption = this.htmlElements.getOption({
				textContent: type,
				value: val,
				selected: val === 1,
			});
			selectTypes.append(newOption);
			val++;
		});

		const self = this;
		selectTypes.addEventListener('change', function (e) {
			self.actionChangeSelect(e);
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
				'fill-rule': 'evenodd',
				d: 'M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z',
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
				'fill-rule': 'evenodd',
				d: 'M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8zs',
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

	/**
	 * @description Función para cambiar la visualizacion de las materias disponibles segun el
	 * 				selector
	 *
	 * @param {Event} e - Evento change del select de tipos materias
	 */
	actionChangeSelect = (e) => {
		const val0ption = parseInt(e.target.value);
		const option = this.filterOptions[val0ption - 1];
		const valSeeker = this.getValSeeker();
		const asigAvailable = this.getInstanceMateriasAvailable().children;

		const showOnlyAsignaturas = (type) => {
			for (let i = 1; i < asigAvailable.length; i++) {
				if (asigAvailable[i].getAttribute('type-asignatura') !== type) {
					asigAvailable[i].classList.add('hidden');
				} else {
					asigAvailable[i].classList.remove('hidden');
				}
			}

			// Obtenemos las asignaturas segun la variable type
			const shownAsig = this.getInstanceMateriasAvailable().querySelectorAll(
				`div[type-asignatura="${type}"]`,
			);
			// Hacemos la busqueda de lo que habia en el buscador
			this.__searchAsignatura(valSeeker, shownAsig);
		};

		// Mostrar todas las materias
		if (option === 'Todas') {
			for (let i = 1; i < asigAvailable.length; i++) {
				asigAvailable[i].classList.remove('hidden');
			}
			// Obtenemos todas las asignaturas
			const shownAsig =
				this.getInstanceMateriasAvailable().querySelectorAll('div');
			// Hacemos la busqueda de lo que habia en el buscador
			this.__searchAsignatura(valSeeker, shownAsig);
			return;
		}

		showOnlyAsignaturas(option);
	};

	/**
	 * @description Función para buscar asignaturas
	 *
	 * @param {Event} e Evento input del buscardor
	 */
	actionInputSeeker = (e) => {
		// Obtenemos las asignaturas visibles segun el selector de tipos de materias
		const valOption = this.getValSelectByTypeAsig();
		const option = this.filterOptions[valOption - 1];
		let asigAvailable = '';
		if (option === 'Todas') {
			asigAvailable =
				this.getInstanceMateriasAvailable().querySelectorAll('div');
		} else {
			asigAvailable = this.getInstanceMateriasAvailable().querySelectorAll(
				`div[type-asignatura="${option}"]`,
			);
		}

		const value = e.target.value;
		this.__searchAsignatura(value, asigAvailable);
	};

	/**
	 * @description Método para buscar un nombre de una asignatura dentro de una colección de
	 * 				asignaturas
	 *
	 * @param {String} param - Parametro a buscar
	 * @param {HTMLCollection} asignaturas - Asignaturas donde se debe realizar la busqueda
	 */
	__searchAsignatura(param, asignaturas) {
		// Obtenemos los nombres de las asignaturas
		const namesAsig = Array.from(asignaturas).flatMap(
			(asig) => asig.querySelectorAll('span')[0],
		);

		// Función para normalizar textos (Elimina acentos, cambia ñ => n y convierte a mayuscula)
		function normalizeText(texto) {
			return texto
				.normalize('NFD')
				.replace(/[\u0300-\u036f]/g, '')
				.toUpperCase();
		}

		// Realizamos la busqueda del parametro sobre cada asignatura y vamos filtrando resultados
		for (let i = 0; i < namesAsig.length; i++) {
			if (param === '') {
				namesAsig[i].parentNode.parentNode.classList.remove('hidden');
				continue;
			}
			const nameAsig = namesAsig[i].textContent;
			if (normalizeText(nameAsig).includes(normalizeText(param))) {
				namesAsig[i].parentNode.parentNode.classList.remove('hidden');
			} else {
				namesAsig[i].parentNode.parentNode.classList.add('hidden');
			}
		}
	}
}
