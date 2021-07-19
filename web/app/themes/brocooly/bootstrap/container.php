<?php
/**
 * Create DI\Container v6 instance
 * and provide configuration for it
 *
 * PHP-DI Container runs under MIT License
 *
 * @see https://github.com/PHP-DI/PHP-DI/blob/master/LICENSE
 *
 * @link https://php-di.org/
 * @package Brocooly
 * @since 0.1.0
 */

use DI\ContainerBuilder;

/**
 * --------------------------------------------------------------------------
 * Instantiate Builder
 * --------------------------------------------------------------------------
 *
 * We don't want to use container straight forward.
 * First we need to build it.
 */
$containerBuilder = new ContainerBuilder();

/**
 * --------------------------------------------------------------------------
 * Add definitions to container
 * --------------------------------------------------------------------------
 *
 * PHP-DI's definitions are written using a DSL (Domain Specific Language) written in PHP and based on helper functions.
 * You can register that configuration as an array.
 *
 * First line is VERY important - it is application definitions which includes main app instances.
 * Second one is your custom definitions.
 */
$appDefinitions   = require_once CORE_PATH . '/config.php';
$themeDefinitions = require_once get_template_directory() . '/inc/definitions.php';
$containerBuilder->addDefinitions( $appDefinitions, $themeDefinitions );

/**
 * --------------------------------------------------------------------------
 * Cache container
 * --------------------------------------------------------------------------
 * Using array definitions is recommended since it allows to compile the container.
 * All entries configured with Container::set() will not be compiled.
 *
 * Be aware that it isn't possible to add definitions to a container on the fly when using a compiled container
 *
 * @see https://php-di.org/doc/php-definitions.html#setting-definitions-in-the-container-directly
 * @since 0.8.1
 */
if ( isProduction() ) {
	$containerCachePath = get_template_directory() . '/storage/cache/container/';
	$containerBuilder->enableCompilation( $containerCachePath );
}

/**
 * --------------------------------------------------------------------------
 * Build container
 * --------------------------------------------------------------------------
 *
 * Provide configuration and build container.
 * Now you can use dependency injection.
 */
$container = $containerBuilder->build();

return $container;
