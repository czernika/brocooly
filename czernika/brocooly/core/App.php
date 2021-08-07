<?php
/**
 * Main application instance class
 * All theme logic starts here
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly;

use DI\Container;
use Timber\Timber;
use Brocooly\Support\Facades\File;
use Psr\Container\ContainerInterface;

use function DI\factory;
use function DI\autowire;

class App
{

	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
	private static App $app;

	/**
	 * Timber instance
	 *
	 * @var instanceof Timber\Timber
	 */
	public Timber $timber;

	/**
	 * DI Container
	 *
	 * @var instanceof DI\Container
	 */
	private Container $container;

	private bool $webRoutesWasLoaded = false;

	public function __construct( Container $container ) {
		self::$app       = $this;
		$this->container = $container;
		$this->timber    = $this->container->make( 'timber' );
	}

	/**
	 * Get application instance
	 *
	 * @return self;
	 */
	public static function getApp() {
		return static::$app;
	}

	/**
	 * Get Router
	 *
	 * @since 0.10.0
	 * @return object
	 */
	public function router() {
		return $this->get( 'routing' );
	}

	/**
	 * Resolve routes
	 * Include web.php file and resolve routes.
	 *
	 * @since 0.10.0
	 * @return void
	 */
	public function web() {
		if ( ! $this->webRoutesWasLoaded ) {
			$this->webRoutesWasLoaded = true;
			File::requireOnce( BROCOOLY_THEME_PATH . '/routes/web.php' );
			$this->router()->resolve();
		}
	}

	/**
	 * Boot loaders
	 *
	 * @param array $loaders | array of app loaders.
	 */
	public function bootLoaders( array $loaders ) {
		foreach ( $loaders as $loader ) {
			$this->make( $loader )->call();
		}
	}

	/**
	 * Bind Interface with it's class object
	 *
	 * @param string $key
	 * @param string $value
	 * @return void
	 */
	public function bind( string $key, string $value ) {
		$this->container->set(
			$key,
			factory(
				function ( ContainerInterface $container ) use ( $value ) {
					return $container->get( $value );
				}
			)
		);
	}

	public function wire( string $key, string $value ) {
		$this->container->set(
			$key,
			autowire( $value ),
		);
	}

	/**
	 * Get key from App Container
	 *
	 * @param string $key | key to get.
	 * @return mixed
	 */
	public function get( string $key ) {
		return $this->container->get( $key );
	}

	/**
	 * Set value into App Container
	 *
	 * @param string $key | key name.
	 * @param mixed  $value | key value.
	 */
	public function set( string $key, $value ) {
		$this->container->set( $key, $value );
	}

	/**
	 * Check if is value exists in App Container
	 *
	 * @param string $key | key to check.
	 * @return boolean
	 */
	public function has( string $key ) {
		return $this->container->has( $key );
	}

	/**
	 * Inject dependencies into object
	 *
	 * @param $object | instance of class to inject on.
	 * @return void
	 */
	public function injectOn( $object ) {
		return $this->container->injectOn( $object );
	}

	/**
	 * Create instance of object
	 *
	 * @param string $name | object name.
	 * @param array  $parameters | additional data to pass.
	 * @return object
	 */
	public function make( string $name, array $parameters = [] ) {
		return $this->container->make( $name, $parameters );
	}

	public function call( $callable, array $parameters = [] ) {
		return $this->container->call( $callable, $parameters );
	}

}
