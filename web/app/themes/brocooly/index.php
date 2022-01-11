<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Brocooly
 * @since brocooly 0.1.0
 */

/**
 * --------------------------------------------------------------------------
 * Include app routes
 * --------------------------------------------------------------------------
 *
 * Brocooly handle requests with Route facade class - no other files except for functions.php required.
 * But if you wish you may use any template file according to WordPress template hierarchy (like singular.php) - it has higher priority then index.php.
 */
app()->web();
