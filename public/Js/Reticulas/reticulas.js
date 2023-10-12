import Reticulas from './HerramientaReticulas/reticulas.js';
import Asignaturas from '../Services/Reticulas/asignaturas.js';

$(document).ready(function () {
	const reticula = new Reticulas('reticula');
	const reticulaJson = {
		name: 'Reticula de ejemplo',
		status: 'Borrador',
		semestre1: ['0001', '0002', '0003', '0000'],
		semestre2: ['0004', '0005', '0006', '0013', '0014'],
		semestre3: ['0007', '0008', '0010', '0011', '0012'],
	};
	reticula.setReticula(reticulaJson);

	const asignaturas = new Asignaturas();
	const basicas = async () => {
		const result = await asignaturas.getByEspecialidad(3);
		console.log(result);
	};
	basicas();
});
