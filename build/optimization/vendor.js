const optimization = {
	runtimeChunk: 'single',
	splitChunks: {
		chunks: 'all',
		maxInitialRequests: Infinity,
		minSize: 0,
		cacheGroups: {
			vendor: {
				test: /[\\/]node_modules[\\/]/,
				name(module) {
					const packageName = module.context.match(/[\\/]node_modules[\\/](.*?)([\\/]|$)/)[1];
					return `libs/${packageName.replace('@', '')}`;
				},
			},
		},
	},
};

module.exports = optimization;
