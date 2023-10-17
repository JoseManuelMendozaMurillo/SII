import Reticulas from './HerramientaReticulas/reticulas.js';

$(document).ready(async function () {
	const idRet = 1;
	const reticula = new Reticulas('reticula');
	await reticula.initReticulaByID(idRet);

	// Evitar que se recargue la pagina si hay cambios sin guardar
	window.addEventListener('beforeunload', async (event) => {
		if (!reticula.getSaved())
			event.returnValue = 'Hay cambios sin grabar. ¿Abandonar ahora?';
	});
});
