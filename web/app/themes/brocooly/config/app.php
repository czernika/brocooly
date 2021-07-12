<?php
/**
 * Register main App features
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Theme\Menus\PrimaryMenu;
use Theme\Models\News;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Custom post types
	 *--------------------------------------------------------------------------
	 *
	 * Register any custom post type here
	 *
	 */
	'post_types' => [],

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
