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

/**
 * --------------------------------------------------------------------------
 * Include DI container
 * --------------------------------------------------------------------------
 *
 * PHP/DI Container provides very handy dependency injection container
 * working like a charm out of the box
 */
$container = require_once __DIR__ . '/container.php';

/**
 * --------------------------------------------------------------------------
 * Call The Application
 * --------------------------------------------------------------------------
 *
 * By calling Bootstrap class we are gonna register
 * and then load all Providers for application
 */
$brocooly = $container->get( 'bootstrap' );

/**
 * --------------------------------------------------------------------------
 * Run Forest Run!
 * --------------------------------------------------------------------------
 */
$brocooly->run();

/**
 * --------------------------------------------------------------------------
 * Include Kirki Customizer installer
 * --------------------------------------------------------------------------
 *
 * As Kirki is a WordPress plugin it is depends on user actions
 * So we include installer section
 *
 * @see https://kirki.org/docs/setup/integration/
 * @since 0.3.0
 */
require_once __DIR__ . '/kirki-installer.php';
