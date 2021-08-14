<?php
/**
 * Create DI\Container instance and provide configuration for it
 *
 * PHP-DI Container runs under MIT License
 *
 * @see https://github.com/PHP-DI/PHP-DI/blob/master/LICENSE
 *
 * @link https://php-di.org/
 * @package Brocooly
 * @since 0.1.0
 */

use Theme\Http\Brocooly;
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
 * ! First one is VERY important - it is application definitions which includes main app instances.
 * Second one is your custom theme definitions.
 */
$appDefinitions = require_once CORE_PATH . '/config.php';

$brocooly         = new Brocooly();
$themeDefinitions = $brocooly->definitions();
$containerBuilder->addDefinitions( $appDefinitions, $themeDefinitions );

/**
 * --------------------------------------------------------------------------
 * Build container and return it
 * --------------------------------------------------------------------------
 *
 * Provide configuration and build container.
 * Now you can use dependency injection.
 */
$container = $containerBuilder->build();

return $container;
