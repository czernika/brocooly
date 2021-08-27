<?php
/**
 * Settings related to view files like views path, caching, templates and namespaces
 *
 * @package Brocooly
 * @since 0.1.0
 */

return [

	/**
	 * --------------------------------------------------------------------------
	 * View namespaces
	 * --------------------------------------------------------------------------
	 *
	 * You may add extra namespace into your view files
	 *
	 * @example
	 * ```
	 * {% include '@components/path/to/view.twig' %}
	 * ```
	 */
	'namespaces' => [
		'components' => 'components',
		'menus'      => 'components/menus',
		'forms'      => 'components/forms',
		'post'       => 'content/post',
		'page'       => 'content/page',
		'shortcodes' => 'shortcodes',
		'blocks'     => 'blocks',
		'templates'  => 'templates',
		'layouts'    => 'layouts',
		'widgets'    => 'widgets',
	],

	/**
	 * --------------------------------------------------------------------------
	 * Templates
	 * --------------------------------------------------------------------------
	 *
	 * Register custom templates
	 *
	 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
	 */
	'templates'  => [],

	/**
	 * --------------------------------------------------------------------------
	 * Shortcodes
	 * --------------------------------------------------------------------------
	 *
	 * Register shortcodes
	 */
	'shortcodes' => [],

	/**
	 * --------------------------------------------------------------------------
	 * Views path
	 * --------------------------------------------------------------------------
	 *
	 * All your directories for view files should bу listed here.
	 * Relative path to a theme root folder.
	 * ! MUST be string in opposite to Timber documentation
	 */
	'views'      => 'resources/views',

	/**
	 * --------------------------------------------------------------------------
	 * Posts per page limit
	 * --------------------------------------------------------------------------
	 *
	 * When you are getting all posts you may set posts_per_page query parameter as -1.
	 * It is recommended way so we're set it 500. This option will override this value
	 *
	 * @since 0.10.2
	 */
	'limit'      => 500,

	/**
	 * --------------------------------------------------------------------------
	 * Default view page
	 * --------------------------------------------------------------------------
	 *
	 * In case you miss to include some view file on unexpected output
	 * this file will be rendered instead of causing error
	 *
	 * @since 0.8.5
	 */
	'default'    => 'callback.twig',

	/**
	 * --------------------------------------------------------------------------
	 * View cache directory storage
	 * --------------------------------------------------------------------------
	 *
	 * Place where all your cached files will be stored under `/views/` directory.
	 * It is available only if WP_ENV === 'production'.
	 * Set `false` to disable
	 *
	 * @link https://timber.github.io/docs/guides/performance/
	 */
	'cache'      => get_template_directory() . '/storage/cache/',

	/**
	 * --------------------------------------------------------------------------
	 * Cache time expire
	 * --------------------------------------------------------------------------
	 *
	 * Set time in seconds cache files will be expired.
	 * Default is 600 (10 minutes)
	 */
	'expire'     => 600, // seconds.

	/**
	 * --------------------------------------------------------------------------
	 * Maintenance mode
	 * --------------------------------------------------------------------------
	 *
	 * Define is maintenance mode enabled or not
	 * @since 0.14.0
	 */
	'maintenance'          => env( 'MAINTENANCE_MODE' ) ?? false,
	'maintenance_template' => env( 'MAINTENANCE_TEMPLATE' ) ?? 'maintenance.twig',

];
