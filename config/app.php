<?php
/**
 * Your base production configuration goes in this file. Environment-specific
 * overrides go in their respective config/environments/{{WP_ENV}}.php file.
 *
 * A good default policy is to deviate from the production config as little as
 * possible. Try to define as much of your configuration in this file as you
 * can.
 *
 * Config folder structure provided by roots/bedrock
 *
 * @link https://roots.io/bedrock/
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Carbon\Carbon;
use Roots\WPConfig\Config;

use function Env\env;

/**
 * --------------------------------------------------------------------------
 * Default theme name
 * --------------------------------------------------------------------------
 *
 * We do not recommend to change it as it will do nothing for you.
 * No, seriously - it is for the future development.
 */
$theme = env( 'THEME' ) ?? 'brocooly';

/**
 * --------------------------------------------------------------------------
 * Define app path
 * --------------------------------------------------------------------------
 *
 * App path - is the root application folder
 */
if ( ! defined( 'APP_PATH' ) ) {
	define( 'APP_PATH', dirname( __DIR__ ) );
}

/**
 * --------------------------------------------------------------------------
 * Document root
 * --------------------------------------------------------------------------
 *
 * Place where all requests are going to.
 */
$webroot_dir = APP_PATH . '/web';

/**
 * --------------------------------------------------------------------------
 * Define Dotenv extension
 * --------------------------------------------------------------------------
 *
 * Use Dotenv to set required environment variables and load .env file in root
 */
$env_files = file_exists( APP_PATH . '/.env.local' )
	? [ '.env', '.env.local' ]
	: [ '.env' ];

$dotenv = Dotenv\Dotenv::createUnsafeImmutable( APP_PATH, $env_files, false );
if ( file_exists( APP_PATH . '/.env' ) ) {
	$dotenv->load();
	$dotenv->required( [ 'WP_HOME', 'WP_SITEURL' ] );
	if ( ! env( 'DATABASE_URL' ) ) {
		$dotenv->required( [ 'DB_NAME', 'DB_USER', 'DB_PASSWORD' ] );
	}
}

/**
 * --------------------------------------------------------------------------
 * Set up our global environment constant and load its config first
 * --------------------------------------------------------------------------
 *
 * Default: production
 */
define( 'WP_ENV', env( 'WP_ENV' ) ?: 'production' );
Config::define( 'WP_ENVIRONMENT_TYPE', WP_ENV );

/**
 * --------------------------------------------------------------------------
 * Site URLs
 * --------------------------------------------------------------------------
 */
Config::define( 'WP_HOME', env( 'WP_HOME' ) );
Config::define( 'WP_SITEURL', env( 'WP_SITEURL' ) );

/**
 * --------------------------------------------------------------------------
 * Custom content directory
 * --------------------------------------------------------------------------
 */
Config::define( 'CONTENT_DIR', '/app' );
Config::define( 'WP_CONTENT_DIR', $webroot_dir . Config::get( 'CONTENT_DIR' ) );
Config::define( 'WP_CONTENT_URL', Config::get( 'WP_HOME' ) . Config::get( 'CONTENT_DIR' ) );

/**
 * --------------------------------------------------------------------------
 * DB settings
 * --------------------------------------------------------------------------
 */
Config::define( 'DB_NAME', env( 'DB_NAME' ) );
Config::define( 'DB_USER', env( 'DB_USER' ) );
Config::define( 'DB_PASSWORD', env( 'DB_PASSWORD' ) );
Config::define( 'DB_HOST', env( 'DB_HOST' ) ?: 'localhost' );
Config::define( 'DB_CHARSET', 'utf8mb4' );
Config::define( 'DB_COLLATE', '' );
$table_prefix = env( 'DB_PREFIX' ) ?: 'wp_'; // phpcs:disable WordPress.WP.GlobalVariablesOverride

if ( env( 'DATABASE_URL' ) ) {
	// phpcs:disable WordPress.WP.AlternativeFunctions
	$dsn = (object) parse_url( env( 'DATABASE_URL' ) );

	Config::define( 'DB_NAME', substr( $dsn->path, 1 ) );
	Config::define( 'DB_USER', $dsn->user );
	Config::define( 'DB_PASSWORD', isset( $dsn->pass ) ? $dsn->pass : null );
	Config::define( 'DB_HOST', isset( $dsn->port ) ? "{$dsn->host}:{$dsn->port}" : $dsn->host );
}

