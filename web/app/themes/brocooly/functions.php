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

$bootstrapPath = __DIR__ . '/bootstrap/';

/**
 * --------------------------------------------------------------------------
 * Let's start
 * --------------------------------------------------------------------------
 *
 * Boot application
 */
require_once $bootstrapPath . 'app.php';

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
File::requireOnce( $bootstrapPath . 'i18n.php' );

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
File::requireOnce( $bootstrapPath . 'kirki-installer.php' );

/**
 * --------------------------------------------------------------------------
 * Maintenance mode
 * --------------------------------------------------------------------------
 *
 * Enable maintenance mode
 *
 * @since 0.12.3
 */
File::requireOnce( $bootstrapPath . 'maintenance.php' );

/**
 * ==========================================================================
 * Stop line - you may place your code AFTER this block
 * ==========================================================================
 *
 * All you custom functions may be placed here as it is still WordPress installation.
 *
 * ! But Brocooly Framework recommends you NOT to do that
 * and handle logic inside theme inc folder.
 *
 * Happy coding!
 */
