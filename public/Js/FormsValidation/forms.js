import { customValidation } from '../../Vendor/Parsley/validationsAspirantes.js';

$(document).ready(function () {
	customValidation();

	const $form = $('#form-wizard1').parsley();

	// Definir regla personalizada para validar fecha máxima
	window.Parsley.addValidator('customdate', {
		requirementType: 'string',
		validateString: function (value, requirement) {
			const today = new Date();
			const selectedDate = new Date(value);

			return (
				selectedDate.toDateString() !== today.toDateString() &&
				selectedDate < today
			);
		},
		messages: {
			en: 'La fecha de nacimiento debe ser anterior a la fecha actual.',
		},
	});

	function showFieldset(idFieldset) {
		switch (idFieldset) {
			case 'sectionPersonalInfo':
				if (!$('#itemPersonalInfo').hasClass('active')) {
					$('#itemPersonalInfo').addClass('active');
				}
				$('#itemPersonalInfo').removeClass('done');
				$('#sectionPersonalInfo').show();
				$('#sectionSolicitudeInfo').hide();
				$('#sectionSocioeconomicInfo').hide();
				break;
			case 'sectionSolicitudeInfo':
				$('#itemPersonalInfo').addClass('done');
				if (!$('#itemSolicitudeInfo').hasClass('active')) {
					$('#itemSolicitudeInfo').addClass('active');
				}
				$('#itemSolicitudeInfo').removeClass('done');
				$('#sectionPersonalInfo').hide();
				$('#sectionSolicitudeInfo').show();
				$('#sectionSocioeconomicInfo').hide();
				break;
			case 'sectionSocioeconomicInfo':
				$('#itemSolicitudeInfo').addClass('done');
				if (!$('#itemSocioeconomicInfo').hasClass('active')) {
					$('#itemSocioeconomicInfo').addClass('active');
				}
				$('#itemSocioeconomicInfo').removeClass('done');
				$('#sectionPersonalInfo').hide();
				$('#sectionSolicitudeInfo').hide();
				$('#sectionSocioeconomicInfo').show();
				break;
			default:
				break;
		}
	}

	// function isValidFieldset(idFieldset) {
	// 	return $('#form-wizard1').parsley().validate({ group: idFieldset });
	// }

	// // Validamos el form por fieldset
	// $('button[name="next"], button[name="previous"]').click(function (event) {
	// 	// const nextFieldset = this.value;
	// 	const actuallyFieldset = $(event.target).parent().attr('id');
	// 	console.log(isValidFieldset(actuallyFieldset));
	// 	// console.log(nextFieldset, actuallyFieldset);
	// 	// showFieldset(nextFieldset);
	// });

	function isValidFieldset(groupName) {
		return $(`#${groupName}`).parsley().isValid();
	}

	// Validamos el form por fieldset
	$('button[name="next"], button[name="previous"]').click(function (event) {
		const groupName = $(event.target).closest('fieldset').data('parsley-group');
		$form
			.whenValidate({
				group: groupName,
			})
			.done(function () {
				console.log('Paso', groupName);
			})
			.error(function () {
				// Esto funciona (averiguar como cachar si el grupo no paso la validacion)
				console.log('No paso');
			});
		// showFieldset(nextFieldset);
	});

	$('#form-wizard1').on('submit', function (event) {
		if (!$('#form-wizard1').parsley().isValid()) {
			event.preventDefault(); // Evitar el envío del formulario si hay errores
			alert('Formulario inválido. Por favor, revisa los campos.');
		}
	});
});
