require('dotenv').config();

const { merge }    = require('webpack-merge');

const plugins      = require('./plugins/prod');
const commonConfig = require('./webpack.common');
const chunkScripts = require('./optimization/vendor');

if (process.env.NODE_ENV === undefined) {
	process.env.NODE_ENV = 'production';
}

const mode    = 'production';
const target  = 'browserslist';
const devtool = false;

const concatScripts = process.env.CONCAT_SCRIPTS_IN_PRODUCTION;
const optimization  = concatScripts ? {} : chunkScripts;

const config = {
	output: { pathinfo: false },
	target, devtool, plugins, mode, optimization,
};
module.exports = merge(config, commonConfig);
