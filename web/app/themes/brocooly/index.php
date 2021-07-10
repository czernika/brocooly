<?php
/**
 * The main template file
 *
 * ! DO NOT remove this file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Brocooly
 * @since brocooly 0.1.0
 */

/**
 *--------------------------------------------------------------------------
 * Include app routes
 *--------------------------------------------------------------------------
 *
 * Brocooly handle requests with Route class - no other files except for functions.php required.
 * But you may use any of them according to hierarchy (like singular.php) - it has higher priority
 *
 */
require_once __DIR__ . '/routes/web.php';
