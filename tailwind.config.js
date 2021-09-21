require('dotenv').config();

const {
	THEME: themeName = 'brocooly',
} = process.env;
const themeFolder = `web/app/themes/${themeName}`;

module.exports = {
	mode: 'jit',

	darkMode: 'media',

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
				primary: {
					light: '#9AD166',
					dark: '#56B300',
				},
			},
			fontFamily: {
				body: ["'Roboto', sans-serif"],
			},
			boxShadow: {
				full: '0 0 0 9999px rgba(0, 0, 0, 0.25)',
			},
			maxWidth: {
				'1920': '1920px',
			}
		},
	},

	variants: {
		extend: {},
	},

	plugins: [],
}
