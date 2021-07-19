<?php
/**
 * Render views
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Router;

use Timber\Timber;
use Brocooly\Storage\Context;
use Theme\Context as ThemeContext;

use function Env\env;

class View
{

	/**
	 * The only render function
	 *
	 * @param string $views | view file to be rendered.
	 * @param array  $localContext | context to pass with.
	 */
	public static function make( string $views, array $localContext = [] ) {
		$timberContext = Timber::context();
		$themeContext  = ThemeContext::get();
		$ctx           = array_merge( $timberContext, $themeContext, $localContext );
		$expire        = isProduction() ? 600 : false;

		Context::merge( $ctx );

		return Timber::render( $views, Context::get(), $expire );
	}

	/**
	 * If no method exists mean we're call Timber methods
	 *
	 * @param string $name | method name.
	 * @param array  $arguments | arguments.
	 * @return void
	 */
	public static function __callStatic( string $name, array $arguments ) {
		return Timber::$name( ...$arguments );
	}
}
