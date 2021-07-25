<?php
/**
 * BaseController instance
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Http\Controllers;

use Brocooly\App;

abstract class BaseController
{

	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
	protected $app;

	protected array $middleware = [];

	public function __construct( App $app ) {
		$this->app = $app;
	}

	public function getMiddleware() {
		return $this->middleware;
	}

	public function middleware( $middleware ) {
		if ( is_string( $middleware ) ) {
			$this->middleware[] = $middleware;
		}

		if ( is_array( $middleware ) ) {
			$this->middleware = array_merge( $this->middleware, $middleware );
		}

		$this->loadMiddleware();
	}

	private function loadMiddleware() {
		foreach ( $this->middleware as $middleware ) {
			$middle = app()->make( $middleware );
			$middle->handle();
		}
	}

}
