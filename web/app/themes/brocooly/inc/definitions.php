<?php
/**
 * Bind values into DI\Container
 *
 * This file includes directly into ContainerBuilder
 * so you're free to use any feature at any app environment
 *
 * @link https://php-di.org/doc/php-definitions.html
 * @package Brocooly
 * @since 0.8.1
 */

use Theme\Http\Middleware\UserLoggedIn;

use function DI\create;

return [

	/**
	 * --------------------------------------------------------------------------
	 * Aliases
	 * --------------------------------------------------------------------------
	 *
	 * Bind classes with its shortcut.
	 *
	 * @see https://php-di.org/doc/php-definitions.html#aliases
	 */
	'auth'  => create( UserLoggedIn::class ),

];
