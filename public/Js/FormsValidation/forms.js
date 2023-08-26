import { customValidation } from '../../Vendor/Parsley/validationsAspirantes.js';

$(document).ready(function () {
	customValidation();

	$('#form-wizard1').parsley();

	// Definir regla personalizada para validar fecha máxima
	window.Parsley.addValidator('customdate', {
		requirementType: 'string',
		validateString: function (value, requirement) {
			var today = new Date();
			var selectedDate = new Date(value);

			return (
				selectedDate.toDateString() !== today.toDateString() &&
				selectedDate < today
			);
		},
		messages: {
			en: 'La fecha de nacimiento debe ser anterior a la fecha actual.',
		},
	});

	$('#form-wizard1').on('submit', function (event) {
		if (!$('#form-wizard1').parsley().isValid()) {
			event.preventDefault(); // Evitar el envío del formulario si hay errores
			alert('Formulario inválido. Por favor, revisa los campos.');
		}
	});
});
