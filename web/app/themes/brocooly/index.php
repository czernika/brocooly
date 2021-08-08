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

use Brocooly\Router\Router;
use Brocooly\Router\Routes;

/**
 * --------------------------------------------------------------------------
 * Include app routes
 * --------------------------------------------------------------------------
 *
 * Brocooly handle requests with Route class - no other files except for functions.php required.
 * If ypu wish you may use any of them according to hierarchy (like singular.php) - it has higher priority. But you should do not include TemplateRedirect hook than as it is redirect all queries into index.php
 */
app()->web();
