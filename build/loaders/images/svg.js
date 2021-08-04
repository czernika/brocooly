const path                 = require('path');
const ImageMinimizerPlugin = require('image-minimizer-webpack-plugin');

const { themeFolder }      = require('../../theme.config');

const loader = {
	test: /\.svg$/,
	include: [
		path.resolve(themeFolder, 'resources/assets/img'),
		'/node_modules/',
	],
	type: 'asset/resource',
	generator: {
		filename: 'img/[name].[hash:8][ext]'
	},
	parser: {
		dataUrlCondition: {
			maxSize: 8 * 1024, // 8kb
		},
	},
	use: [
		{
			loader: ImageMinimizerPlugin.loader,
			options: {
				severityError: 'warning',
				minimizerOptions: {
					plugins: [
						[
							'svgo',
							{
								plugins: [
									{
										name: 'removeViewBox',
										active: false,
									},
									{
										name: 'removeDimensions',
										active: true,
									},
									{
										name: 'cleanupIDs',
										params: {
											remove: true,
										},
									},
									{
										name: 'addClassesToSVGElement',
										params: {
											className: 'svg-icon',
										},
									},
									{
										name: 'addAttributesToSVGElement',
										params: {
											attributes: [
												{
													xmlns: 'http://www.w3.org/2000/svg',
													role: 'img',
													focusable: 'false',
													'aria-hidden': 'true',
												}
											],
										},
									},
								],
							},
						],
					],
				},
			},
		},
	],
};

module.exports = loader;
