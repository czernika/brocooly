<?php
/**
 * Set PHP DI Container and run Application
 *
 * ! Please do NOT change anything
 * unless you know what are you doing
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Brocooly\App;
use Brocooly\Support\Facades\File;

/**
 * --------------------------------------------------------------------------
 * Get app container
 * --------------------------------------------------------------------------
 *
 * Include DI container
 */
$container = require_once CORE_PATH . '/container.php';

/**
 * --------------------------------------------------------------------------
 * Call The Application
 * --------------------------------------------------------------------------
 *
 * Call App class.
 * We are gonna register and load all Providers for application.
 */
$brocooly = $container->make( 'app' );

/**
 * --------------------------------------------------------------------------
 * Run Forest Run!
 * --------------------------------------------------------------------------
 *
 * Boot application.
 */
$brocooly->run();

/**
 * --------------------------------------------------------------------------
 * Include i18n file
 * --------------------------------------------------------------------------
 *
 * This file requires to be handled directly into functions.php
 * Otherwise other plugins may not see .pot file as a language template.
 *
 * @since 0.8.5
 */
File::requireOnce( __DIR__ . '/i18n.php' );

/**
 * --------------------------------------------------------------------------
 * Include Kirki Customizer installer
 * --------------------------------------------------------------------------
 *
 * Kirki Framework - The ultimate framework for theme developers using the WordPress Customizer
 *
 * Kirki is licensed under the MIT Licence.
 * Copyright (c) 2020 Ari Stathopoulos (@aristath)
 *
 * As Kirki is a WordPress plugin it is depends on user actions.
 * So we include installer section to recommend the installation of Kirki from inside the customizer.
 *
 * @link https://kirki.org/
 * @see https://kirki.org/docs/setup/integration/
 * @since 0.3.0
 */
File::requireOnce( __DIR__ . '/kirki-installer.php' );

/**
 * --------------------------------------------------------------------------
 * Maintenance mode
 * --------------------------------------------------------------------------
 *
 * Enable maintenance mode
 *
 * @since 0.12.3
 */
File::requireOnce( __DIR__ . '/maintenance.php' );
