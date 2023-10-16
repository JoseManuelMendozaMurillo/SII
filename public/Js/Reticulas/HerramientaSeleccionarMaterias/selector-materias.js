import ComponentSelectorMaterias from './component-selector-materias.js';

/**
 * @class
 * Herramienta para seleccionar materias
 */
export default class SelectorMaterias {
	materias;
	selectedMaterias;
	excludeMaterias;
	onlySelectOneMateria;
	modal;
	components;

	constructor(
		materias = {},
		excludeMaterias = {},
		onlySelectOneMateria = false,
	) {
		this.materias = materias;
		this.excludeMaterias = excludeMaterias;
		this.onlySelectOneMateria = onlySelectOneMateria;
		this.selectedMaterias = [];
		this.components = new ComponentSelectorMaterias(this);
		this.modal = null;
	}

	setMaterias = (materias) => {
		this.materias = materias;
	};

	getMaterias = () => {
		return this.materias;
	};

	setExcludeMaterias = (excludeMaterias) => {
		this.excludeMaterias = excludeMaterias;
	};

	getExcludeMaterias = () => {
		return this.excludeMaterias;
	};

	setOnlySelectOneMateria(onlySelectOneMateria) {
		this.onlySelectOneMateria = onlySelectOneMateria;
	}

	getOnlySelectOneMateria() {
		return this.onlySelectOneMateria;
	}

	getSelectedMaterias = () => {
		return this.selectedMaterias;
	};

	/**
	 * @description Función para abrir el selector de materias
	 *
	 * @returns {Promise<Array|null>}
	 */
	open = () => {
		return new Promise((resolve, reject) => {
			this.modal = Swal.mixin({
				width: '120vh',
				title: 'Seleccionar materias',
				html: this.components.getModal(),
				showCancelButton: true,
				showConfirmButton: !this.getOnlySelectOneMateria(),
				cancelButtonText: 'Cancelar',
				confirmButtonText: 'Agregar',
				customClass: {
					popup: 'custom-swal-modal', // Aplica tu clase personalizada al modal
					actions: 'custom-swal-actions', // Aplica esta clase para alinear los botones a la derecha
				},
			});
			this.modal.fire().then((result) => {
				if (result.isConfirmed) {
					resolve(this.getSelectedMaterias());
					this.close();
				} else if (result.dismiss === Swal.DismissReason.cancel) {
					this.close();
					resolve(null);
				}
			});
		});
	};

	close = () => {
		this.selectedMaterias = [];
	};

	addMateria = (itemMateria) => {
		// Agregamos los datos de la materia al arreglo
		const type = itemMateria.getAttribute('type-asignatura');
		const clave = itemMateria.getAttribute('clave-asignatura');
		const name = itemMateria.children[0].textContent;
		const materia = this.materias[type].find(
			(materia) => materia.clave_asignatura === clave,
		);
		this.selectedMaterias.push(materia);

		if (this.getOnlySelectOneMateria()) {
			// Si solo se debe seleccionar una materia cerramos el modal
			this.modal.clickConfirm();
		} else {
			// De lo contrario, agregamos la materia seleccionada al contenedor de materias seleccionadas

			// Obtenemos los contenedores que necesitamos
			const materiasAvailable = this.components.getInstanceMateriasAvailable();
			const materiasSelected = this.components.getInstanceMateriasSelected();

			// Construimos el objeto itemMateriaSelected
			const newItemMateriaSelected = this.components.getItemMateriasSelected(
				type,
				name,
				clave,
			);

			// Eliminamos el item de la materia del contenedor de materias disponibles
			materiasAvailable.removeChild(itemMateria);
			// Agregamos el nuevo item de la materia seleccionada al contenedor de materias seleccionadas
			materiasSelected.append(newItemMateriaSelected);
		}
	};

	removeMateria = (itemMateria) => {
		// Obtenemos los contenedores que necesitamos
		const materiasAvailable = this.components.getInstanceMateriasAvailable();
		const materiasSelected = this.components.getInstanceMateriasSelected();

		// Construimos el objeto itemMateriaAvailable
		const type = itemMateria.getAttribute('type-asignatura');
		const name = itemMateria.children[0].textContent;
		const clave = itemMateria.getAttribute('clave-asignatura');
		const newItemMateriaAvailable = this.components.getItemMateriasAvailable(
			type,
			name,
			clave,
		);

		// Eliminamos el item de la materia del contenedor de materias disponibles
		materiasSelected.removeChild(itemMateria);
		// Agregamos el nuevo item de la materia seleccionada al contenedor de materias seleccionadas
		materiasAvailable.append(newItemMateriaAvailable);

		// Eliminamos la materia del arreglo de materias seleccionadas
		const indexDelete = this.selectedMaterias.findIndex(
			(materia) => materia.clave_asignatura === clave,
		);
		if (indexDelete !== -1) {
			this.selectedMaterias.splice(indexDelete, 1);
		}
	};
}
