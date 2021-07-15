<?php
/**
 * Return config options for AssetsLoader
 *
 * @package Brocooly
 * @since 0.1.0
 */

use function Env\env;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Enqueue all assets like scripts and styles by default
	 *--------------------------------------------------------------------------
	 *
	 * If set to true all generated custom scripts and styles
	 * will be generated on every page.
	 *
	 * Useful for development but in a production it is recommended to load assets on separate pages
	 *
	 */
	'autoload'       => env( 'WP_ENV' ) != 'production',

	/**
	 *--------------------------------------------------------------------------
	 * Public folder
	 *--------------------------------------------------------------------------
	 *
	 * Where all assets will compiled
	 *
	 */
	'public'         => env( 'PUBLIC_FOLDER' ) ?? 'public',

	/**
	 *--------------------------------------------------------------------------
	 * Manifest name
	 *--------------------------------------------------------------------------
	 *
	 * Manifest filename
	 * Requires to be changed also in `webpack.config.js`
	 *
	 */
	'manifest'       => 'manifest.json',

	/**
	 *--------------------------------------------------------------------------
	 * Styles excluded from autoloading
	 *--------------------------------------------------------------------------
	 *
	 * TODO: improve functionality
	 */
	'excludeStyles'  => [],

	/**
	 *--------------------------------------------------------------------------
	 * Scripts excluded from autoloading
	 *--------------------------------------------------------------------------
	 *
	 * TODO: improve functionality
	 */
	'excludeScripts' => [
		'comments-reply.js',
	],

];
