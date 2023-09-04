$(document).ready(function () {
	document.getElementById('mostrarFormulario').addEventListener('click', () => {
		const formulario = document.getElementById('formulario');
		formulario.style.display = 'block';
	});

	document.getElementById('cancelar').addEventListener('click', () => {
		const formulario = document.getElementById('formulario');
		formulario.style.display = 'none';
	});
});
