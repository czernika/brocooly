const isProd = require('./isprod');

const resolveFileName = (ext) => isProd ? `${ext}/[name].[contenthash:8].min.${ext}` : `${ext}/[name].${ext}`;

module.exports = resolveFileName;
