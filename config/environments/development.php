<?php
/**
 * Configuration overrides for WP_ENV === 'development'
 *
 * Config folder structure provided by roots/bedrock
 *
 * @link https://roots.io/bedrock/
 *
 * @package WordPress
 * @subpackage Brocooly
 * @since 0.1.0
 */

use Roots\WPConfig\Config;

Config::define( 'SAVEQUERIES', true );
Config::define( 'WP_DEBUG', true );
Config::define( 'WP_DEBUG_DISPLAY', true );
Config::define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );
Config::define( 'SCRIPT_DEBUG', true );

// Enable plugin and theme updates and installation from the admin.
Config::define( 'DISALLOW_FILE_MODS', false );