/**
 * --------------------------------------------------------------------------
 * Authentication Unique Keys and Salts
 * --------------------------------------------------------------------------
 */
Config::define( 'AUTH_KEY', env( 'AUTH_KEY' ) );
Config::define( 'SECURE_AUTH_KEY', env( 'SECURE_AUTH_KEY' ) );
Config::define( 'LOGGED_IN_KEY', env( 'LOGGED_IN_KEY' ) );
Config::define( 'NONCE_KEY', env( 'NONCE_KEY' ) );
Config::define( 'AUTH_SALT', env( 'AUTH_SALT' ) );
Config::define( 'SECURE_AUTH_SALT', env( 'SECURE_AUTH_SALT' ) );
Config::define( 'LOGGED_IN_SALT', env( 'LOGGED_IN_SALT' ) );
Config::define( 'NONCE_SALT', env( 'NONCE_SALT' ) );

/**
 * --------------------------------------------------------------------------
 * Custom settings
 * --------------------------------------------------------------------------
 */
Config::define( 'AUTOMATIC_UPDATER_DISABLED', true );
Config::define( 'DISABLE_WP_CRON', env( 'DISABLE_WP_CRON' ) ?: false );

/**
 * --------------------------------------------------------------------------
 * Disable the plugin and theme file editor in the admin.
 * --------------------------------------------------------------------------
 */
Config::define( 'DISALLOW_FILE_EDIT', true );

/**
 * --------------------------------------------------------------------------
 * Disable plugin and theme updates and installation from the admin.
 * --------------------------------------------------------------------------
 */
Config::define( 'DISALLOW_FILE_MODS', true );

/**
 * --------------------------------------------------------------------------
 * Limit the number of post revisions that WordPress stores (true (default WP): store every revision).
 * --------------------------------------------------------------------------
 */
Config::define( 'WP_POST_REVISIONS', env( 'WP_POST_REVISIONS' ) ?: 3 );

/**
 * --------------------------------------------------------------------------
 * Debug settings
 * --------------------------------------------------------------------------
 */
$debug_log = env( 'WP_DEBUG_LOG' ) ?? false;

if ( $debug_log && class_exists( 'Carbon\Carbon' ) ) {
	$date = Carbon::now()->format( 'Y-m-d' );
	$dir  = APP_PATH . '/web/app/themes/' . $theme . DIRECTORY_SEPARATOR . $debug_log;

	if ( ! file_exists( $dir ) ) {
		mkdir( $dir, 0777, true );
	}

	$debug_log = $dir . DIRECTORY_SEPARATOR . $theme . '-' . $date . '.log';
}

Config::define( 'WP_DEBUG_DISPLAY', false );
Config::define( 'WP_DEBUG_LOG', $debug_log );
Config::define( 'SCRIPT_DEBUG', false );

/**
 * --------------------------------------------------------------------------
 * Allow WordPress to detect HTTPS
 * --------------------------------------------------------------------------
 *
 * When used behind a reverse proxy or a load balancer
 *
 * @see https://codex.wordpress.org/Function_Reference/is_ssl#Notes
 */
if ( 'https' === isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] ) {
	$_SERVER['HTTPS'] = 'on';
}

/**
 * --------------------------------------------------------------------------
 * Load environment file
 * --------------------------------------------------------------------------
 */
$env_config = __DIR__ . '/environments/' . WP_ENV . '.php';
if ( file_exists( $env_config ) ) {
	require_once $env_config;
}

/**
 * --------------------------------------------------------------------------
 * Set dark mode for QueryMonitor plugin for Timber section to be readable
 * --------------------------------------------------------------------------
 *
 * Debug Timber bar environment is written in a white color
 * so it is become unreadable
 */
Config::define( 'QM_DARK_MODE', true );

/**
 * --------------------------------------------------------------------------
 * Boot WordPress
 * --------------------------------------------------------------------------
 */
Config::apply();

/**
 * --------------------------------------------------------------------------
 * Define ABSPATH constant
 * --------------------------------------------------------------------------
 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', $webroot_dir . '/wp/' );
}

/**
 * --------------------------------------------------------------------------
 * Set your default theme
 * --------------------------------------------------------------------------
 *
 * Currently Brocooly
 */
define( 'WP_DEFAULT_THEME', $theme );
