const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const { isProd }     = require('../utilities');
const { publicPath } = require('../config');

const loader = {
	test: /\.(s?)(a|c)ss$/i,
	use: [
		{
			loader: MiniCssExtractPlugin.loader,
			options: {
				publicPath,
			},
		},
		{
			loader: 'css-loader',
		},
		{
			loader: 'postcss-loader',
			options: {
				postcssOptions: {
					plugins: isProd ? {
						'webp-in-css/plugin': {},
						'autoprefixer': {},
						'css-declaration-sorter': {},
						'cssnano': { preset: 'default' },
					} :
						{},
				},
			},
		},
		{
			loader: 'sass-loader',
		},
	],
};

module.exports = loader;
