const loader = {
	test: /\.modernizrrc(\.json)?$/,
	use: [ 'modernizr-loader', 'json-loader' ],
};

module.exports = loader;
