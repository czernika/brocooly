const path                        = require('path');
const CopyPlugin                  = require('copy-webpack-plugin');
const WebpackBar                  = require('webpackbar');
const ESLintPlugin                = require('eslint-webpack-plugin');
const StyleLintPlugin             = require('stylelint-webpack-plugin');
const SVGSpritemapPlugin          = require('svg-spritemap-webpack-plugin');
const MiniCssExtractPlugin        = require('mini-css-extract-plugin');
const WebpackNotifierPlugin       = require('webpack-notifier');
const WebpackAssetsManifest       = require('webpack-assets-manifest');
const CaseSensitivePathsPlugin    = require('case-sensitive-paths-webpack-plugin');
const FriendlyErrorsWebpackPlugin = require('@soda/friendly-errors-webpack-plugin');

const {
	themeName, publicFolder, themeFolder, manifestFile
} = require('../theme.config');

const { fileName } = require('../utilities');

const plugins = [

	new MiniCssExtractPlugin({
		filename: () => fileName('css'),
	}),

	new CopyPlugin({
		patterns: [
			{ from: path.resolve(themeFolder, 'resources/static'), to: 'static' },
		],
	}),

	new SVGSpritemapPlugin(
		`${themeFolder}/resources/assets/icons/**/*.svg`,
	),

	new WebpackNotifierPlugin({
		title: themeName,
		excludeWarnings: true,
	}),

	new WebpackAssetsManifest({
		output: manifestFile,
		space: 4,
	}),

	new WebpackBar({
		name: themeName,
	}),

	new CaseSensitivePathsPlugin(),

	new ESLintPlugin({
		formatter: 'stylish'
	}),

	new FriendlyErrorsWebpackPlugin(),

	new StyleLintPlugin({
		exclude: [
			'/node_modules/',
			path.resolve(themeFolder, publicFolder, 'css'), // compiled css files.
			path.resolve(themeFolder, 'style.css'), // style.css.
		],
		failOnError: false,
	}),
];

module.exports = plugins;
