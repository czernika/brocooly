<?php

declare(strict_types=1);

namespace Brocooly\Router;

use Illuminate\Support\Str;

class Router
{
	private Routes $routes;

	private bool $route_was_hit = false;

	public function __construct( Routes $routes ) {
		$this->routes = $routes;
	}

	public function __call( $condition, $args ) {
		[ $callback ] = $args;
		$this->routes->addRoute( 'get', Str::snake( $condition ), $callback );
	}

	public function get( $condition, $callback ) {
		$this->routes->addRoute( 'get', $condition, $callback );
	}

	public function view( $condition, $template ) {
		$this->routes->addRoute(
			'get',
			$condition,
			function() use ( $template ) {
				view( $template );
			},
		);
	}

	public function post( $condition, $callback ) {
		$this->routes->addRoute( 'post', $condition, $callback );
	}

	public function ajax( $action, $callback ) {
		$this->routes->addRoute( 'ajax', $action, $callback );
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

		$this->resolveAjax();
	}

	private function resolveAjax() {
		RequestHandler::handleAjaxRequest();
	}
}
