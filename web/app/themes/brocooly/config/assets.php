<?php
/**
 * Configuration options fro scripts and styles
 *
 * @package Brocooly
 * @since 0.1.0
 */

use function Env\env;

return [

	/**
	 * --------------------------------------------------------------------------
	 * Enqueue all scripts and styles by default
	 * --------------------------------------------------------------------------
	 *
	 * If set to true all generated scripts and styles will be enqueued on every page.
	 *
	 * Useful for development but in a production it is recommended to load assets on separate pages with a link tag
	 */
	'autoload'       => ! isProduction(),

	/**
	 * --------------------------------------------------------------------------
	 * Public folder
	 * --------------------------------------------------------------------------
	 *
	 * Where all assets will compiled
	 * It is recommended to change it in `.env` file.
	 */
	'public'         => env( 'PUBLIC_FOLDER' ) ?? 'public',

	/**
	 * --------------------------------------------------------------------------
	 * Manifest name
	 * --------------------------------------------------------------------------
	 *
	 * Manifest filename
	 * Requires to be changed also in webpack configuration file
	 */
	'manifest'       => 'manifest.json',

	/**
	 * --------------------------------------------------------------------------
	 * Styles and scripts excluded from autoloading
	 * --------------------------------------------------------------------------
	 *
	 * You may exclude some files from autoloading
	 * if you pass its handler from manifest file here.
	 */
	'excludedStyles'  => [],

	'excludedScripts' => [
		'comments-reply.js', // this requires only on singular pages with comments enabled.
	],

];
