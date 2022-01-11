const modernizrLoader = require('../loaders/modernizr');
const babelLoader     = require('../loaders/babel');
const styleLoader     = require('../loaders/styles');
const fontsLoader     = require('../loaders/fonts');
const svgInlineLoader = require('../loaders/images/svg-inline');
const imagesLoader    = require('../loaders/images/images');
const svgLoader       = require('../loaders/images/svg');

const rules = [
	modernizrLoader,
	babelLoader,
	styleLoader,
	fontsLoader,
	svgInlineLoader,
	imagesLoader,
	svgLoader,
];

module.exports = rules;
