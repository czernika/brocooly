require('dotenv').config();

const { THEME: themeName } = process.env;
const themeFolder = `web/app/themes/${themeName}`;

module.exports = {
	mode: 'jit',

	darkMode: false,

	purge: {
		content: [
			`${themeFolder}/resources/views/**/*.twig`,
			`${themeFolder}/resources/assets/js/**/*.js`,
		],
	},

	theme: {
		container: {
			center: true,
			padding: {
				DEFAULT: '1rem',
			}
		},
		extend: {
			fontFamily: {
				body: ['Montserrat', 'sans-serif'],
			},
			boxShadow: {
				full: '0 0 0 9999px rgba(0, 0, 0, 0.25)',
			},
		},
	},

	variants: {
		extend: {},
	},

	plugins: [],
}
