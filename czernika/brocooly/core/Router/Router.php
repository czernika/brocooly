<?php

declare(strict_types=1);

namespace Brocooly\Router;

class Router
{
	private Routes $routes;

	private bool $route_was_hit = false;

	public function __construct( Routes $routes ) {
		$this->routes = $routes;
	}

	public function __call( $method, $args ) {
		[ $condition, $callback ] = $args;
		$this->routes->addRoute( $method, $condition, $callback );
	}

	public static function action( $key ) {
		return RequestHandler::handlePostRequest( $key );
	}

	public function resolve() {
		if ( ! $this->route_was_hit ) {
			$this->route_was_hit = RequestHandler::defineRoute( $this->routes->getRoutes() );
		}

		// Default error handler.
		if ( ! $this->route_was_hit ) {
			View::throw404();
		}
	}
}
