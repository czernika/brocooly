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
use Theme\Hooks\DisableEmoji;
use Theme\Hooks\DisableBlockStyles;
use Theme\Hooks\RemoveMetaGenerator;
use Theme\Providers\AppServiceProvider;
use Theme\Providers\ThemeServiceProvider;
use Theme\Providers\GutenbergServiceProvider;

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
		ThemeServiceProvider::class,
		GutenbergServiceProvider::class,
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

	/**
	 *--------------------------------------------------------------------------
	 * Custom hooks
	 *--------------------------------------------------------------------------
	 *
	 * Register hooks which will be used in your theme.
	 * You hook class requires to implement `load` method which will handle hook itself.
	 *
	 * @since 0.3.0
	 */
	'hooks'     => [
		DisableEmoji::class,
		RemoveMetaGenerator::class,
		DisableBlockStyles::class,
	],

];
