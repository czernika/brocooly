<?php
/**
 * WordPress View Bootstrapper
 *
 * @package Brocooly
 * @since 0.14.0
 */

/**
 * --------------------------------------------------------------------------
 * Tells WordPress to load the WordPress theme and output it.
 * --------------------------------------------------------------------------
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/**
 * --------------------------------------------------------------------------
 * Boot WordPress itself
 * --------------------------------------------------------------------------
 */
require __DIR__ . '/wp/wp-blog-header.php';
