module.exports = {
	env: {
		browser: true,
		es2021: true,
	},
	extends: ['standard', 'eslint-config-prettier'],
	overrides: [
		{
			env: {
				node: true,
			},
			files: ['.eslintrc.{js,cjs}'],
			parserOptions: {
				sourceType: 'script',
			},
		},
	],
	parserOptions: {
		ecmaVersion: 'latest',
		sourceType: 'module',
	},
	globals: {
		$: true, // Permite la variable $ de jQuery
	},
	rules: {
		'no-unused-vars': 'warn', // Variables sin usar como warning
		quotes: ['warn', 'single'], // Uso de comillas dobles ("") como warning
		semi: ['error', 'always'], // No poner punto y coma (;) como error
	},
};
