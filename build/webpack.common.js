const { merge } = require('webpack-merge');
const { entries, userConfig } = require('./theme.config');

const rules   = require('./rules');
const plugins = require('./plugins/common');
const {
	resolve, stats, output, context,
} = require('./config');

const config = {

	// dynamic entries.
	entry: () => new Promise((r) => r(entries)),

	context,
	output,
	stats,
	plugins,
	resolve,
	module: { rules },
};

module.exports = merge(config, userConfig);
