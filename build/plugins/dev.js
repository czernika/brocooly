const path              = require('path');
const webpack           = require('webpack');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

const {
	proxy, browser, themeFolder
} = require('../theme.config');

const plugins = [

	new BrowserSyncPlugin(
		{
			proxy,
			files: [
				path.resolve(themeFolder, './resources/views/**/*.twig'),
				path.resolve(themeFolder, './**/*.php'),
				path.resolve(themeFolder, './style.css'),
				path.resolve(__dirname, './czernika/brocooly/**/*.php'),
			],
			browser,
			notify: false,
			open: true,
		}
	),

	new webpack.SourceMapDevToolPlugin({
		filename: '[file].map',
	}),

];

module.exports = plugins;
