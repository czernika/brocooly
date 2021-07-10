require('dotenv').config();

const path                        = require('path');
const webpack                     = require('webpack');

const MiniCssExtractPlugin        = require('mini-css-extract-plugin');
const ImageMinimizerPlugin        = require('image-minimizer-webpack-plugin');
const svgToMiniDataURI            = require('mini-svg-data-uri');
const CompressionPlugin           = require('compression-webpack-plugin');
const zlib                        = require('zlib');
const CopyPlugin                  = require('copy-webpack-plugin');

const BrowserSyncPlugin           = require('browser-sync-webpack-plugin');

const WebpackBar                  = require('webpackbar');
const WebpackNotifierPlugin       = require('webpack-notifier');
const ShowAssetsTablePlugin       = require('webpack-show-assets-table');
const WebpackAssetsManifest       = require('webpack-assets-manifest');
const { BundleAnalyzerPlugin }    = require('webpack-bundle-analyzer');

const FriendlyErrorsWebpackPlugin = require('@soda/friendly-errors-webpack-plugin');
const ESLintPlugin                = require('eslint-webpack-plugin');
const StyleLintPlugin             = require('stylelint-webpack-plugin');

const CaseSensitivePathsPlugin    = require('case-sensitive-paths-webpack-plugin');

const { merge }                   = require('webpack-merge');

const {
	NODE_ENV: mode,
	THEME: themeName = 'brocooly',
	WP_HOME,
	BROWSER = 'firefox',
	PUBLIC_FOLDER: publicFolder = 'public',
} = process.env;

const themeFolder = `./web/app/themes/${themeName}`;

// Define is it production mode or not
const isProd = mode === 'production';
if (mode === undefined) {
	process.env.NODE_ENV = 'production';
}

const {
	entries,
	webpackConfig: userConfig

// eslint-disable-next-line import/no-dynamic-require
} = require(`${themeFolder}/resources/brocooly.config.js`);

// Filename output for js and css files
const fileName = (ext) => isProd ? `${ext}/[name].[contenthash:8].${ext}` : `${ext}/[name].${ext}`;

// Public path for output
const publicPath = '../';

const stats = 'errors-only';
const target = isProd ? 'browserslist' : 'web';
const devtool = isProd ? false : 'eval-cheap-source-map';

// Theme namespaces
const alias = {
	'@': path.resolve(themeFolder), // theme root folder
	'@js': path.resolve(themeFolder, 'resources/assets/js'),
	'@img': path.resolve(themeFolder, 'resources/assets/img'),
	'@sass': path.resolve(themeFolder, 'resources/assets/sass'),
	'@icons': path.resolve(themeFolder, 'resources/assets/icons'),
	'@fonts': path.resolve(themeFolder, 'resources/assets/fonts'),
	'@static': path.resolve(themeFolder, 'resources/static'),
	'@resources': path.resolve(themeFolder, 'resources'),
};

// All plugins
const plugins = [

	new MiniCssExtractPlugin({
		filename: () => fileName('css'),
	}),

	new BrowserSyncPlugin(
		{
			proxy: WP_HOME,
			files: [
				path.resolve(themeFolder, './resources/views/**/*.twig'),
				path.resolve(themeFolder, './**/*.php'),
				path.resolve(themeFolder, './style.css'),
				path.resolve(__dirname, 'aliha/core/**/*.php'),
			],
			browser: BROWSER,
			notify: false,
			open: true,
		}
	),

	new CopyPlugin({
		patterns: [
			{ from: path.resolve(themeFolder, 'resources/static'), to: 'static' },
		],
	}),

	new WebpackNotifierPlugin({
		title: themeName,
		excludeWarnings: true,
	}),

	new WebpackAssetsManifest({
		output: 'manifest.json',
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
			path.resolve(themeFolder, publicFolder, 'css'), // compiled css files
		],
		failOnError: false,
	}),
];

if(!isProd) {
	plugins.push(
		new webpack.SourceMapDevToolPlugin({
			filename: '[file].map',
		}),
	)
}

