<?php
/**
 * Theme instance.
 * Context from context() method will be available on any page as key value.
 * This array will be added to the global context through the `timber/context` filter.
 *
 * Definitions added directly into App Container.
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Theme\Http;

use Brocooly\Http\Request\WPRequest;
use Whoops\Handler\PlainTextHandler;
use Whoops\Handler\PrettyPageHandler;

use function DI\create;

class Brocooly
{

	/**
	 * Set theme global context
	 *
	 * @return array | custom theme context.
	 */
	public function context() {
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
	public function definitions() {
		$definitions = [

			/**
			 * --------------------------------------------------------------------------
			 * Set debug handler
			 * --------------------------------------------------------------------------
			 *
			 * PrettyPageHandler may cause some problems with `sqlite3` PHP extension.
			 * Alternatively you may disable extension itself (recommended).
			 *
			 * @since 0.8.9
			 */
			'handler' => create( PrettyPageHandler::class ),
		];

		return $definitions;
	}
}
