import ComponentReticulas from './component-reticulas.js';

/**
 * @class
 * Clase encargada de renderizar los cambios hechos en la estructura del JSON que representa
 * la reticula
 */
export default class RenderReticulas {
	/**
	 * Contenedor principal donde se renderiza la retícula.
	 * @type {HTMLElement}
	 */
	container;

	/**
	 * Instancia de la clase Reticulas utilizada para construir el JSON de la reticula
	 * @type {Reticulas}
	 */
	reticulas;

	/**
	 * Instancia de la clase ComponentReticulas utilizada para construir componentes
	 * de la retículas.
	 * @type {ComponentReticulas}
	 */
	components;

	/**
	 * @name constructor
	 * @description Construye una instancia de la clase RenderReticulas.
	 *
	 * @param {String} idContainer - ID del contenedor principal donde será renderizada la retícula.
	 * @param {Reticulas} reticulas - Instancia de la clase Reticulas
	 */
	constructor(idContainer, reticulas) {
		this.container = document.getElementById(idContainer);
		this.reticulas = reticulas;
		this.components = new ComponentReticulas(reticulas);

		// Limpiamos el contenedor
		this.container.innerHTML = '';

		// Suscribimos al container a los eventos
		this.__subscribirContainerEventos();
	}

	/**
	 * @name update
	 * @description Función para disparar y actualizar el contenedor con un evento personalizado.
	 *
	 * @param {Event} e - Evento personalizado que se actualizará en el contenedor.
	 */
	update(e) {
		this.container.dispatchEvent(e);
	}

	/* Métodos privados */

	/**
	 * @private
	 * @name subscribirContainerEventos
	 * @description Método para asociar una funcion con un evento personalizado al container
	 */
	__subscribirContainerEventos() {
		// Suscribimos al contenedor a los eventos personalizados
		this.container.addEventListener('createreticula', (e) => {
			this.__createReticula(e);
		});

		this.container.addEventListener('addsemestre', (e) => {
			this.__addSemestre(e);
		});

		this.container.addEventListener('removesemestre', (e) => {
			this.__removeSemestre(e);
		});

		this.container.addEventListener('removemateria', (e) => {
			this.__removeMateria(e);
		});

		this.container.addEventListener('addmateria', (e) => {
			this.__addMaterias(e);
		});

		this.container.addEventListener('updatemateria', (e) => {
			this.__updateMateria(e);
		});
	}

	/**
	 * @private
	 * @name createReticula
	 * @description Método para pintar una reticula a partir de un Json
	 *
	 * @param {Event} e - Evento que desencadena la creación de la retícula.
	 */
	__createReticula(e) {
		// Creamos la reticula
		const reticulaJson = this.reticulas.getReticula();

		const semestres = Object.keys(reticulaJson).filter((key) =>
			key.startsWith('semestre'),
		);

		const reticula = this.components.getContainerReticula();
		let contColumn = 1;

		semestres.forEach((semestre) => {
			const newColumn = this.components.getColumn(contColumn);
			const titleColumn = this.components.getTitleColumn(semestre);
			const containerItems = this.components.getContainerItems();
			contColumn++;

			// Agregamos las materias a cada semestre
			let numRow = 1;
			const materias = reticulaJson[semestre].materias;
			// Si el semestre no esta vacio le agregamos sus materias
			if (materias !== undefined) {
				const clavesMaterias = Object.keys(materias);
				clavesMaterias.forEach((clave) => {
					const nameMateria = materias[clave].name;
					const itemMateria = this.components.getItemMateria(
						clave,
						nameMateria,
						numRow,
					);
					numRow++;
					containerItems.append(itemMateria);
				});
			}

			// Si el estatus de la reticula esta en borrador, agregamos la opción para agregar materias
			if (this.reticulas.getStatus() === 'borrador') {
				const itemAddMateria = this.components.getItemAddMateria(numRow);
				containerItems.append(itemAddMateria);
			}

			// Creamos el semestre (columna)
			newColumn.append(titleColumn, containerItems);

			// Agregamos el semestre a la reticula
			reticula.append(newColumn);
		});

		// Si el estatus de la reticula esta en borrador, agregamos la opción para agregar semestres
		if (this.reticulas.getStatus() === 'borrador') {
			const newColumn = this.components.getColumn(contColumn);
			const itemAddColumn = this.components.getItemAddColumn();
			newColumn.append(itemAddColumn);
			reticula.append(newColumn);
		}

		// Construimos la interfaz
		const header = this.components.getHeader();
		const footer = this.components.getFooter();
		this.container.append(header, reticula, footer);

		// Obtenemos el input para cambiar el nombre y el input que indica el status
		const inputChangeName = document.getElementById('nameReticula');
		const inputStatus = document.getElementById('statusReticula');

		// Seteamos el nombre y el status de la reticula
		inputChangeName.value = this.reticulas.reticulaJson.name;
		inputStatus.value = this.reticulas.reticulaJson.status;
	}

