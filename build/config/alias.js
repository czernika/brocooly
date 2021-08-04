const path            = require('path');

const { themeFolder } = require('../theme.config');

const alias = {
	'@': path.resolve(themeFolder), // theme root folder
	'@js': path.resolve(themeFolder, 'resources/assets/js'),
	'@img': path.resolve(themeFolder, 'resources/assets/img'),
	'@sass': path.resolve(themeFolder, 'resources/assets/sass'),
	'@icons': path.resolve(themeFolder, 'resources/assets/icons'),
	'@fonts': path.resolve(themeFolder, 'resources/assets/fonts'),
	'@static': path.resolve(themeFolder, 'resources/static'),
	'@resources': path.resolve(themeFolder, 'resources'),
	'modernizr$': path.resolve('.modernizrrc'),
};

module.exports = alias;
