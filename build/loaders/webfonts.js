const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const { publicPath } = require('../config');

const loader = {
	test: /icons\.config\.js$/i,
	use: [
		MiniCssExtractPlugin.loader,
		{
			loader: 'css-loader',
			options: {
				url: false,
			},
		},
		{
			loader: 'webfonts-loader',
			options: {
				publicPath,
			},
		},
	],
};

module.exports = loader;
