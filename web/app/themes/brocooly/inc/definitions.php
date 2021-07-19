<?php
/**
 * TODO refactor as it NOT user friendly way...
 *
 * @link https://php-di.org/doc/php-definitions.html
 * @package Brocooly
 * @since 0.8.1
 */

use Theme\Middleware\UserLoggedIn;

use function DI\create;
use function DI\factory;
use function DI\autowire;

return [

	/**
	 * --------------------------------------------------------------------------
	 * Middleware
	 * --------------------------------------------------------------------------
	 */
	'auth' => create( UserLoggedIn::class ),

];
