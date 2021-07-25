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
	 * @param array  $localContext | context to pass with.
	 */
	public static function make( string $views, array $localContext = [] ) {
		$timberContext = Timber::context();
		$themeContext  = ThemeContext::get();
		$ctx           = array_merge( $timberContext, $themeContext, $localContext );

		/**
		 * Cache time expire
		 *
		 * @since Brocooly 0.8.5
		 */
		$expire = isProduction() ? ( config( 'views.expire' ) ?? 600 ) : false;

		Context::merge( $ctx );

		$defaultPage = config( 'views.default' );
		return Timber::render( [ $views, $defaultPage ], Context::get(), $expire );
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
