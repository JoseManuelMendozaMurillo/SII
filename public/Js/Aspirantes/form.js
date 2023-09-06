import config from '../config.js';

$(document).ready(function () {
	// Agregamos el placeholder al campo año egreso
	const anoActual = new Date().getFullYear();
	$('#anioEgreso').attr('placeholder', anoActual);

	let timeoutId; // Variable para almacenar el identificador de timeout

	/**
	 * @description Función que aplica la animación de entrada al botón para regresar al login
	 *
	 * @return {void} void
	 */
	function inAnimateBtnBackLogin() {
		clearTimeout(timeoutId); // Limpiar cualquier timeout pendiente
		$('#btnBack').removeClass('btn-back--out-expand');
		$('#btnBack').addClass('btn-back--in-expand');
		timeoutId = setTimeout(() => {
			$('#btnBackTxt').removeClass('d-none');
		}, 210);
	}

	/**
	 * @description Función que aplica la animación de salida al botón para regresar al login
	 *
	 * @return {void} void
	 */
	function outAnimateBtnBackLogin() {
		$('#btnBackTxt').addClass('d-none');
		clearTimeout(timeoutId); // Limpiar el timeout si el usuario quita el ratón
		$('#btnBack').removeClass('btn-back--in-expand');
		$('#btnBack').addClass('btn-back--out-expand');
	}

	/**
	 * @description Evento para saber cuando el usuario redimensiona la pantalla y no aplicar la
	 *              animación del botón para volver al login si la pantalla final es menor a 1212px
	 *
	 */
	$(window).resize(function () {
		if ($(window).width() < 1212) {
			if ($('#btnBack').hasClass('btn-back--in-expand')) {
				outAnimateBtnBackLogin();
			}
		}
	});

	/**
	 * @description Evento que muestra la animación del botón para volver al login cuando el usuario
	 *              pasa el cursor de este boton
	 *
	 */
	$('#btnBack').mouseenter(function () {
		if ($(window).width() >= 1212) {
			inAnimateBtnBackLogin();
		}
	});

	/**
	 * @description Evento que mues la animación del botón para volver al login cuando el usuario
	 *              quita el cursor de este botón
	 *
	 */
	$('#btnBack').mouseleave(function () {
		if ($(window).width() >= 1212) {
			outAnimateBtnBackLogin();
		}
	});

	// Todo lo que se ingrese en los inputs que tengan la clase .upper-case se volvera mayusculas
	$('.upper-case').on('input', function () {
		const texto = $(this).val();
		$(this).val(texto.toUpperCase());
	});

	/**
	 * @description Evento click para cuando se presione el botón buscar, simular un click en el
	 * 				input de tipo file para que se abra el explorador de archivos y el aspirante
	 * 				pueda subir una foto
	 *
	 */
	$('#btnSearchImg').click(function (e) {
		// Simulamos un click en el input de tipo file para abrir el explorador de archivos
		$('#foto').click();
	});

	/**
	 * @description Evento change para mostrar el preview y el nombre de archivo de la foto del
	 *				aspirante cada vez que este la cambie
	 *
	 */
	$('#foto').change(function (e) {
		// Obtenemos el archivo
		const file = e.target.files[0];

		// Validamos que se haya subido un archivo
		if (file === undefined) {
			return;
		}

		/**
		 * @description Función para mostrar un error en el campo donde el aspirante sube su foto
		 *
		 * @param {string} message -> Mensaje de error
		 * @returns {void} void
		 */
		function showError(message) {
			// Mostramos el error
			$('#txtErrorInputImg').text(message);
			if ($('#containerErrorInputImg').hasClass('d-none')) {
				$('#containerErrorInputImg').removeClass('d-none');
			}
			// Restablece el valor del campo de archivo (opcional)
			$('#foto').val('');
			$('#nameImg').val('');
			$('#previewImg').attr(
				'src',
				config.BASE_URL('Vendor/Template/assets/images/avatars/avtar_4.png'),
			);
		}

		// Validamos la extensión del archivo
		const allowedExtensions = ['jpg', 'jpeg', 'png'];
		const fileExtension = file.name.split('.').pop().toLowerCase();
		if (!allowedExtensions.includes(fileExtension)) {
			showError(
				'Seleccione un archivo con una extensión válida (jpg, jpeg o png).',
			);
			return;
		}

		// Validamos el tamaño del archivo (en bytes)
		const maxSizeInBytes = 5 * 1024 * 1024; // 5 MB
		if (file.size > maxSizeInBytes) {
			showError(
				'El archivo es demasiado grande. El tamaño máximo permitido es de 5 MB.',
			);
			return;
		}

		// Si todo salio bien, ocultamos el mensaje de error
		if (!$('#containerErrorInputImg').hasClass('d-none')) {
			$('#containerErrorInputImg').addClass('d-none');
		}

		// Obtenemos el nombre del archivo de la foto y lo mostramos
		const fileName = e.target.files[0].name;
		$('#nameImg').val(fileName);

		// Renderizamos la imagen para mostrar el preview
		const reader = new FileReader();
		reader.onload = function (e) {
			// Cuando la foto se haya subido y renderizado mostramos el preview
			$('#previewImg').attr('src', e.target.result);
		};
		reader.readAsDataURL(this.files[0]);
	});

	/**
	 * @description Array con los datos de todos los estados de la republica mexicana
	 * @var estados
	 */
	let estados;

	/**
	 * @description Array con los municipios de los estados de la republica Mexicana
	 * @var municipios
	 */
	const municipios = {};

	/**
	 * @name setOptionsSelect
	 * @description Función para agregar un option a un select desde JS
	 *
	 * @param {string} idSelect -> Id del select al cual se le agregara la opción
	 * @param {object} option -> Objeto con el value y el contenido de de la nueva opción
	 */
	function setOptionsSelect(idSelect, option) {
		option = $('<option>', option);
		$(`#${idSelect}`).append(option);
	}

	/**
	 * @name getIdEstado
	 * @description Función para obtener el id de un estado por su nombre
	 *
	 * @param {string} nameEstado -> Nombre del estado
	 * @returns {string} idEstado -> Id del estado
	 */
	function getIdEstado(nameEstado) {
		const estado = estados.find(
			(estado) => estado.nom_agee.toUpperCase() === nameEstado.toUpperCase(),
		);
		if (estado) {
			return estado.cve_agee;
		} else {
			return null; // O un valor predeterminado si no se encuentra el estado
		}
	}

	/**
	 * @name getIdMunicipio
	 * @description Función para obtener la posición de un municipio dentro del arreglo de municipios
	 * 				de un estado
	 *
	 * @param {string} idEstado -> Id del estado que contiene el municipio buscado
	 * @param {string} nameMunicipio -> Nombre del municipio buscado
	 * @returns {int} Posición dentro del arreglo donde se encuentra el municipio (-1 si no se encuentra)
	 */
	function getIdMunicipio(idEstado, nameMunicipio) {
		const index = municipios[idEstado].findIndex(
			(municipio) =>
				municipio.nom_agem.toUpperCase() === nameMunicipio.toUpperCase(),
		);
		return index; // Devuelve el índice si se encuentra el municipio, de lo contrario devuelve -1
	}

	/**
	 * @name reorganizeMunicipos
	 * @description Función para reorganizar el arreglo de municipios de un estado y dejar como
	 * 				primeras opciones los municipios que lleguen en el arreglo (listOrderMunicipios)
	 *
	 * @param {string} idEstado -> Id del estado que contiene a los municipios
	 * @param {Array<string>} listOrderMunicipios -> Array con la lista de los municipios que quedaran como primeras opciones
	 */
	function reorganizeMunicipos(idEstado, listOrderMunicipios) {
		const municipiosNewOrder = [];
		for (const municipio of listOrderMunicipios) {
			// Obtenemos la posicion en el arreglo del municipio
			const index = getIdMunicipio(idEstado, municipio);
			// Eliminamos el municipio del arreglo y obtenemos el municipio eliminado
			const deletedMunicipio = municipios[idEstado].splice(index, 1)[0];
			// Agregamos el municipio eliminado a un nuevo arreglo
			municipiosNewOrder.push(deletedMunicipio);
		}
		// Agregamos los municipios eliminados al principio del arreglo
		municipios[idEstado].unshift(...municipiosNewOrder);
	}

	/**
	 * @name getMunicipios
	 * @description Obtiene los municipios de un estado de la República Mexicana
	 *
	 * @param {string} estado -> El nombre del estado
	 * @returns {Promise<Array>|Array<string>} -> Una promesa que resuelve en un arreglo de municipios o un arreglo de municipios
	 */
	function getMunicipios(estado) {
		const idEstado = getIdEstado(estado);
		if (Object.prototype.hasOwnProperty.call(municipios, idEstado)) {
			return municipios[idEstado];
		}
		return new Promise(function (resolve, reject) {
			const apiMunicipio = `https://gaia.inegi.org.mx/wscatgeo/mgem/${idEstado}`;
			$.ajax({
				url: apiMunicipio,
				method: 'GET',
				dataType: 'json',
				success: function (response) {
					municipios[idEstado] = response.datos;
					/* Si el estado es jalisco, reordenamos el arreglo para que aparezcan primero los
					   municipios que estan a los alrrededores de ocotlán 
					*/
					if (estado.toUpperCase() === 'JALISCO') {
						const municipiosPrincipio = [
							'Ocotlán',
							'Jamay',
							'La Barca',
							'Poncitlán',
							'Tototlán',
							'Atotonilco el Alto',
							'Guadalajara',
						];
						// Reorganizar el arreglo
						reorganizeMunicipos(idEstado, municipiosPrincipio);
					}
					return resolve(municipios[idEstado]);
				},
				error: function () {
					return reject(new Error('La petición fallo'));
				},
			});
		});
	}

	/**
	 * @name setMunicipiosSelect
	 * @description Función para agregar una lista de municipios a un select
	 *
	 * @param {string} idSelect
	 * @param {string} estado
	 */
	async function setMunicipiosSelect(idSelect, estado) {
		$(`#${idSelect}`).empty();
		const municipiosList = await getMunicipios(estado);
		municipiosList.forEach(function (municipio) {
			const option = {
				value: municipio.nom_agem.toUpperCase(),
				text: municipio.nom_agem.toUpperCase(),
			};
			setOptionsSelect(idSelect, option);
		});
	}

	/**
	 * @description Petición AJAX para obtener la lista de paises
	 *
	 */
	const urlApiContries = 'https://restcountries.com/v3.1/all';
	$.ajax({
		url: urlApiContries,
		type: 'GET',
		dataType: 'json',
		success: function (data) {
			const countries = data.map(function (country) {
				return {
					name: country.name.common,
					code: country.cca2,
				};
			});

			countries.sort(function (a, b) {
				return a.name.localeCompare(b.name);
			});

			// Reorganizar el arreglo para que México sea el primer elemento
			const mexicoIndex = countries.findIndex(function (country) {
				return country.code === 'MX';
			});

			if (mexicoIndex !== -1) {
				const mexicoCountry = countries.splice(mexicoIndex, 1)[0];
				countries.unshift(mexicoCountry);
			}

			countries.forEach(function (country) {
				const option = {
					value: country.code.nom_agee,
					text: country.name.toUpperCase(),
				};
				setOptionsSelect('countrySelect', option);
			});
		},
		error: function () {
			console.log('Error al obtener la lista de países');
		},
	});

	/**
	 * @description Petición AJAX para obtener la lista de estados de la republica Mexicana
	 *
	 */
	const urlApiEstados = 'https://gaia.inegi.org.mx/wscatgeo/mgee/';
	$.ajax({
		url: urlApiEstados,
		method: 'GET',
		dataType: 'json',
		success: async function (response) {
			estados = response.datos;

			// Obtener el id de estado de jalisco
			const jaliscoIndex = estados.findIndex(function (estado) {
				return estado.nom_agee.toUpperCase() === 'JALISCO';
			});

			// Reorganizar el arreglo para que Jalisco sea el primer elemento
			if (jaliscoIndex !== -1) {
				const jaliscoEstado = estados.splice(jaliscoIndex, 1)[0];
				estados.unshift(jaliscoEstado);
			}

			// Agregamos la lista de estados a los selectores de estados
			estados.forEach(function (estado) {
				const option = {
					value: estado.nom_agee.toUpperCase(),
					text: estado.nom_agee.toUpperCase(),
				};
				setOptionsSelect('estado', option);
				setOptionsSelect('estadoProcedencia', option);
				setOptionsSelect('estadoEscuela', option);
			});

			// Agregamos la lista de municipios de jalisco a los selectores de municipios
			await setMunicipiosSelect('municipio', 'JALISCO');
			await setMunicipiosSelect('municipioEscuela', 'JALISCO');
		},
		error: function () {
			console.error('Error al obtener los estados.');
		},
	});

	/**
	 * @description Evento change para obtener y agregar los municipios cuando se cambie el estado
	 * 				donde reside actualmente el aspirante
	 *
	 */
	$('#estado').change(async function () {
		const estado = $(this).val();
		await setMunicipiosSelect('municipio', estado);
	});

	/**
	 * @description Evento change para obtener y agregar los municipios cuando se cambie el estado
	 * 				donde se encontraba la preparatoria del aspirante
	 *
	 */
	$('#estadoEscuela').change(async function () {
		const estado = $(this).val();
		await setMunicipiosSelect('municipioEscuela', estado);
	});

	// Obtener todas las opciones de carreras
	const carrerasOptions = [];
	$('#primeraOpcionIngreso option').each(function () {
		carrerasOptions.push($(this).val());
	});

	// Filtrar y agregar las opciones al segundo select
	$('#primeraOpcionIngreso').change(function () {
		const selectedValue = $(this).val();

		// Filtrar las opciones para el segundo select
		const opcionesFiltradas = carrerasOptions.filter(function (option) {
			return option !== selectedValue;
		});

		// Limpiar opciones previas en el segundo select
		$('#segundaOpcionIngreso').empty();

		// Agregar las opciones filtradas al segundo select
		opcionesFiltradas.forEach(function (option) {
			const carreraName = $(
				'#primeraOpcionIngreso option[value="' + option + '"]',
			).text();
			const optionElement = $('<option>').val(option).text(carreraName);
			$('#segundaOpcionIngreso').append(optionElement);
		});
	});

	// Inicialmente, filtrar las opciones para el segundo select
	$('#primeraOpcionIngreso').trigger('change');
});
