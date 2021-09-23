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
		screens: {
			'sm': '640px',
			// => @media (min-width: 640px) { ... }

			'md': '768px',
			// => @media (min-width: 768px) { ... }

			'lg': '1024px',
			// => @media (min-width: 1024px) { ... }

			'xl': '1280px',
			// => @media (min-width: 1280px) { ... }

			'2xl': '1536px',
			// => @media (min-width: 1536px) { ... }
		},
		container: {
			center: true,
			padding: {
				DEFAULT: '1rem', // 16px both sides
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
