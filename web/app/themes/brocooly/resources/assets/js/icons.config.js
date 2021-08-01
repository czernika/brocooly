/**
 * --------------------------------------------------------------------------
 * Configuration object for webfont-loader
 * --------------------------------------------------------------------------
 *
 * List of webfont settings
 */

const themeName    = 'brocooly';
const classPrefix  = `${themeName}-`;
const baseSelector = `.${themeName}-icon`;

module.exports = {
	files: [
		'./../icons/**/*.svg', // relative path to svg files.
	],
	fontName: themeName,
	classPrefix,
	baseSelector,
	types: ['eot', 'woff', 'woff2', 'ttf', 'svg'],
	fileName: 'fonts/[fontname]/icons.[hash:8].[ext]'
};
