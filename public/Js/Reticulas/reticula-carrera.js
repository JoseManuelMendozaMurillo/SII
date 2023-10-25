import Reticulas from '../Services/Reticulas/reticulas.js';
import AlertModal from '../Tools/alert-modal.js';

// Variables globales que se declaran en una etiqueta script del archivo html de este JS
const dataReticulas = JSON.parse(jsonDataReticulas);
const idCar = idCarrera;

const reticulas = new Reticulas();

// Modals
const modal = document.getElementById('crearReticula');
const modalBootstrap = new bootstrap.Modal(modal);
// Containers
const optionsCreateReticulas = document.getElementById('optionsCreateReticula');
const reticulaSiDiv = document.getElementById('reticulaSi');
const listReticulas = document.getElementById('listReticulas');
const validationName = document.getElementById('validationName');
// Buttons
const btnCreate = document.getElementById('createButton');
// Inputs
const nombre = document.getElementById('name');
const selectEsp = document.getElementById('selectEspecialidad');
const selectRet = document.getElementById('selectReticula');
const reticulaAntiguaSiRadio = document.getElementById('reticulaAntiguaSi');
const reticulaAntiguaNoRadio = document.getElementById('reticulaAntiguaNo');
const btnsActions = document.querySelectorAll('button[name="btnChangeStatus"]');
// Variables globales
let newRet = true;
let useRet = null;

reticulaAntiguaSiRadio.addEventListener('change', function () {
	if (this.checked) {
		reticulaSiDiv.style.display = 'block';
		newRet = false;
		useRet = selectRet.value;
	}
});

reticulaAntiguaNoRadio.addEventListener('change', function () {
	if (this.checked) {
		reticulaSiDiv.style.display = 'none';
		newRet = true;
		useRet = null;
	}
});

selectRet.addEventListener('change', () => {
	useRet = selectRet.value;
});

modal.addEventListener('show.bs.modal', function () {
	// Cuando se abre el modal para crear reticulas
	nombre.value = '';
	validationName.classList.add('d-none');
});

btnCreate.addEventListener('click', async (e) => {
	// Creamos la reticula
	const name = nombre.value;
	const idCarrera = idCar;
	const idEspecialidad = selectEsp.value;
	const useReticula = newRet;
	const idUseReticula = useRet;

	// Validamos que se haya ingresado un nombre para la reticula
	if (name === '') {
		validationName.textContent = 'Debe ingresar un nombre para la reticula';
		validationName.classList.remove('d-none');
		return;
	}

	// Validamos la especialdad seleccionada
	if (parseInt(idEspecialidad) === -1) {
		AlertModal.showError(
			'Debe crear una nueva especialidad',
			'Para crear una nueva reticula debe crear una nueva especialidad que no este asociada a ninguna otra reticula',
		);
		return;
	}

	const urlNewReticula = await reticulas.create(
		name,
		idCarrera,
		idEspecialidad,
		useReticula,
		idUseReticula,
	);
	if (typeof urlNewReticula === 'string') window.location.href = urlNewReticula;
});

// Agregamos las opciones para gestionar estados
if (btnsActions !== null) {
	btnsActions.forEach((btn) => {
		btn.addEventListener('click', async function (e) {
			e.stopPropagation();
			e.preventDefault();
			const idReticula = this.getAttribute('data-id-reticula');
			const nameReticula = this.getAttribute('data-name-reticula');
			const status = this.getAttribute('data-estatus-reticula');
			switch (status) {
				case 'Borrador':
					deleteReticula(this, idReticula, nameReticula);
					break;
				case 'Activo':
					inactiveReticula(this, idReticula, nameReticula);
					break;
				case 'Inactivo':
					historialReticula(this, idReticula, nameReticula);
					break;
				default:
					break;
			}
		});
	});
}

/**
 * @description Método para enviar a historial una reticula
 *
 * @param {Node} btn - Boton html que fue presionado
 * @param {string|Int8Array} idReticula - Id de la reticula a enviar a historial
 * @param {string} nameReticula - Nombre de la reticula a enviar a historial
 */
async function historialReticula(btn, idReticula, nameReticula) {
	const res = await AlertModal.showWarning(
		'Enviar a historial la reticula',
		`Si envias al historial la reticula '${nameReticula}' ya no aparecera en los listados`,
		true,
		'Historial',
		true,
		'Cancelar',
	);

	if (!res) {
		return;
	}

	// Enviar a historial la reticula
	const isHistorial = await reticulas.historial(idReticula);
	if (!isHistorial) {
		AlertModal.showError(
			'No se puedo inactivar la reticula',
			'Hubo un error al inactivar la reticula',
		);
		return;
	}

	/* Reflejamos el cambio en la interfaz */
	// Eliminamos el item que muestra esta reticula del html
	const deletedReticula = btn.parentNode.parentNode;
	listReticulas.removeChild(deletedReticula);
	// Eliminamos los datos de la reticula del arreglo que contienes todas las reticulas
	deleteDataReticulas(idReticula);
	// Eliminamos la reticula del selector de reticulas para crear una nueva
	deleteOptionSelectReticulas(idReticula);
	// Dependiendo de la cantidad de reticulas mostramo o ocultamos las opciones para crear reticulas a partir de otras
	const lengthReticulas = dataReticulas.length;
	if (lengthReticulas === 0) showOptionsCreateReticula(false);
	else showOptionsCreateReticula(true);

	AlertModal.showSuccess(
		'Reticula en el historial',
		'La reticula se envio al historial',
	);
}

