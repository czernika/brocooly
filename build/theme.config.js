require('dotenv').config();

const {
	THEME: themeName = 'brocooly',
	WP_HOME: proxy,
	PUBLIC_FOLDER: publicFolder = 'public',
	MANIFEST: manifestFile = 'manifest.json',
} = process.env;

const themeFolder = `./web/app/themes/${themeName}`;

const {
	entries,
	concat,
	browser,
	webpackConfig: userConfig
} = require(`../brocooly.config.js`);

module.exports = {
	themeName, proxy, browser, publicFolder, entries, userConfig, themeFolder, manifestFile, concat
};
