<?php
/**
 * Create DI\Container v6 instance
 * and provide configuration for it
 *
 * @package Brocooly
 * @since 0.1.0
 */

use DI\ContainerBuilder;

/**
 *--------------------------------------------------------------------------
 * Instantiate Builder
 *--------------------------------------------------------------------------
 *
 * We don't want to use container straight forward.
 * First we need to build it.
 *
 */
$containerBuilder = new ContainerBuilder();

/**
 *--------------------------------------------------------------------------
 * Build container
 *--------------------------------------------------------------------------
 *
 * Provide configuration and build container.
 * Now you can use dependency injection.
 *
 */
$containerBuilder->addDefinitions( CORE_PATH . '/config.php' );
$container = $containerBuilder->build();

return $container;
