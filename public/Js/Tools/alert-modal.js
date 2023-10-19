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
	 * @returns {Promise<true>}
	 */
	static showError(titleModal, message = '') {
		return this.__showModal('error', titleModal, message);
	}

	/**
	 * @static
	 * @description Método para mostrar un modal de exito
	 *
	 * @param {string} titleModal - Titulo del modal
	 * @param {string} message - Mensaje de exito para el Modal
	 * @returns {Promise<true>}
	 */
	static showSuccess(titleModal, message = '') {
		return this.__showModal('success', titleModal, message);
	}

	/**
	 * @static
	 * @description Método para mostrar un modal de informacion
	 *
	 * @param {string} titleModal - Titulo del modal
	 * @param {string} message - Mensaje del Modal
	 * @returns {Promise<true>}
	 */
	static showInfo(titleModal, message = '') {
		return this.__showModal('info', titleModal, message);
	}

	/**
	 * @private
	 * @static
	 * @description Método para mostrar un modal
	 *
	 * @param {string} titleModal - Titulo del modal
	 * @param {string} message - Mensaje del Modal
	 * @returns {Promise<true>}
	 */
	static async __showModal(iconModal = '', titleModal = '', message = '') {
		return new Promise((resolve, reject) => {
			Swal.fire({
				icon: iconModal,
				title: titleModal,
				text: message,
			}).then((result) => {
				if (result.isConfirmed) {
					resolve(true);
				} else if (result.dismiss === Swal.DismissReason.cancel) {
					resolve(true);
				} else {
					resolve(true);
				}
			});
		});
	}
}
