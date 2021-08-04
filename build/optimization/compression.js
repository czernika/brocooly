const CompressionPlugin = require('compression-webpack-plugin');
const zlib              = require('zlib');

const compressionPlugins = [
	new CompressionPlugin({
		filename: '[path][base].gz',
		algorithm: 'gzip',
		test: /\.(js|css)$/,
		threshold: 4 * 1024, // 4 kb.
		minRatio: 0.8,
	}),
	new CompressionPlugin({
		filename: '[path][base].br',
		algorithm: 'brotliCompress',
		test: /\.(js|css)$/,
		compressionOptions: {
			params: {
				[zlib.constants.BROTLI_PARAM_QUALITY]: 11,
			},
		},
		threshold: 4 * 1024, // 4 kb
		minRatio: 0.8,
	}),
];

module.exports = compressionPlugins;
