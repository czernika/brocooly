<?php
/**
 * Return config options for TimberServiceProvider
 * like custom functions and filters
 *
 * @package Brocooly
 * @since 0.1.0
 */

return [

	/**
	 *--------------------------------------------------------------------------
	 * Add custom functions to Twig
	 *--------------------------------------------------------------------------
	 *
	 * Place where all your cached files will be stored.
	 * It is available only if WP_ENV === 'production'.
	 * Set `false` to disable
	 *
	 */
	'functions' => [

		/**
		 * Help to include correct production bundle accordingly to manifest file
		 */
		'asset'  => 'asset',

		/**
		 * Get theme mod without prefix
		 */
		'mod'    => 'mod',

		/**
		 * Get theme mod
		 */
		'rawmod' => 'get_theme_mod',
	],

	/**
	 *--------------------------------------------------------------------------
	 * Add custom filters to Twig
	 *--------------------------------------------------------------------------
	 *
	 * Place where all your cached files will be stored.
	 * It is available only if WP_ENV === 'production'.
	 * Set `false` to disable
	 *
	 */
	'filters'   => [

		/**
		 * Wrapper for most used WordPress filters
		 */
		'antispambot'   => 'antispambot',
		'wp_trim_words' => 'wp_trim_words',
	],

];
