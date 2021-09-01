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

		'comments-reply': './resources/assets/js/components/comments-reply.js',
	},

	/**
	 * Custom webpack configuration
	 */
	webpackConfig: {},

};
