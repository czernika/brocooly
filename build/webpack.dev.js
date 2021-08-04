const { merge }    = require('webpack-merge');

const plugins      = require('./plugins/dev');
const commonConfig = require('./webpack.common');

if (process.env.NODE_ENV === undefined) {
	process.env.NODE_ENV = 'development';
}

const mode    = 'development';
const target  = 'web';
const devtool = 'eval-cheap-source-map';

const config = {
	output: { pathinfo: true },
	target, devtool, plugins, mode,
};
module.exports = merge(config, commonConfig);
