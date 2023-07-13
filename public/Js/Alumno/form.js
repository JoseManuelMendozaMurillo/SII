document.addEventListener('DOMContentLoaded', function () {
	const selectCarrera = document.getElementById('selectCarrera');
	const selectSemestre = document.getElementById('selectSemestre');
	const selectGrupo = document.getElementById('selectGrupo');

	selectCarrera.addEventListener('change', () => showGrupos());
	selectSemestre.addEventListener('change', () => showGrupos());

	async function showGrupos() {
		const selectedCarrera = selectCarrera.value;
		const selectedSemestre = selectSemestre.value;
		if (selectedCarrera === '' || selectedSemestre === '') {
			return;
		}
		// Obtenemos los grupos por ajax
		const grupos = await getGrupos(selectedCarrera, selectedSemestre);
		if (grupos instanceof Error) {
			alert('No se pudieron obtener los grupos');
			return;
		}
		// Insertamos los grupos en el select de grupos
		insertGrupos(grupos);
	}

	async function getGrupos(idCarrera, semestre) {
		try {
			// Creamos un formdata para enviar los datos y poder accederlos mediante el método post en CodeIgniter
			const formData = new FormData();
			formData.append('id_carrera', idCarrera);
			formData.append('semestre', semestre);
			// Hacemos la peticion AJAX
			const response = await fetch(`${url}alumno/grupos`, {
				method: 'POST',
				headers: {
					'X-Requested-With': 'XMLHttpRequest', // Para que codeigniter entienda que es una peticion AJAX
				},
				body: formData,
			});
			// Convertimos el JSON de respuesta a un object de JS
			const data = await response.json();
			return data;
		} catch (error) {
			return error;
		}
	}

	function insertGrupos(grupos) {
		selectGrupo.innerHTML =
			'<option disabled selected value="">Selecciona el grupo</option>';
		for (const key in grupos) {
			const grupo = grupos[key];
			// Crear una nueva opción
			const newOption = document.createElement('option');
			newOption.text = grupo.identificador;
			newOption.value = grupo.id_grupo;
			// Añadir la nueva opción al select
			selectGrupo.add(newOption);
		}
	}
});
