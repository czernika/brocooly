const isProd = require('./isprod');

const resolveFileName = (ext) => isProd ? `${ext}/[name].[contenthash:8].${ext}` : `${ext}/[name].${ext}`;

module.exports = resolveFileName;
