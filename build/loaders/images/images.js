const path            = require('path');

const { themeFolder } = require('../../theme.config');

const loader = {
	test: /\.(jp(e?)g|png|gif|ico|webp)$/i,
	include: [
		path.resolve(themeFolder, 'resources/assets/img'),
		'/node_modules/',
	],
	type: 'asset',
	generator: {
		filename: 'img/[name].[hash:8][ext]',
	},
	parser: {
		dataUrlCondition: {
			maxSize: 2 * 1024, // 8kb
		},
	},
	use: [
		{
			loader: 'tinify-loader',
			options: {
				apikey: process.env.TINYPNG_KEY,
			}
		}
	]
};

module.exports = loader;
