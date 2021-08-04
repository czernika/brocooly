const loader = {
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
};

module.exports = loader;
