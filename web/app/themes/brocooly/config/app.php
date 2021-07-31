<?php
/**
 * Register main App features
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Theme\Models\WP\Page;
use Theme\Models\WP\Post;
use Theme\Hooks\DisableEmoji;
use Theme\Models\WP\Category;
use Theme\Hooks\GetSearchForm;
use Theme\Hooks\WpEnqueueScripts;
use Theme\Hooks\RemoveMetaGenerator;
use Whoops\Handler\PrettyPageHandler;
use Theme\Http\Middleware\UserLoggedIn;
use Theme\Providers\ThemeServiceProvider;
use Theme\Providers\GutenbergServiceProvider;

return [

	/**
	 *--------------------------------------------------------------------------
	 * Providers
	 *--------------------------------------------------------------------------
	 *
	 * Custom service providers
	 */
	'providers'  => [
		ThemeServiceProvider::class,
		GutenbergServiceProvider::class,
	],

	/**
	 *--------------------------------------------------------------------------
	 * Middleware
	 *--------------------------------------------------------------------------
	 *
	 * Custom middleware
	 *
	 * @since 0.8.0
	 */
	'middleware' => [
		UserLoggedIn::class,
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
		Page::class,
	],

	'taxonomies' => [
		Category::class,
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
	'hooks'      => [
		DisableEmoji::class,
		GetSearchForm::class,
		WpEnqueueScripts::class,
		RemoveMetaGenerator::class,
	],

	/**
	 *--------------------------------------------------------------------------
	 * Shortcodes
	 *--------------------------------------------------------------------------
	 *
	 * Register shortcodes
	 */
	'shortcodes' => [],

];
