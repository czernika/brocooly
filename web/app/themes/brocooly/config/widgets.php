<?php
/**
 * Register theme custom widgets and sidebars
 *
 * @package Brocooly
 * @since 0.4.0
 */

use Theme\Widgets\BlogSidebar;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Load default widgets or not?
	 *--------------------------------------------------------------------------
	 *
	 * Set to `false` if you don't want to register default WordPress widgets
	 */
	'loadDefaults' => false,

	/**
	 *--------------------------------------------------------------------------
	 * Sidebars and Widgets
	 *--------------------------------------------------------------------------
	 *
	 * Register widgets and location for them
	 * If you wish to register only specific WordPress widget (for example, WP_Widget_Search)
	 * add it here also.
	 *
	 * List of all default WordPress widgets can be found here:
	 *
	 * @link https://github.com/WordPress/WordPress/blob/master/wp-includes/default-widgets.php
	 */
	'sidebars'     => [
		BlogSidebar::class,
	],

	'widgets'      => [
		WP_Widget_Search::class,
	],
];
