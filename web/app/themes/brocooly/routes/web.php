<?php
/**
 * Set all your routes here
 * In example below we will handle FrontPageController method `__invoke()` if it is front page
 * List of all WordPress conditionals can be found here:
 *
 * @link https://codex.wordpress.org/Conditional_Tags
 * 
 * @package Brocooly
 * @since brocooly 0.1.0
 */

use Brocooly\Router\Route;
use Theme\Controllers\FrontPageController;

Route::get( 'is_front_page', FrontPageController::class );

/**
 *--------------------------------------------------------------------------
 * Resolve which route to pass into view
 *--------------------------------------------------------------------------
 *
 * ! Please do NOT remove next line
 * TODO: handle requests logic somewhere else
 *
 */
Route::resolve();
