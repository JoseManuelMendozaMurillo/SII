// Definimos un objeto que contiene las constantes
const config = {
	BASE_URL: function (route = '') {
		return `https://localhost/public/${route}`;
	},
};

// Exportamos el objeto para que esté disponible en otros archivos
export default config;
