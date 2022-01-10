<?php
/**
 * Set PHP-DI Container and run Application
 *
 * NOTE: Please do NOT change anything
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
 *
 * @link https://php-di.org/doc/
 */
add_filter(
	'brocooly_container_builder',
	function( $builder ) {

		/**
		 * Change container configuration
		 *
		 * ! This will NOT work with dynamic container via `set()` method of App instance
		 *
		 * @since 0.26.0
		 * @link https://php-di.org/doc/container-configuration.html
		 */
		return $builder;
	}
);

/**
 * --------------------------------------------------------------------------
 * Include Kirki Framework
 * --------------------------------------------------------------------------
 *
 * Only if there are no Kirki plugin installed
 * Not 100% sure why it has to be required directly
 *
 * FIXME
 */
if ( ! class_exists( 'Kirki' ) ) {
	require_once APP_PATH . '/web/app/vendor/aristath/kirki/kirki.php';
}

/**
 * --------------------------------------------------------------------------
 * Call The Application
 * --------------------------------------------------------------------------
 *
 * Call App class.
 * We are gonna register and load all Providers for application.
 */
$brocooly = container()->make(
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
