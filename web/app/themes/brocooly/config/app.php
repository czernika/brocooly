<?php
/**
 * Register main App features
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Theme\Models\WP\Post;
use Theme\Menus\PrimaryMenu;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Custom post types
	 *--------------------------------------------------------------------------
	 *
	 * Register any custom post type here
	 *
	 * @since 0.2.0
	 */
	'post_types' => [
		Post::class,
	],

	/**
	 *--------------------------------------------------------------------------
	 * Theme menus
	 *--------------------------------------------------------------------------
	 *
	 * Register theme menu location
	 * and add it to global context
	 *
	 */
	'menus' => [
		PrimaryMenu::class,
	],

];
