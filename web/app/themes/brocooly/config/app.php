<?php
/**
 * Register main App features
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Theme\Models\WP\Page;
use Theme\Models\WP\Post;
use Theme\Providers\RouteServiceProvider;
use Theme\Providers\ThemeServiceProvider;

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
	 * Autowire post type slug to its object or not
	 * --------------------------------------------------------------------------
	 *
	 * This may be useful for production, but it requires you to bind model and it's post type within `definitions()` method of Brocooly class as `Post::POST_TYPE => create( Post::class )`
	 *
	 * @since 0.26.0
	 */
	'autowire_post_types' => false,

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
		RouteServiceProvider::class,
		ThemeServiceProvider::class,
	],

];
