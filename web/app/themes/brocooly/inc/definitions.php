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

use Whoops\Handler\PlainTextHandler;
use Whoops\Handler\PrettyPageHandler;
use Theme\Http\Middleware\UserLoggedIn;

use function DI\create;

return [

	/**
	 * --------------------------------------------------------------------------
	 * Set debug handler
	 * --------------------------------------------------------------------------
	 *
	 * If you see some errors change handler to `PlainTextHandler::class`
	 * as PrettyPageHandler may cause some problems with `sqlite3` PHP extension.
	 * Alternatively you may disable extension itself
	 *
	 * @since 0.8.9
	 */
	'handler' => create( PrettyPageHandler::class ),

	/**
	 * --------------------------------------------------------------------------
	 * Aliases
	 * --------------------------------------------------------------------------
	 *
	 * Bind classes with its shortcut.
	 *
	 * @see https://php-di.org/doc/php-definitions.html#aliases
	 */
	'auth'    => create( UserLoggedIn::class ),

];
