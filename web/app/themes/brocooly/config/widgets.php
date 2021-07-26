<?php
/**
 * Register theme custom widgets and sidebars
 *
 * Widgets were originally designed to provide a simple and easy-to-use way of giving design. WordPress Widgets add content and features to your Sidebars.
 *
 * @see https://wordpress.org/support/article/wordpress-widgets/
 * @package Brocooly
 * @since 0.4.0
 */

use Theme\Views\Widgets\BlogSidebar;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Sidebars and Widgets
	 *--------------------------------------------------------------------------
	 *
	 * Register widgets and location for them
	 * If you wish to register only specific WordPress widget (for example, WP_Widget_Search)
	 * add it here.
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

	/**
	 *--------------------------------------------------------------------------
	 * Load default widgets or not
	 *--------------------------------------------------------------------------
	 *
	 * Set to `false` if you don't want to register default WordPress widgets
	 * This feature prevent widgets from being even registered
	 * instead of register and deregister theme with `unregister_widget()`
	 *
	 * For WordPress version 5.8 or above with new block editor support set to `true`
	 * to prevent them being removed
	 */
	'loadDefaults' => false,

	/**
	 *--------------------------------------------------------------------------
	 * Use Gutenberg block for Widgets
	 *--------------------------------------------------------------------------
	 *
	 * As WordPress 5.8.0 was released new feature has not been implemented well
	 * and very arguable in my opinion.
	 * More than that it is NOT implements Carbon Fields Widgets
	 * If you wish to use new blocks extend WP_Widget instead of Carbon Fields Widget
	 *
	 * ! So we're strongly recommend to leave it `false`
	 * unless some fixes will be available
	 *
	 * @since WordPress 5.8.0
	 * @since Brocooly 0.8.4
	 */
	'useGutenberg' => false,

];
