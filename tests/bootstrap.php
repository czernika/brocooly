<?php
/**
 * Boot unit tests
 *
 * We're using PHPUnit and Brain\Monkey as unit test vendors. 
 *
 * @package WordPress
 * @subpackage Brocooly
 * @since 0.7.0
 */

/**
 * --------------------------------------------------------------------------
 * Include autoload
 * --------------------------------------------------------------------------
 *
 * First we need to load the composer autoloader so we can use unit tests 
 */
require_once __DIR__ . './../vendor/autoload.php';

/**
 * --------------------------------------------------------------------------
 * Include WordPress core
 * --------------------------------------------------------------------------
 *
 * By requiring wp-load.php file we will ensure WordPress basics are loaded.
 */
require_once __DIR__ . './../web/wp/wp-load.php';
