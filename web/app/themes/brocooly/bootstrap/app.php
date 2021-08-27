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
$brocooly = $container->make(
	\Brocooly\Contracts\AppContainerInterface::class
);

/**
 * --------------------------------------------------------------------------
 * Run Forest Run!
 * --------------------------------------------------------------------------
 *
 * Boot application.
 */
$brocooly->run();
