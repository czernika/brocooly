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

class View
{

	/**
	 * The only render function
	 *
	 * @param string $views | view file to be rendered.
	 * @param array  $ctx | context to pass with
	 * @return void
	 */
    public static function make( string $views, array $ctx = [] ) {
		$timberContext = Context::get();
		$themeContext  = ThemeContext::get();
		$ctx           = array_merge( $timberContext, $themeContext, $ctx );

		return Timber::render( $views, $ctx );
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