if(isProd) {
	plugins.push(
		new ShowAssetsTablePlugin(),

		new BundleAnalyzerPlugin(),

		new CompressionPlugin({
			filename: '[path][base].gz',
			algorithm: 'gzip',
			test: /\.(js|css)$/,
			threshold: 4 * 1024, // 4 kb
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
	)
}

/**
 * Default configuration
 */
const config = {

	context: path.resolve(themeFolder),

	target,

	devtool,

	entry: () => new Promise((resolve) => resolve(entries)),

	output: {
		path: path.resolve(themeFolder, publicFolder),
		filename: () => fileName('js'),
		publicPath: '',
		clean: {
			dry: false, // change to true for testing.
			keep: (asset) => asset.includes('languages') || asset.includes('.gitignore'),
		},
		pathinfo: !isProd,
	},

	stats,

	resolve: {
		alias,
		symlinks: false,
	},

	plugins,

	optimization:
	isProd ?
		{
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
		} :
		{},

	module: {
		rules: [
			{
				test: /\.m?js$/,
				exclude: [
					/@babel(?:\/|\\{1,2})runtime|core-js/,
					/(node_modules|bower_components)/,
				],
				use: {
					loader: 'babel-loader',
					options: {
						presets: [
							[
								'@babel/preset-env',
								{
									'corejs': '3',
									'useBuiltIns': 'usage',
									'debug': false
								},
							],
						],
					},
				},
			},
			{
				test: /icons\.config\.js$/i,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							url: false,
						},
					},
					{
						loader: 'webfonts-loader',
						options: {
							publicPath,
						},
					},
				],
			},
			{
				test: /\.(s?)(a|c)ss$/i,
				use: [
					{
						loader: MiniCssExtractPlugin.loader,
						options: {
							publicPath,
						},
					},
					{
						loader: 'css-loader',
					},
					{
						loader: 'postcss-loader',
						options: {
							postcssOptions: {
								plugins: isProd ? {
									'webp-in-css/plugin': {},
									'autoprefixer': {},
									'css-declaration-sorter': {},
									'cssnano': { preset: 'default' },
								} :
									{},
							},
						},
					},
					{
						loader: 'sass-loader',
					},
				],
			},
			{
				test: /\.svg$/,
				include: [
					path.resolve(themeFolder, 'resources/assets/img'),
					'/node_modules/',
				],
				type: 'asset/resource',
				generator: {
					filename: 'img/[name].[hash:8][ext]'
				},
				parser: {
		 			dataUrlCondition: {
		   				maxSize: 8 * 1024, // 8kb
		 			},
	   			},
				use: [
					{
						loader: ImageMinimizerPlugin.loader,
						options: {
							severityError: 'warning',
							minimizerOptions: {
								plugins: [
									[
										'svgo',
										{
											plugins: [
												{
													name: 'removeViewBox',
													active: false,
												},
												{
													name: 'removeDimensions',
													active: true,
												},
												{
													name: 'cleanupIDs',
													params: {
														remove: true,
													},
												},
												{
													name: 'addClassesToSVGElement',
													params: {
														className: 'svg-icon',
													},
												},
												{
													name: 'addAttributesToSVGElement',
													params: {
														attributes: [
															{
																xmlns: 'http://www.w3.org/2000/svg',
																role: 'img',
																focusable: 'false',
																'aria-hidden': 'true',
															}
														],
													},
												},
											],
										},
									],
								],
							},
						},
					},
				],
			},
			{
				test: /\.(jp(e?)g|png|gif|ico|webp)$/i,
				include: [
					path.resolve(themeFolder, 'resources/assets/img'),
					'/node_modules/',
				],
				type: 'asset',
				generator: {
					filename: 'img/[name].[hash:8][ext]'
				},
	   			parser: {
		 			dataUrlCondition: {
		   				maxSize: 8 * 1024, // 8kb
		 			},
	   			},
				use: [
					{
						loader: ImageMinimizerPlugin.loader,
						options: {
							severityError: 'warning',
							minimizerOptions: {
								plugins: [
									['gifsicle', { interlaced: true, optimizationLevel: 3 }],
									['mozjpeg', { quality: 80 }],
									['pngquant', { quality: [0.6, 0.8] }],
								],
							},
						},
					},
				],
			},
			{
				test: /\.(png|jp(e?)g)$/,
				include: [
					path.resolve(themeFolder, 'resources/assets/img'),
					'/node_modules/',
				],
				use: [
					{
						loader: ImageMinimizerPlugin.loader,
						options: {
							severityError: 'warning',
							filename: 'img/[name].[hash:8].webp',
							minimizerOptions: {
								plugins: [
									['webp', { quality: 85 }],
								],
							},
						},
					},
				],
			},
			{
				test: /\.svg$/,
				include: path.resolve(themeFolder, 'resources/assets/icons'),
				type: 'asset/inline',
				generator: {
					dataUrl: content => svgToMiniDataURI(content.toString())
				},
			},
			{
				test: /\.(ttf|eot|woff(2?)|svg)$/,
				include: [
					path.resolve(themeFolder, 'resources/assets/fonts'),
					'/node_modules/',
				],
				type: 'asset/resource',
				generator: {
					filename: 'fonts/[name]/[name].[hash:8][ext]'
				},
			},
		],
	},
};

module.exports = merge(config, userConfig);
