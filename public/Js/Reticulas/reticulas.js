import Reticulas from './HerramientaReticulas/reticulas.js';
import ComponentReticulas from './HerramientaReticulas/component-reticulas.js';

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
});
