require('dotenv').config();

const { merge }    = require('webpack-merge');

const plugins      = require('./plugins/prod');
const commonConfig = require('./webpack.common');
const chunkScripts = require('./optimization/vendor');

const { concat: concatScripts } = require('./theme.config');

if (process.env.NODE_ENV === undefined) {
	process.env.NODE_ENV = 'production';
}

const mode    = 'production';
const target  = 'browserslist';
const devtool = false;

const optimization  = concatScripts ? {} : chunkScripts;

const config = {
	output: { pathinfo: false },
	target, devtool, plugins, mode, optimization,
};
module.exports = merge(config, commonConfig);
