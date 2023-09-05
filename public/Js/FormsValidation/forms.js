// import { customValidation } from '../../Vendor/Parsley/validationsAspirantes.js';

$(document).ready(function () {
	// Ponemos parsely en español
	// window.Parsley.setLocale('es');

	// customValidation();

	const $form = $('#form-wizard1').parsley();

	// Definir regla personalizada para validar fecha máxima
	// window.Parsley.addValidator('customdate', {
	// 	requirementType: 'string',
	// 	validateString: function (value, requirement) {
	// 		const today = new Date();
	// 		const selectedDate = new Date(value);

	// 		return (
	// 			selectedDate.toDateString() !== today.toDateString() &&
	// 			selectedDate < today
	// 		);
	// 	},
	// 	messages: {
	// 		en: 'La fecha de nacimiento debe ser anterior a la fecha actual.',
	// 	},
	// });

	function showFieldset(idFieldset, typeBtn) {
		switch (idFieldset) {
			case 'sectionPersonalInfo':
				// Si el fieldset anterior no es valido
				$('#itemSolicitudeInfo').find('a').removeClass('bg-danger text-white');
				$('#itemSolicitudeInfo').removeClass('active');
				$('#itemSolicitudeInfo').removeClass('done');

				if (!$('#itemPersonalInfo').hasClass('active')) {
					$('#itemPersonalInfo').addClass('active');
				}
				$('#itemPersonalInfo').removeClass('done');

				$('#sectionPersonalInfo').show();
				$('#sectionSolicitudeInfo').hide();
				$('#sectionSocioeconomicInfo').hide();
				break;
			case 'sectionSolicitudeInfo':
				// Si el fieldset anterior o previo no es valido
				if (typeBtn === 'next') {
					if (!isValidFieldset('sectionPersonalInfo')) {
						$('#itemPersonalInfo').removeClass('active');
						$('#itemPersonalInfo').find('a').addClass('bg-danger text-white');
						return;
					}

					// Si es valido
					$('#itemPersonalInfo').find('a').removeClass('bg-danger text-white');
					if (!$('#itemPersonalInfo').hasClass('active')) {
						$('#itemPersonalInfo').addClass('active');
					}
					$('#itemPersonalInfo').addClass('done');
				} else if (typeBtn === 'previous') {
					// Si va hacia atras
					$('#itemSocioeconomicInfo')
						.find('a')
						.removeClass('bg-danger text-white');
					$('#itemSocioeconomicInfo').removeClass('active');
					$('#itemSocioeconomicInfo').removeClass('done');
				}

				if (!$('#itemSolicitudeInfo').hasClass('active')) {
					$('#itemSolicitudeInfo').addClass('active');
				}
				$('#itemSolicitudeInfo').removeClass('done');

				$('#sectionPersonalInfo').hide();
				$('#sectionSolicitudeInfo').show();
				$('#sectionSocioeconomicInfo').hide();
				break;
			case 'sectionSocioeconomicInfo':
				// Si el fieldset anterior no es valido
				if (!isValidFieldset('sectionSolicitudeInfo')) {
					$('#itemSolicitudeInfo').removeClass('active');
					$('#itemSolicitudeInfo').find('a').addClass('bg-danger text-white');
					return;
				}

				// Si es valido
				$('#itemSolicitudeInfo').find('a').removeClass('bg-danger text-white');
				if (!$('#itemSolicitudeInfo').hasClass('active')) {
					$('#itemSolicitudeInfo').addClass('active');
				}
				$('#itemSolicitudeInfo').addClass('done');

				if (!$('#itemSocioeconomicInfo').hasClass('active')) {
					$('#itemSocioeconomicInfo').addClass('active');
				}
				$('#itemSocioeconomicInfo').removeClass('done');

				$('#sectionPersonalInfo').hide();
				$('#sectionSolicitudeInfo').hide();
				$('#sectionSocioeconomicInfo').show();
				break;
			case 'submit':
				if (!isValidFieldset('sectionSocioeconomicInfo')) {
					$('#itemSocioeconomicInfo').removeClass('active');
					$('#itemSocioeconomicInfo')
						.find('a')
						.addClass('bg-danger text-white');
					return;
				}

				// Si es valido
				$('#itemSocioeconomicInfo')
					.find('a')
					.removeClass('bg-danger text-white');
				if (!$('#itemSocioeconomicInfo').hasClass('active')) {
					$('#itemSocioeconomicInfo').addClass('active');
				}
				$('#itemSocioeconomicInfo').addClass('done');
				break;
			default:
				break;
		}
	}

	function isValidFieldset(idFieldset) {
		return $form.validate({ group: idFieldset });
	}

	// Validamos el form por fieldset
	$('button[name="next"], button[name="previous"]').click(function (event) {
		const nextFieldset = this.value;
		const typeBtn = this.name;
		switch (nextFieldset) {
			case 'sectionPersonalInfo':
				// Si el fieldset anterior no es valido
				$('#itemSolicitudeInfo').find('a').removeClass('bg-danger text-white');
				$('#itemSolicitudeInfo').removeClass('active');
				$('#itemSolicitudeInfo').removeClass('done');

				if (!$('#itemPersonalInfo').hasClass('active')) {
					$('#itemPersonalInfo').addClass('active');
				}
				$('#itemPersonalInfo').removeClass('done');

				$('#sectionPersonalInfo').show();
				$('#sectionSolicitudeInfo').hide();
				$('#sectionSocioeconomicInfo').hide();
				break;
			case 'sectionSolicitudeInfo':
				// Si el fieldset anterior o previo no es valido
				if (typeBtn === 'next') {
					// if (!isValidFieldset('sectionPersonalInfo')) {
					// 	$('#itemPersonalInfo').removeClass('active');
					// 	$('#itemPersonalInfo').find('a').addClass('bg-danger text-white');
					// 	return;
					// }

					// Si es valido
					$('#itemPersonalInfo').find('a').removeClass('bg-danger text-white');
					if (!$('#itemPersonalInfo').hasClass('active')) {
						$('#itemPersonalInfo').addClass('active');
					}
					$('#itemPersonalInfo').addClass('done');
				} else if (typeBtn === 'previous') {
					// Si va hacia atras
					$('#itemSocioeconomicInfo')
						.find('a')
						.removeClass('bg-danger text-white');
					$('#itemSocioeconomicInfo').removeClass('active');
					$('#itemSocioeconomicInfo').removeClass('done');
				}

				if (!$('#itemSolicitudeInfo').hasClass('active')) {
					$('#itemSolicitudeInfo').addClass('active');
				}
				$('#itemSolicitudeInfo').removeClass('done');

				$('#sectionPersonalInfo').hide();
				$('#sectionSolicitudeInfo').show();
				$('#sectionSocioeconomicInfo').hide();
				break;
			case 'sectionSocioeconomicInfo':
				// Si el fieldset anterior no es valido
				// if (!isValidFieldset('sectionSolicitudeInfo')) {
				// 	$('#itemSolicitudeInfo').removeClass('active');
				// 	$('#itemSolicitudeInfo').find('a').addClass('bg-danger text-white');
				// 	return;
				// }

				// Si es valido
				$('#itemSolicitudeInfo').find('a').removeClass('bg-danger text-white');
				if (!$('#itemSolicitudeInfo').hasClass('active')) {
					$('#itemSolicitudeInfo').addClass('active');
				}
				$('#itemSolicitudeInfo').addClass('done');

				if (!$('#itemSocioeconomicInfo').hasClass('active')) {
					$('#itemSocioeconomicInfo').addClass('active');
				}
				$('#itemSocioeconomicInfo').removeClass('done');

				$('#sectionPersonalInfo').hide();
				$('#sectionSolicitudeInfo').hide();
				$('#sectionSocioeconomicInfo').show();
				break;
			case 'submit':
				// if (!isValidFieldset('sectionSocioeconomicInfo')) {
				// 	$('#itemSocioeconomicInfo').removeClass('active');
				// 	$('#itemSocioeconomicInfo')
				// 		.find('a')
				// 		.addClass('bg-danger text-white');
				// 	return;
				// }

				// Si es valido
				$('#itemSocioeconomicInfo')
					.find('a')
					.removeClass('bg-danger text-white');
				if (!$('#itemSocioeconomicInfo').hasClass('active')) {
					$('#itemSocioeconomicInfo').addClass('active');
				}
				$('#itemSocioeconomicInfo').addClass('done');
				break;
			default:
				break;
		}
	});

	$('#form-wizard1').submit(function (e) {
		$('#sectionSocioeconomicInfo').hide();
		$('#spinner').removeClass('d-none');
		setTimeout(function () {}, 1000);
	});
});
