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
	 * Views Path
	 * --------------------------------------------------------------------------
	 *
	 * All your directories for view files should bу listed here.
	 * Relative path to a theme root folder.
	 * ! MUST be string in opposite to Timber documentation
	 */
	'views'      => 'resources/views',

	/**
	 * --------------------------------------------------------------------------
	 * View Namespaces
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
		'shortcodes' => 'shortcodes',
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
	 * View Cache Path
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
	'expire'     => 600,

];
