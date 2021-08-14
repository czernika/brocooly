<?php
/**
 * Set all your routes here
 * In example below we will handle some basic WordPress requests
 * Note that is_404() conditional resolved automatically
 * but you are free to override this behavior here.
 *
 * List of all WordPress conditionals can be found here:
 *
 * @link https://codex.wordpress.org/Conditional_Tags
 *
 * @package Brocooly
 * @since brocooly 0.10.0
 */

use Brocooly\Support\Facades\Route;
use Theme\Http\Controllers\PageController;
use Theme\Http\Controllers\PostsController;
use Theme\Http\Controllers\SearchController;
use Theme\Http\Controllers\FrontPageController;
use Theme\Http\Controllers\PostTypesController;

/**
 * -------------------------------------------------------------------------
 * Singular
 * -------------------------------------------------------------------------
 *
 * Determines whether the query is for an existing single post of any post type (post, attachment, page, custom post types).
 */
Route::isFrontPage( FrontPageController::class );
Route::get( 'is_single', [ PostsController::class, 'single' ] );
Route::get( 'is_singular', [ PostTypesController::class, 'single' ] );

/**
 * -------------------------------------------------------------------------
 * Archives
 * -------------------------------------------------------------------------
 *
 * Determines whether the query is for an existing archive page.
 */
Route::get( 'is_search', SearchController::class );
Route::get( 'is_home', [ PostsController::class, 'index' ] );
