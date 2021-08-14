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
use Brocooly\Loaders\HookLoader;
use Brocooly\Loaders\AssetsLoader;
use Brocooly\Loaders\BootProvider;
use Brocooly\Loaders\ConfigLoader;
use Brocooly\Loaders\DebuggerLoader;
use Brocooly\Loaders\DefinitionLoader;
use Brocooly\Loaders\RegisterProvider;

use function DI\factory;
use function DI\autowire;

class App implements ContainerInterface
{

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

	/**
	 * Check if is app was already booted
	 *
	 * @var bool
	 */
	private bool $booted = false;

	/**
	 * Array of Application loaders
	 * ! Order matter - consider to load in a first place important loaders
	 *
	 * @var array
	 */
	private array $loaders = [
		DefinitionLoader::class,
		DebuggerLoader::class,
		ConfigLoader::class,
		RegisterProvider::class,
		HookLoader::class,
		AssetsLoader::class,
		BootProvider::class,
	];

	/**
	 * Define if route resolver was called
	 *
	 * @var bool
	 */
	private bool $webRoutesWasLoaded = false;

	public function __construct( Container $container ) {
		$this->container = $container;
		$this->timber    = $this->container->get( 'timber' );
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

			/**
			 * Include routes files
			 */
			File::requireOnce( BROCOOLY_THEME_PATH . '/routes/web.php' );
			File::requireOnce( BROCOOLY_THEME_PATH . '/routes/ajax.php' );

			/**
			 * Resolve routes
			 */
			$this->router()->resolve();
		}
	}

	/**
	 * Boot loaders.
	 * Make instance of this loader
	 *
	 * @param array $loaders | array of app loaders.
	 */
	public function run() {
		if ( ! $this->booted ) {
			foreach ( $this->loaders as $loader ) {
				if ( method_exists( $loader, 'call' ) ) {
					$this->call( [ $loader, 'call' ] );
				}
			}
			$this->booted = true;
		}
	}

	/** 
	 * Bind Interface with it's class object
	 *
	 * @inheritdoc
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

	/**
	 * Wire key with it's value using DI\Container
	 *
	 * @inheritdoc
	 */
	public function wire( string $key, string $value ) {
		$this->container->set( $key, autowire( $value ) );
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

	/**
	 * @inheritDoc
	 */
	public function call( $callable, array $parameters = [] ) {
		return $this->container->call( $callable, $parameters );
	}

}
