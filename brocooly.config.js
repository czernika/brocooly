/**
 * --------------------------------------------------------------------------
 * App configuration file
 * --------------------------------------------------------------------------
 *
 * This file is used for compiling your assets
 * and extra webpack functionality
 */

module.exports = {

	/**
	 * Path should be relative to Brocooly theme root folder
	 */
	entries: {
		main: [
			'./resources/assets/js/app.js',
			'./resources/assets/sass/app.scss',
		],
	},

	/**
	 * Merge scripts together in one file in production mod (`true`)
	 * or separate them in chunks (`false`)
	 */
	concat: true,

	/**
	 * Browser to open in development watch mode
	 */
	browser: 'firefox',

	/**
	 * Custom webpack configuration
	 */
	webpackConfig: {},

};
