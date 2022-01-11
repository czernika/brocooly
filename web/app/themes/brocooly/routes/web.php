<?php
/**
 * Set all your web routes here
 * In example below we will handle basic WordPress request for front page
 *
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

use Theme\Containers\FrontPageSection\Web\Controllers\FrontPageController;

/**
 * -------------------------------------------------------------------------
 * Singular
 * -------------------------------------------------------------------------
 *
 * Determines whether the query is for an existing single post of any post type (post, attachment, page, custom post types).
 */
Route::isFrontPage( FrontPageController::class );
