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
	 * Set to `false` if ypu don't want to register default WordPress widgets
	 */
	'loadDefaults' => false,

	/**
	 *--------------------------------------------------------------------------
	 * Sidebars and Widgets
	 *--------------------------------------------------------------------------
	 *
	 * Register widgets and location for them
	 * If ypu wish to register only specific WordPress widget (for example, WP_Widget_Calendar)
	 * add here.
	 */
	'sidebars'     => [
		BlogSidebar::class,
	],

	'widgets'      => [
		WP_Widget_Search::class,
	],
];
