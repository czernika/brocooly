<?php
/**
 * Register main App features
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Theme\Models\WP\Post;
use Theme\Menus\PrimaryMenu;
use Theme\Models\WP\Category;
use Theme\Providers\AppServiceProvider;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Providers
	 *--------------------------------------------------------------------------
	 *
	 * Custom service providers
	 *
	 */
	'providers' => [
		AppServiceProvider::class,
	],

	/**
	 *--------------------------------------------------------------------------
	 * Custom post types and taxonomies
	 *--------------------------------------------------------------------------
	 *
	 * Register any custom post type here
	 *
	 * @since 0.2.0
	 */
	'post_types' => [
		Post::class,
	],

	'taxonomies' => [
		Category::class,
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
