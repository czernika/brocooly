const modernizrLoader = require('../loaders/modernizr');
const babelLoader     = require('../loaders/babel');
const styleLoader     = require('../loaders/styles');
const webFontsLoader  = require('../loaders/webfonts');
const fontsLoader     = require('../loaders/fonts');
const svgInlineLoader = require('../loaders/images/svg-inline');
const webpLoader      = require('../loaders/images/webp');
const imagesLoader    = require('../loaders/images/images');
const svgLoader       = require('../loaders/images/svg');

const rules = [
	modernizrLoader,
	babelLoader,
	styleLoader,
	webFontsLoader,
	fontsLoader,
	svgInlineLoader,
	webpLoader,
	imagesLoader,
	svgLoader,
];

module.exports = rules;
