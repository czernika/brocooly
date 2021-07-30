<?php

declare(strict_types=1);

namespace Brocooly\Loaders;

use Brocooly\App;
use Brocooly\Router\Router;

class RoutesLoader
{
	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
	private $app;

	public function __construct( App $app ) {
		$this->app = $app;
	}

	/**
	 * Get all configuration data from `config` folder
	 */
	public function call() {
		$configFiles = glob( wp_normalize_path( get_template_directory() . '/routes' ) . '/*.php' );

		$routes = [];
		foreach ( $configFiles as $file ) {
			$routes[ pathinfo( $file )['filename'] ] = pathinfo( $file );
		}

		$this->app->get( Router::class )::$routes = $routes;
	}
}
