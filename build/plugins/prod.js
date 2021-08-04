const ShowAssetsTablePlugin    = require('webpack-show-assets-table');
const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer');

const compressionPlugins       = require('../optimization/compression');

const plugins = [
	new ShowAssetsTablePlugin(),
	new BundleAnalyzerPlugin(),
	...compressionPlugins,
];

module.exports = plugins;
