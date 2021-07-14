<?php
/**
 * Timber Service Provider
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Providers;

use Twig\TwigFilter;
use Twig\TwigFunction;

class TimberServiceProvider extends AbstractService
{

	/**
	 * Register Timber config
	 */
	public function register() {
		$keys = [
			'views'            => config( 'views.views', 'resources/views' ),
			'views_namespaces' => config( 'views.namespaces', [] ),
			'timber_filters'   => config( 'timber.filters', [] ),
			'timber_functions' => config( 'timber.functions', [] ),
		];
		foreach ( $keys as $key => $value ) {
			$this->app->set( $key, $value );
		}
	}

	/**
	 * Boot Timber options
	 */
	public function boot() {
		$this->app->get( 'timber' )::$dirname = $this->app->get( 'views' );

		$this->addToTwig();
		$this->setLoader();
	}

	/**
	 * Add custom filters and function to Twig
	 */
	private function addToTwig() {
		$functions = $this->app->get( 'timber_functions' );
		$filters   = $this->app->get( 'timber_filters' );

		add_filter(
			'timber/twig',
			function( $twig ) use ( $functions, $filters ) {
				if ( ! empty( $functions ) ) {
					foreach ( $functions as $name => $callback ) {
						$twig->addFunction( new TwigFunction( $name, $callback ) );
					}
				}

				if ( ! empty( $filters ) ) {
					foreach ( $filters as $name => $callback ) {
						$twig->addFilter( new TwigFilter( $name, $callback ) );
					}
				}

				return $twig;
			}
		);
	}

	/**
	 * Set custom Twig namespaces
	 */
	private function setLoader() {
		$namespaces = $this->app->get( 'views_namespaces' );
		add_filter(
			'timber/loader/loader',
			function( $loader ) use ( $namespaces ) {
				if ( ! empty( $namespaces ) ) {
					foreach ( $namespaces as $namespace => $path ) {
						$loader->addPath(
							trailingslashit( get_theme_file_path( $this->app->get( 'views' ) ) ) . $path,
							$namespace
						);
					}
				}
				return $loader;
			}
		);
	}
}
