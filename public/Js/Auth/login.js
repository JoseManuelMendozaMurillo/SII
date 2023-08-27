import { customValidation } from '../../Vendor/Parsley/validations.js';

$(document).ready(function () {
	// Para cambiar los placeholders

	customValidation();

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

				emailInput.dataValidation = 'numerosolicitud';
				emailInput.placeholder = '4567';

				passwordInput.id = 'nip';
				passwordInput.placeholder = '****';
				emailInput.classList.remove('validation-email');
				emailInput.classList.add('validation-numerosolicitud');
				passwordInput.classList.remove('validation-password');
				passwordInput.classList.add('validation-nip');
			} else if (radio.id === 'btnradio1') {
				emailLabel.textContent = originalEmailLabel;
				passwordLabel.textContent = originalPasswordLabel;

				emailInput.dataValidation = 'email';
				emailInput.placeholder = originalEmailPlaceholder;

				passwordInput.placeholder = originalPasswordPlaceholder;
				emailInput.classList.remove('validation-numerosolicitud');
				emailInput.classList.add('validation-email');
				passwordInput.classList.remove('validation-nip');
				passwordInput.classList.add('validation-password');
			}
			customValidation();
		});
	});

	// Inicializar Parsley en el formulario
	$('#form-login').parsley();

	// Manejar el evento de envío del formulario
	$('#form-login').on('submit', function (event) {
		if (!$('#form-login').parsley().isValid()) {
			event.preventDefault(); // Evitar el envío del formulario si hay errores
			alert('Formulario inválido. Por favor, revisa los campos.');
		}
	});
});
