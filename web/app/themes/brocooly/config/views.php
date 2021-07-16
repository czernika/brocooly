<?php
/**
 * Return config options for TimberServiceProvider
 * like custom views, namespaces and cache path
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Theme\Templates\AboutTemplate;

return [

	/**
	 *--------------------------------------------------------------------------
	 * View Storage Path
	 *--------------------------------------------------------------------------
	 *
	 * All your directories for view files should bу listed here.
	 * Relative path to a theme root folder.
	 * ! MUST be string in opposite to Timber documentation
	 */
	'views'      => 'resources/views',

	/**
	 *--------------------------------------------------------------------------
	 * View Cache Path
	 *--------------------------------------------------------------------------
	 *
	 * Place where all your cached files will be stored.
	 * It is available only if WP_ENV === 'production'.
	 * Set `false` to disable
	 */
	'cache'      => false,

	/**
	 *--------------------------------------------------------------------------
	 * View Namespaces
	 *--------------------------------------------------------------------------
	 *
	 * You may add extra namespace into your view files
	 * Use it like `{% include '@components/path/to/view.twig' %}`
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
	 *--------------------------------------------------------------------------
	 * Templates
	 *--------------------------------------------------------------------------
	 *
	 * Register custom templates
	 */
	'templates' => [
		AboutTemplate::class,
	],

];
