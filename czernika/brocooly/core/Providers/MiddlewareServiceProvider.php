<?php
/**
 * Register theme middleware
 *
 * @package Brocooly
 * @since 0.8.0
 */

declare(strict_types=1);

namespace Brocooly\Providers;

class MiddlewareServiceProvider extends AbstractService
{
	public function register() {
		$middleware = config( 'app.middleware' );

		if ( ! empty( $middleware ) ) {
			foreach ( $middleware as $key => $class ) {
				$this->app->bind( $key, $class );
			}
		}
	}
}
