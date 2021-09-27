<?php
/**
 * Register main App features
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Theme\Models\WP\Page;
use Theme\Models\WP\Post;

use Theme\Providers\ThemeServiceProvider;
use Theme\Containers\FrontPageSection\Providers\MainScreenProvider;

return [

	/**
	 * --------------------------------------------------------------------------
	 * Custom post types and taxonomies
	 * --------------------------------------------------------------------------
	 *
	 * Register any custom post type here.
	 * Also you may register WordPress post types here (like Post, Page) or from other plugins. This required for extra functionality (to add metaboxes, etc).
	 *
	 * @since 0.2.0
	 */
	'post_types' => [
		Post::class,
		Page::class,
	],

	'taxonomies' => [],

	/**
	 * --------------------------------------------------------------------------
	 * Custom hooks
	 * --------------------------------------------------------------------------
	 *
	 * Register hooks which will be used in your theme.
	 * Your hook class requires to implement `load()` method which will handle hook itself
	 * or pair `filter() - hook()` | `action() - hook()` of methods
	 *
	 * @since 0.3.0
	 */
	'hooks'      => [],

	/**
	 * --------------------------------------------------------------------------
	 * Providers
	 * --------------------------------------------------------------------------
	 *
	 * Custom service providers. Use them to bind some value into Container, register or just boot some grouped features within
	 */
	'providers'  => [
		ThemeServiceProvider::class,
		MainScreenProvider::class,
	],

	/**
	 * -------------------------------------------------------------------------
	 * Middleware
	 * -------------------------------------------------------------------------
	 *
	 * Custom middleware. Used to pre-handle request
	 *
	 * @since 0.8.0
	 */
	'middleware' => [],

];
