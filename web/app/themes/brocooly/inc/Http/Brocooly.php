<?php
/**
 * Theme Timber context.
 * This context will be available on any page as key value.
 * This array will be added to the global context through the `timber/context` filter
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Theme\Http;

use Brocooly\Http\Request\WPRequest;
use Whoops\Handler\PlainTextHandler;
use Whoops\Handler\PrettyPageHandler;
use Theme\Http\Middleware\UserLoggedIn;
use function DI\create;

class Brocooly
{

	/**
	 * Set theme global context
	 *
	 * @return array | custom theme context.
	 */
	public static function context() {
		$context = [

			/**
			 * WordPress conditionals
			 */
			'is_front'    => is_front_page(),
			'is_singular' => is_singular(),

			/**
			 * Queried object
			 */
			'queried'     => WPRequest::queried(),

			/**
			 * Security nonce
			 */
			'nonce'       => wp_create_nonce( 'brocooly_nonce_action' ),
		];

		return $context;
	}

	/**
	 * Bind values into DI\Container
	 *
	 * This method binds directly into ContainerBuilder
	 * so you're free to use any feature at any app environment
	 *
	 * @link https://php-di.org/doc/php-definitions.html
	 * @package Brocooly
	 * @since 0.9.1
	 */
	public static function definitions() {
		$definitions = [

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

		return $definitions;
	}
}
