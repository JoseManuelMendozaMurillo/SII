import { customValidation } from '../../Vendor/Parsley/validations.js';

$(document).ready(function () {
	// Para cambiar los placeholdes
	const radioButtons = document.querySelectorAll('.btn-check');
	const emailLabel = document.querySelector('label[for="email"]');
	const passwordLabel = document.querySelector('label[for="password"]');
	const emailInput = document.querySelector('input[name="email"]');
	const passwordInput = document.querySelector('input[name="password"]');

	const originalEmailLabel = emailLabel.textContent;
	const originalPasswordLabel = passwordLabel.textContent;
	const originalEmailPlaceholder = emailInput.placeholder;
	const originalPasswordPlaceholder = passwordInput.placeholder;

	radioButtons.forEach(function (radio) {
		radio.addEventListener('change', function () {
			if (radio.id === 'btnradio3') {
				emailLabel.textContent = 'Número de solicitud: *';
				passwordLabel.textContent = 'NIP: *';
				emailInput.name = 'numerosolicitud';
				emailInput.placeholder = '4567';
				passwordInput.name = 'nip';
				passwordInput.placeholder = '****';
			} else if (radio.id === 'btnradio1') {
				emailLabel.textContent = originalEmailLabel;
				passwordLabel.textContent = originalPasswordLabel;
				emailInput.name = 'email';
				emailInput.placeholder = originalEmailPlaceholder;
				passwordInput.name = 'password';
				passwordInput.placeholder = originalPasswordPlaceholder;
			}
		});
	});

	// Llamar a la función para aplicar las validaciones genéricas
	customValidation();

	// Inicializar Parsley en el formulario
	$('#form-login').parsley();

	// Manejar el evento de envío del formulario
	$('#form-login').on('submit', function (event) {
		event.preventDefault(); // Evitar el envío del formulario si hay errores
		if ($('#form-login').parsley().isValid()) {
			alert('Formulario válido. Se puede enviar.');
		} else {
			alert('Formulario inválido. Por favor, revisa los campos.');
		}
	});
});