	/**
	 * @private
	 * @name addSemestre
	 * @description Método para agregar un semestre a una reticula
	 *
	 * @param {Event} e - Evento que desencadena la adición del semestre.
	 */
	__addSemestre(e) {
		// Obtenemos el número del ultimo semestre
		const numLastSemestre = this.reticulas.__getNumUltimoSemestre();

		// Construimos la nueva columna para el semestre
		const newColumn = this.components.getColumn(numLastSemestre);
		const title = this.components.getTitleColumn(`Semestre${numLastSemestre}`);
		const containerItems = this.components.getContainerItems();
		const itemAddMateria = this.components.getItemAddMateria(1);
		containerItems.append(itemAddMateria);
		newColumn.append(title, containerItems);

		// Agregamos la nueva columna para el nuevo semestre al contenedor de reticulas
		const containerReticula = document.getElementById('containerReticula');
		const nodeColumnAdd = containerReticula.querySelector(
			`div[data-num-col="${numLastSemestre}"]`,
		);
		containerReticula.insertBefore(newColumn, nodeColumnAdd);

		// Cambiamos el numero de columna de la columna para agregar columnas
		nodeColumnAdd.setAttribute('data-num-col', numLastSemestre + 1);
	}

	/**
	 * @private
	 * @name removeSemestre
	 * @description Método para eliminar un semestre de la reticula
	 *
	 * @param {Event} e - Evento que desencadena la eliminación del semestre.
	 */
	__removeSemestre(e) {
		const numSemestreDelete = e.detail.numSemestreDelete;
		const lastSemestre = parseInt(this.reticulas.__getNumUltimoSemestre()) + 1;

		// Obtenemos el contenedor de los semestres (reticula)
		const containerReticula = document.getElementById('containerReticula');

		// Eliminamos del contenedor el semestre
		const semestreDelete = containerReticula.querySelector(
			`div[data-num-col="${numSemestreDelete}"]`,
		);
		containerReticula.removeChild(semestreDelete);

		// Cambiamos los numeros de los semestres
		for (let index = numSemestreDelete + 1; index <= lastSemestre; index++) {
			const semestre = containerReticula.querySelector(
				`div[data-num-col="${index}"]`,
			);
			const title = semestre.querySelector('div[name="title"]').children[1];

			// Cambiamos el número del semestre
			semestre.setAttribute('data-num-col', index - 1);
			// Cambiamos el nombre del semestre
			title.textContent = `Semestre${index - 1}`;
		}

		// Cambiamos el número de la columna para agregar columnas
		const numLastColumn =
			containerReticula.lastChild.getAttribute('data-num-col');
		containerReticula.lastChild.setAttribute('data-num-col', numLastColumn - 1);
	}

	/**
	 * @private
	 * @name removeMateria
	 * @description Función para eliminar una materia de un semestre de la vista
	 *
	 * @param {Event} e - Evento que desencadena la eliminación de la materia.
	 */
	__removeMateria(e) {
		// Obtenemos los nodos que se van a modificiar
		const containerReticula = document.getElementById('containerReticula');
		const semestre = containerReticula.querySelector(
			`div[data-num-col="${e.details.semestre}"]`,
		);
		const contentRows = semestre.lastChild;
		const itemMateriaDelete = contentRows.querySelector(
			`div[data-clave="${e.details.materiaDelete}"]`,
		);

		// Eliminamos la materia de la columna
		contentRows.removeChild(itemMateriaDelete);
	}

	/**
	 * @private
	 * @name addMaterias
	 * @description Función para eliminar agregar materias a un semestre de la vista
	 *
	 * @param {Event} e - Evento que desencadena el agregar materias.
	 */
	__addMaterias(e) {
		const semestre = e.details.semestre;
		const asignaturas = e.details.addedAsignaturas;

		// Obtenemos el contenedor de materias
		const column = this.container.querySelector(
			`div[data-num-col = "${semestre}"]`,
		);
		const containerItems = column.lastChild;

		// Obtenemos el item para agregar asignaturas
		const itemAddAsignaturas = containerItems.lastChild;

		// Obtenemos el número de fila
		let numRow = itemAddAsignaturas.getAttribute('data-row');
		numRow = parseInt(numRow) - 1;

		// Agregamos las materias al semestre
		const clavesAsignaturas = Object.keys(asignaturas);
		clavesAsignaturas.forEach((clave) => {
			const nameAsig = asignaturas[clave].name;
			const itemMateria = this.components.getItemMateria(
				clave,
				nameAsig,
				numRow,
			);
			numRow++;
			containerItems.insertBefore(itemMateria, itemAddAsignaturas);
		});
	}

	/**
	 * @private
	 * @name updateMateria
	 * @description Función para actualizar una materia a un semestre en la vista
	 *
	 * @param {Event} e - Evento que desencadena el actualizar una materia.
	 */
	__updateMateria(e) {
		const claveMateriaDeleted = e.details.claveAignaturaDelete;
		const newAsignatura = e.details.nuevaAsignatura;
		const semestre = e.details.semestre;

		// Obtenemos la materia a cambiar
		const itemMateriaChange = this.container.querySelector(
			`div[data-clave="${claveMateriaDeleted}"]`,
		);

		// Cambiamos los datos
		itemMateriaChange.setAttribute(
			'data-clave',
			newAsignatura.clave_asignatura,
		);
		itemMateriaChange.firstChild.textContent = newAsignatura.nombre_asignatura;
	}
}
