require('dotenv').config();

const themeName = 'brocooly';
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
			colors: {
				primary: '#56B300',
				secondary: '#9AD166',
			},
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
