const path             = require('path');
const svgToMiniDataURI = require('mini-svg-data-uri');

const { themeFolder }  = require('../../theme.config');

const loader = {
	test: /\.svg$/,
	include: path.resolve(themeFolder, 'resources/assets/icons'),
	type: 'asset/inline',
	generator: {
		dataUrl: content => svgToMiniDataURI(content.toString())
	},
};

module.exports = loader;
