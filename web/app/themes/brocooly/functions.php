<?php
/**
 * Brocooly Framework - developer-friendly Timber-based solution
 * for WordPress themes development with Bedrock folder structure.
 *
 * @package Brocooly
 * @author Ihar Aliakseyenka <aliha.devs@gmail.com>
 * @since 0.1.0
 */

use Brocooly\Support\Facades\File;
use Brocooly\Router\RequestHandler;

/**
 * --------------------------------------------------------------------------
 * Let's start
 * --------------------------------------------------------------------------
 *
 * Boot application
 */
require_once __DIR__ . '/bootstrap/app.php';

/**
 * --------------------------------------------------------------------------
 * Include other bootstrap files
 * --------------------------------------------------------------------------
 *
 * Every bootstrapper will handle it's own boot logic inside.
 * We do NOT require `app.php` file as it is already have been included
 */
$bootstrappers = glob( wp_normalize_path( BROCOOLY_THEME_BOOT_PATH . '/[^app]*.php' ) );

foreach ( $bootstrappers as $file ) {
	File::requireOnce( $file );
}

/**
 * --------------------------------------------------------------------------
 * Handle AJAX requests
 * --------------------------------------------------------------------------
 *
 * This file requires ti be included inside of functions.php.
 * Otherwise ajax routes are invisible.
 * TODO - fix that logic
 *
 * @since 0.18.0
 */
File::requireOnce( BROCOOLY_THEME_PATH . 'routes/ajax.php' );
RequestHandler::handleAjaxRequest();

/**
 * ==========================================================================
 * Stop line - you may place your code AFTER this block
 * ==========================================================================
 *
 * All you custom functions may be placed here as it is still WordPress installation.
 *
 * ! But Brocooly Framework recommends you NOT to do that
 * and handle logic inside theme source directories.
 *
 * Happy coding!
 */
