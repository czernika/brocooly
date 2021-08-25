const path = require('path');

const isProd = process.env.NODE_ENV === 'production';

module.exports = {
	'env': {
		'browser': true,
		'es6': true,
		'node': true,
	},
	extends: [
		'airbnb-base',
		'prettier',
	],
	parserOptions: {
		'ecmaVersion': 12,
		'sourceType': 'module',
	},
	globals: {
		'wp': true,
	},
	rules: {
		'no-console': isProd ? 'warn' : 'off',
		'no-debugger': isProd ? 'warn' : 'off',
		'indent': [
			'error',
			'tab',
		],
		'no-tabs': [
			'error',
			{
				'allowIndentationTabs': true,
			}
		],
		'no-multi-assign': 'off',
		'import/no-extraneous-dependencies': 'off',
	},
	ignorePatterns: [
		'/vendor/**/*.js',
		'/node_modules/**/*.js',
	],
	settings: {
		'import/resolver': {
			webpack: {
				config: path.join(__dirname, './build/webpack.common.js'),
			}
		}
	}
}
