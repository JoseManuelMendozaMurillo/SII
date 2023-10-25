/**
 * @class
 * Clase para mostrar modales de información
 */
export default class AlertModal {
	/**
	 * @static
	 * @description Método para mostrar un modal de error
	 *
	 * @param {string} titleModal - Titulo del modal
	 * @param {string} message - Mensaje del Modal
	 * @param {boolean} showconfirmBtn - Parametro para saber si se debe mostrar el boton de confirmar
	 * @param {string} confirmBtnText - Texto del boton confirmar
	 * @param {boolean} showCancelBtn - Parametro para saber si se debe mostrar el boton de cancelar
	 * @param {string} cancelBtnText - Texto del boton cancelar
	 *
	 * @returns {Promise<true>}
	 */
	static showError(
		titleModal,
		message = '',
		showconfirmBtn = true,
		confirmBtnText = 'Ok',
		showCancelBtn = false,
		cancelBtnText = '',
	) {
		return this.__showModal(
			'error',
			titleModal,
			message,
			showconfirmBtn,
			confirmBtnText,
			showCancelBtn,
			cancelBtnText,
		);
	}

	/**
	 * @static
	 * @description Método para mostrar un modal de exito
	 *
	 * @param {string} titleModal - Titulo del modal
	 * @param {string} message - Mensaje de exito para el Modal
	 * @param {boolean} showconfirmBtn - Parametro para saber si se debe mostrar el boton de confirmar
	 * @param {string} confirmBtnText - Texto del boton confirmar
	 * @param {boolean} showCancelBtn - Parametro para saber si se debe mostrar el boton de cancelar
	 * @param {string} cancelBtnText - Texto del boton cancelar
	 *
	 * @returns {Promise<true>}
	 */
	static showSuccess(
		titleModal,
		message = '',
		showconfirmBtn = true,
		confirmBtnText = 'Ok',
		showCancelBtn = false,
		cancelBtnText = '',
	) {
		return this.__showModal(
			'success',
			titleModal,
			message,
			showconfirmBtn,
			confirmBtnText,
			showCancelBtn,
			cancelBtnText,
		);
	}

	/**
	 * @static
	 * @description Método para mostrar un modal de advertencia
	 *
	 * @param {string} titleModal - Titulo del modal
	 * @param {string} message - Mensaje del Modal
	 * @param {boolean} showconfirmBtn - Parametro para saber si se debe mostrar el boton de confirmar
	 * @param {string} confirmBtnText - Texto del boton confirmar
	 * @param {boolean} showCancelBtn - Parametro para saber si se debe mostrar el boton de cancelar
	 * @param {string} cancelBtnText - Texto del boton cancelar
	 *
	 * @returns {Promise<true>}
	 */
	static showWarning(
		titleModal,
		message = '',
		showconfirmBtn = true,
		confirmBtnText = 'Ok',
		showCancelBtn = false,
		cancelBtnText = '',
	) {
		return this.__showModal(
			'warning',
			titleModal,
			message,
			showconfirmBtn,
			confirmBtnText,
			showCancelBtn,
			cancelBtnText,
		);
	}

	/**
	 * @static
	 * @description Método para mostrar un modal de informacion
	 *
	 * @param {string} titleModal - Titulo del modal
	 * @param {string} message - Mensaje del Modal
	 * @param {boolean} showconfirmBtn - Parametro para saber si se debe mostrar el boton de confirmar
	 * @param {string} confirmBtnText - Texto del boton confirmar
	 * @param {boolean} showCancelBtn - Parametro para saber si se debe mostrar el boton de cancelar
	 * @param {string} cancelBtnText - Texto del boton cancelar
	 *
	 * @returns {Promise<true>}
	 */
	static showInfo(
		titleModal,
		message = '',
		showconfirmBtn = true,
		confirmBtnText = 'Ok',
		showCancelBtn = false,
		cancelBtnText = '',
	) {
		return this.__showModal(
			'info',
			titleModal,
			message,
			showconfirmBtn,
			confirmBtnText,
			showCancelBtn,
			cancelBtnText,
		);
	}

	/**
	 * @private
	 * @static
	 * @description Método para mostrar un modal
	 *
	 * @param {string} iconModal - Tipo de icono a mostrar en el modal
	 * @param {string} titleModal - Titulo del modal
	 * @param {string} message - Mensaje del Modal
	 * @param {boolean} showconfirmBtn - Parametro para saber si se debe mostrar el boton de confirmar
	 * @param {string} confirmBtnText - Texto del boton confirmar
	 * @param {boolean} showCancelBtn - Parametro para saber si se debe mostrar el boton de cancelar
	 * @param {string} cancelBtnText - Texto del boton cancelar
	 *
	 * @returns {Promise<true|false>}
	 */
	static async __showModal(
		iconModal = '',
		titleModal = '',
		message = '',
		showconfirmBtn = true,
		confirmBtnText = 'Ok',
		showCancelBtn = false,
		cancelBtnText = '',
	) {
		return new Promise((resolve, reject) => {
			Swal.fire({
				icon: iconModal,
				title: titleModal,
				text: message,
				showCancelButton: showCancelBtn,
				cancelButtonText: cancelBtnText,
				showConfirmButton: showconfirmBtn,
				confirmButtonText: confirmBtnText,
			}).then((result) => {
				if (result.isConfirmed) {
					resolve(true);
				} else if (result.dismiss === Swal.DismissReason.cancel) {
					resolve(false);
				} else {
					resolve(false);
				}
			});
		});
	}
}
