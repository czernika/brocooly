<?php
/**
 * Configuration options for scripts and styles (CSS and JS files)
 *
 * @package Brocooly
 * @since 0.1.0
 */

use function Env\env;

return [

	/**
	 * --------------------------------------------------------------------------
	 * Localization script
	 * --------------------------------------------------------------------------
	 *
	 * Will be used inside `wp_localize_script` hook
	 *
	 * Key is the script handler to attach localization object.
	 *
	 * @since 0.14.2
	 */
	'localize'        => [],

	/**
	 * --------------------------------------------------------------------------
	 * Enqueue all scripts and styles by default
	 * --------------------------------------------------------------------------
	 *
	 * If set to true all generated scripts and styles will be enqueued on every page.
	 *
	 * Useful for development but in a production it is recommended to load assets on separate pages with a link tag
	 *
	 * @var bool
	 */
	'autoload'        => true,

	/**
	 * --------------------------------------------------------------------------
	 * Public folder
	 * --------------------------------------------------------------------------
	 *
	 * Where all assets will compiled
	 * It is recommended to change it in `.env` file as it is also used in webpack configuration file
	 */
	'public'          => env( 'PUBLIC_FOLDER' ) ?? 'public',

	/**
	 * --------------------------------------------------------------------------
	 * Manifest name
	 * --------------------------------------------------------------------------
	 *
	 * The name of generated manifest file
	 * Used for autoloading
	 */
	'manifest'        => env( 'MANIFEST' ) ?? 'manifest.json',

	/**
	 * --------------------------------------------------------------------------
	 * Styles and scripts excluded from autoloading
	 * --------------------------------------------------------------------------
	 *
	 * You may exclude some files from autoloading if you pass its handler from manifest file here.
	 */
	'excludedStyles'  => [],

	'excludedScripts' => [],

];
