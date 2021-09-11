<?php
/**
 * Return config options for TimberServiceProvider
 * like custom functions and filters
 *
 * You can extend Twig by adding custom functionality like functions or filters.
 * Timber provides its own classes (Timber\Twig_Function and Timber\Twig_Filter)
 * to provide better compatibility with different versions of Twig.
 *
 * @see https://timber.github.io/docs/guides/extending-timber/#adding-functionality-to-twig
 * @package Brocooly
 * @since 0.1.0
 */

return [

	/**
	 * --------------------------------------------------------------------------
	 * Add custom functions to Twig
	 * --------------------------------------------------------------------------
	 *
	 * @example
	 * ```
	 * {{ asset('path/to/asset') }}
	 * ```
	 * will return compiled asset if it exists
	 */
	'functions' => [

		/**
		 * Assets helper methods
		 */
		'asset',
		'sprite',

		/**
		 * Get theme mod
		 */
		'mod',
		'rawmod'    => 'get_theme_mod',

		/**
		 * Form action handler
		 */
		'handler'   => 'action',

		/**
		 * Carbon fields meta helpers
		 */
		'post_meta' => 'carbonPostMeta',
	],

	/**
	 * --------------------------------------------------------------------------
	 * Add custom filters to Twig
	 * --------------------------------------------------------------------------
	 *
	 * @example
	 * ```
	 * {{ 'post.content|wp_trim_words(7)' }}
	 * ```
	 * will trim content to 7 words
	 */
	'filters'   => [

		/**
		 * Wrapper for most used WordPress filters
		 */
		'antispambot',
		'wp_trim_words',

		/**
		 * Copyrights filter
		 */
		'copyrights',
	],

];
