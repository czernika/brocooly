<?php
/**
 * Set all your routes here
 * In example below we will handle some basic WordPress requests
 * List of all WordPress conditionals can be found here:
 *
 * @link https://codex.wordpress.org/Conditional_Tags
 *
 * @package Brocooly
 * @since brocooly 0.1.0
 */

use Brocooly\Router\Route;
use Theme\Http\Controllers\PageController;
use Theme\Http\Controllers\PostsController;
use Theme\Http\Controllers\SearchController;
use Theme\Http\Controllers\FrontPageController;
use Theme\Http\Controllers\PostTypesController;

/**
 *--------------------------------------------------------------------------
 * Singular
 *--------------------------------------------------------------------------
 */
Route::get( 'is_front_page', FrontPageController::class );
Route::get( 'is_single', [ PostsController::class, 'single' ] );
Route::get( 'is_singular', [ PostTypesController::class, 'single' ] );

/**
 *--------------------------------------------------------------------------
 * Archives
 *--------------------------------------------------------------------------
 */
Route::get( 'is_search', SearchController::class );
Route::get( 'is_home', [ PostsController::class, 'index' ] );

/**
 *--------------------------------------------------------------------------
 * 404 Template
 *--------------------------------------------------------------------------
 */
Route::view( 'is_404', 'content/404.twig' );

/**
 *--------------------------------------------------------------------------
 * Resolve which route to pass into view
 *--------------------------------------------------------------------------
 *
 * ! Please do NOT remove next line
 * TODO: handle requests logic somewhere else
 */
Route::resolve();
