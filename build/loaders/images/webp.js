const path                 = require('path');
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin');

const { themeFolder }      = require('../../theme.config');

const loader = {
	test: /\.(png|jp(e?)g)$/,
	include: [
		path.resolve(themeFolder, 'resources/assets/img'),
		'/node_modules/',
	],
	use: [
		{
			loader: ImageMinimizerPlugin.loader,
			options: {
				severityError: 'warning',
				filename: 'img/[name].[hash:8].webp',
				minimizerOptions: {
					plugins: [
						['webp', { quality: 85 }],
					],
				},
			},
		},
	],
};

module.exports = loader;
