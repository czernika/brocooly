const path = require('path');

const {
	publicFolder, themeFolder
} = require('../theme.config');

const { fileName } = require('../utilities');

const output = {
	path: path.resolve(themeFolder, publicFolder),
	filename: () => fileName('js'),
	publicPath: '',
	clean: {
		dry: false, // change to true for testing.
		keep: (asset) => asset.includes('.gitignore'),
	},
};

module.exports = output;
