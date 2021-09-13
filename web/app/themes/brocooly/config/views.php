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
	 * When you refer path to a template from within twig file, you’ll use the relative path from the main `resources/views` directory at the root of the project. If you need you may specify here a shortcut for some 'long' path (nested directories) and use with `@` prefix
	 *
	 * @example
	 * ```
	 * 'components' => 'components' means `@components` will correspond `components` directory
	 * {% include '@components/path/to/view.twig' %}
	 * ```
	 */
	'namespaces'           => [
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
	 * Register custom templates. Pass special templates classes here
	 *
	 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
	 */
	'templates'            => [],

	/**
	 * --------------------------------------------------------------------------
	 * Shortcodes
	 * --------------------------------------------------------------------------
	 *
	 * Register shortcodes
	 */
	'shortcodes'           => [],

	/**
	 * --------------------------------------------------------------------------
	 * Views path
	 * --------------------------------------------------------------------------
	 *
	 * All your directories for view files should bу listed here.
	 * Relative path to a theme root folder.
	 *
	 * @var string|array
	 */
	'views'                => 'resources/views',

	/**
	 * --------------------------------------------------------------------------
	 * Posts per page limit
	 * --------------------------------------------------------------------------
	 *
	 * When you are getting all posts you may set posts_per_page query parameter as -1.
	 * It is not recommended way so we're set it 100.
	 *
	 * This settings applied for `Post::all()` etc.
	 *
	 * @var int
	 * @since 0.10.2
	 */
	'limit'                => 100,

	/**
	 * --------------------------------------------------------------------------
	 * Default view page
	 * --------------------------------------------------------------------------
	 *
	 * In case you miss to include some view file or unexpected output occurs
	 * this file will be rendered instead of 'undefined template' error
	 *
	 * @var string
	 * @since 0.8.5
	 */
	'default'              => 'callback.twig',

	/**
	 * --------------------------------------------------------------------------
	 * View cache directory storage
	 * --------------------------------------------------------------------------
	 *
	 * Place where all your cached files will be stored under `/views/` directory.
	 * It is available only if WP_ENV === 'production'.
	 * Set `false` to disable
	 *
	 * @var string
	 * @link https://timber.github.io/docs/guides/performance/
	 */
	'cache'                => BROCOOLY_THEME_PATH . '/storage/cache/',

	/**
	 * --------------------------------------------------------------------------
	 * Cache time expire
	 * --------------------------------------------------------------------------
	 *
	 * Set time in seconds cache files will be expired.
	 * Default is 600 (10 minutes)
	 *
	 * @var int|bool
	 */
	'expire'               => 600, // seconds.

	/**
	 * --------------------------------------------------------------------------
	 * Maintenance mode
	 * --------------------------------------------------------------------------
	 *
	 * Define is maintenance mode enabled or not
	 * If it use maintenance template on front of your site.
	 *
	 * @since 0.14.0
	 */
	'maintenance'          => env( 'MAINTENANCE_MODE' ) ?? false,
	'maintenance_template' => env( 'MAINTENANCE_TEMPLATE' ) ?? 'maintenance.twig',

];
