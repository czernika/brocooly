require('dotenv').config();

const {
	THEME: themeName = 'brocooly',
	WP_HOME: proxy,
	BROWSER: browser = 'firefox',
	PUBLIC_FOLDER: publicFolder = 'public',
	MANIFEST: manifestFile = 'manifest.json',
} = process.env;

const themeFolder = `./web/app/themes/${themeName}`;

const {
	entries,
	webpackConfig: userConfig

// eslint-disable-next-line import/no-dynamic-require
} = require(`../brocooly.config.js`);

module.exports = {
	themeName, proxy, browser, publicFolder, entries, userConfig, themeFolder, manifestFile
};
