<?php
/**
 * Brocooly Framework - developer-friendly Timber-based solution
 * for WordPress themes development with Bedrock folder structure.
 *
 * @package Brocooly
 * @author Ihar Aliakseyenka <aliha.devs@gmail.com>
 * @since 0.1.0
 */

/**
 * --------------------------------------------------------------------------
 * Ensure compatible version of PHP is used
 * --------------------------------------------------------------------------
 */
$minimumRequiredPHPVersion = '7.4';
if ( version_compare( $minimumRequiredPHPVersion, phpversion(), '>=' ) ) {
	wp_die(
		/* translators: 1: minimum required PHP version, 2: current PHP version. */
		sprintf(
			/* html */ '<h1>Brocooly Framework requires PHP version %1$s or greater!</h1><p>Invalid PHP version! Please update it. Your current version is: <strong>%2$s</strong></p>',
			esc_html( $minimumRequiredPHPVersion ),
			esc_html( phpversion() ),
		),
	);
}

/**
 * --------------------------------------------------------------------------
 * Check if Composer is installed
 * --------------------------------------------------------------------------
 *
 * Brocooly STRONGLY requires Composer to be installed.
 * If it's not got to.
 *
 * @link https://getcomposer.org/
 */
$autoload = APP_PATH . '/vendor/autoload.php';

if ( ! file_exists( $autoload ) ) {
	wp_die(
		/* translators: 1: root directory, 2: link to Composer website. */
		sprintf(
			/* html */ '<h1>Forester Framework requires composer to be installed!</h1><p>Maybe you forget to run <code>composer update</code> in the root folder: <strong>%1$s</strong> or %2$s it</p>',
			esc_html( APP_PATH ),
			/* html */ '<a href="https://getcomposer.org/" target="_blank">install</a>'
		),
	);
}

require_once $autoload;

/**
 * --------------------------------------------------------------------------
 * Let's start
 * --------------------------------------------------------------------------
 *
 * If Composer installed boot application
 */
require_once __DIR__ . '/bootstrap/app.php';

/****************************************************
 * All you custom functions are goes here
 * Happy coding!
 ************************************************** */