/**
 * @description Método para inactivar una reticula
 *
 * @param {Node} btn - Boton html que fue presionado
 * @param {string|Int8Array} idReticula - Id de la reticula a eliminar
 * @param {string} nameReticula - Nombre de la reticula a eliminar
 */
async function inactiveReticula(btn, idReticula, nameReticula) {
	const res = await AlertModal.showWarning(
		'Inactivar reticula',
		`¿Estas seguro de que quieres inactivar la reticula '${nameReticula}'?`,
		true,
		'Inactivar',
		true,
		'Cancelar',
	);

	if (!res) {
		return;
	}

	// Inactivar la reticula
	const isInactive = await reticulas.inactive(idReticula);
	if (!isInactive) {
		AlertModal.showError(
			'No se puedo inactivar la reticula',
			'Hubo un error al inactivar la reticula',
		);
		return;
	}

	// Cambiamos el estado de la reticula en la interfaz
	btn.classList.replace('btn-warning', 'btn-dark');
	btn.setAttribute('data-estatus-reticula', 'Inactivo');
	btn.textContent = 'Historial';
	const divContentStatus = btn.parentNode.children[0];
	divContentStatus.classList.replace('bg-success', 'bg-warning');
	divContentStatus.children[0].textContent = 'Inactivo';

	AlertModal.showSuccess('Reticula inactivada', 'La reticula se inactivo');
}

/**
 * @description Método para eliminar una reticula
 *
 * @param {Node} btn - Boton html que fue presionado
 * @param {string|Int8Array} idReticula - Id de la reticula a eliminar
 * @param {string} nameReticula - Nombre de la reticula a eliminar
 */
async function deleteReticula(btn, idReticula, nameReticula) {
	const res = await AlertModal.showWarning(
		'Eliminar reticula',
		`¿Estas seguro de que quieres eliminar la reticula '${nameReticula}'?`,
		true,
		'Eliminar',
		true,
		'Cancelar',
	);

	if (res) {
		// Eliminar la reticula
		const response = await reticulas.delete(idReticula);
		if (!response.success) {
			AlertModal.showError(
				'No se puedo eliminar la reticula',
				'Hubo un error al eliminar la reticula',
				true,
				'ok',
			);
			return;
		}

		// Eliminamos el item que muestra esta reticula del html
		const deletedReticula = btn.parentNode.parentNode;
		listReticulas.removeChild(deletedReticula);

		// Eliminamos los datos de la reticula del arreglo que contienes todas las reticulas
		deleteDataReticulas(idReticula);
		// Eliminamos la reticula del selector de reticulas para crear una nueva
		deleteOptionSelectReticulas(idReticula);
		// Dependiendo de la cantidad de reticulas mostramo o ocultamos las opciones para crear reticulas a partir de otras
		const lengthReticulas = dataReticulas.length;
		if (lengthReticulas === 0) showOptionsCreateReticula(false);
		else showOptionsCreateReticula(true);
		// Insertamos las nuevas opciones al selector de especialidades
		insertOptionsSelectEsp(response.especialidades);

		AlertModal.showSuccess('Reticula eliminada', 'La reticula se elimino');
	}
}

/**
 * @description Método para mostrar o ocultar la opcion para crear una reticula a partir de otra
 *
 * @param {boolean} show - True para mostrar, false para ocultar
 */
function showOptionsCreateReticula(show) {
	if (show) {
		optionsCreateReticulas.classList.remove('d-none');
		return;
	}
	optionsCreateReticulas.classList.add('d-none');
	reticulaAntiguaNoRadio.checked = true;
}

/**
 * @description Método para eliminar una opcion del selector de reticulas donde el usuario
 *              selecciona una reticula para crear otra a partir de la seleccionada
 *
 * @param {string} idReticula
 */
function deleteOptionSelectReticulas(idReticula) {
	const optionDelete = selectRet.querySelector(`option[value="${idReticula}"]`);
	if (optionDelete !== null) {
		selectRet.removeChild(optionDelete); // Eliminar la opcion
	}
}

/**
 * @description Función para inserta las especialidades al selector de especialidades
 *
 * @param {Array} especialidades
 */
function insertOptionsSelectEsp(especialidades) {
	// Limpiamos el selector
	selectEsp.innerHTML = '';

	// Agregamos las opciones
	for (let index = 0; index < especialidades.length; index++) {
		const esp = especialidades[index];
		const newOption = document.createElement('option');
		newOption.setAttribute('value', esp.id_especialidad);
		newOption.textContent = esp.nombre_especialidad;
		if (index === 0) {
			newOption.setAttribute('Selected', true);
		}
		selectEsp.appendChild(newOption);
	}
}

/**
 * @description Función para eliminar una reticula del array que contiene los daros de las retiuclas
 *
 * @param {string|Int8Array} idReticula - Id de la reticula a eliminar
 */
function deleteDataReticulas(idReticula) {
	const lengthReticulas = dataReticulas.length;
	for (let index = 0; index < lengthReticulas; index++) {
		const reticula = dataReticulas[index];
		if (parseInt(reticula.id_reticula) === parseInt(idReticula)) {
			dataReticulas.splice(index, 1); // Eliminar la reticula del array
			index = lengthReticulas;
		}
	}
}
