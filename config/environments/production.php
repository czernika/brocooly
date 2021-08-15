<?php
/**
 * Configuration overrides for WP_ENV === 'production'
 *
 * Config folder structure provided by roots/bedrock
 *
 * @link https://roots.io/bedrock/
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Roots\WPConfig\Config;

Config::define( 'WP_CACHE', true );

/**
 * --------------------------------------------------------------------------
 * Define plugins which should be disabled on a production stage
 * --------------------------------------------------------------------------
 */
define(
	'DEV_DISABLED_PLUGINS',
	[
		'debug-bar-timber/debug-bar-timber.php',
		'query-monitor/query-monitor.php',
		'fakerpress/fakerpress.php',
	],
);
