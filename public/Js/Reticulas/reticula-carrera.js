import Reticulas from '../Services/Reticulas/reticulas.js';
import AlertModal from '../Tools/alert-modal.js';

// Variables globales que se declaran en una etiqueta script del archivo html de este JS
const dataReticulas = JSON.parse(jsonDataReticulas);
const idCar = idCarrera;

const reticulas = new Reticulas();

// Containers
const optionsCreateReticulas = document.getElementById('optionsCreateReticula');
const reticulaSiDiv = document.getElementById('reticulaSi');
const listReticulas = document.getElementById('listReticulas');
// Buttons
const btnCreate = document.getElementById('createButton');
// Inputs
const nombre = document.getElementById('name');
const selectEsp = document.getElementById('selectEspecialidad');
const selectRet = document.getElementById('selectReticula');
const reticulaAntiguaSiRadio = document.getElementById('reticulaAntiguaSi');
const reticulaAntiguaNoRadio = document.getElementById('reticulaAntiguaNo');
const btnsActions = document.querySelectorAll('.icon');
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

btnCreate.addEventListener('click', async () => {
	// Creamos la reticula
	const name = nombre.value;
	const idCarrera = idCar;
	const idEspecialidad = selectEsp.value;
	const useReticula = newRet;
	const idUseReticula = useRet;

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
	btnsActions.forEach((icon) => {
		icon.addEventListener('click', async function (e) {
			e.stopPropagation();
			e.preventDefault();
			const idReticula = this.getAttribute('id');
			const nameReticula = this.getAttribute('data-name-reticula');
			const status = this.getAttribute('name');
			switch (status) {
				case 'Borrador':
					deleteReticula(this, idReticula, nameReticula);
					break;
				default:
					break;
			}
		});
	});
}

/**
 * @description Método para eliminar una reticula
 *
 * @param {Node} iconBtn - Boton html que fue presionado
 * @param {string|Int8Array} idReticula - Id de la reticula a eliminar
 * @param {string} nameReticula - Nombre de la reticula a eliminar
 */
async function deleteReticula(iconBtn, idReticula, nameReticula) {
	const res = await AlertModal.showWarning(
		'Eliminar reticula',
		`¿Estas seguro de que quieres eliminar la reticula '${nameReticula}'`,
		true,
		'Eliminar',
		true,
		'Cancelar',
	);

	if (res) {
		// Eliminar la reticula
		const isDeleted = await reticulas.delete(idReticula);
		if (!isDeleted) {
			AlertModal.showError(
				'No se puedo eliminar la reticula',
				'Hubo un error al eliminar la reticula',
				true,
				'ok',
			);
			return;
		}

		// Eliminamos el item que muestra esta reticula del html
		const deletedReticula = iconBtn.parentNode.parentNode;
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
			'Reticula eliminada',
			'La reticula se elimino',
			true,
			'ok',
		);
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
