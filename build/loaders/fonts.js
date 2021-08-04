const path            = require('path');

const { themeFolder } = require('../theme.config');

const loader = {
	test: /\.(ttf|eot|woff(2?)|svg)$/,
	include: [
		path.resolve(themeFolder, 'resources/assets/fonts'),
		'/node_modules/',
	],
	type: 'asset/resource',
	generator: {
		filename: 'fonts/[name]/[name].[hash:8][ext]'
	},
};

module.exports = loader;
