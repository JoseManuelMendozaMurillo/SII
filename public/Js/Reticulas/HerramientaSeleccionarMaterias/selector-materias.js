import ComponentSelectorMaterias from './component-selector-materias.js';

/**
 * @class
 * Herramienta para seleccionar materias
 */
export default class SelectorMaterias {
	materias;
	selectedMaterias;
	components;

	constructor(materias = {}) {
		this.materias = materias;
		this.selectedMaterias = {};
		this.components = new ComponentSelectorMaterias(this);
	}

	setMaterias = (materias) => {
		this.materias = materias;
	};

	getMaterias = () => {
		return this.materias;
	};

	getSelectedMaterias = () => {
		return this.selectedMaterias;
	};

	open = (exclude = {}) => {
		return new Promise((resolve, reject) => {
			Swal.fire({
				width: '120vh',
				title: 'Seleccionar materias',
				html: this.components.getModal(),
				showCancelButton: true,
				cancelButtonText: 'Cancelar',
				confirmButtonText: 'Agregar',
				customClass: {
					popup: 'custom-swal-modal', // Aplica tu clase personalizada al modal
					actions: 'custom-swal-actions', // Aplica esta clase para alinear los botones a la derecha
				},
			}).then((result) => {
				if (result.isConfirmed) {
					resolve(this.getSelectedMaterias());
				} else if (result.dismiss === Swal.DismissReason.cancel) {
					this.close();
					resolve(null);
				}
			});
		});
	};

	close = () => {
		this.selectedMaterias = {};
	};

	serachMateria = (param, filter) => {
		// Funcion para buscar una materia
	};

	filterMaterias = (filter) => {
		// Funcion para filtrar materias
	};

	addMateria = (itemMateria) => {
		// Obtenemos los contenedores que necesitamos
		const materiasAvailable = this.components.getInstanceMateriasAvailable();
		const materiasSelected = this.components.getInstanceMateriasSelected();

		// Construimos el objeto itemMateriaSelected
		const nameMateria = itemMateria.children[0].textContent;
		const newItemMateriaSelected =
			this.components.getItemMateriasSelected(nameMateria);

		// Eliminamos el item de la materia del contenedor de materias disponibles
		materiasAvailable.removeChild(itemMateria);
		// Agregamos el nuevo item de la materia seleccionada al contenedor de materias seleccionadas
		materiasSelected.append(newItemMateriaSelected);

		// Agregamos la clave al arreglo de materias seleccionadas
		this.selectedMaterias['0001'] = nameMateria;
		console.log(this.selectedMaterias);
	};

	removeMateria = (itemMateria) => {
		// Obtenemos los contenedores que necesitamos
		const materiasAvailable = this.components.getInstanceMateriasAvailable();
		const materiasSelected = this.components.getInstanceMateriasSelected();

		// Construimos el objeto itemMateriaAvailable
		const nameMateria = itemMateria.children[0].textContent;
		const newItemMateriaAvailable =
			this.components.getItemMateriasAvailable(nameMateria);

		// Eliminamos el item de la materia del contenedor de materias disponibles
		materiasSelected.removeChild(itemMateria);
		// Agregamos el nuevo item de la materia seleccionada al contenedor de materias seleccionadas
		materiasAvailable.append(newItemMateriaAvailable);

		// Eliminamos la clave al arreglo de materias seleccionadas
		delete this.selectedMaterias['0001'];
		console.log(this.selectedMaterias);
	};
}
