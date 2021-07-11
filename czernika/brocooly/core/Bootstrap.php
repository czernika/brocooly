<?php
/**
 * Load main app features
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly;

use Brocooly\Loaders\AssetsLoader;
use Brocooly\Loaders\BootProvider;
use Brocooly\Loaders\ConfigLoader;
use Brocooly\Loaders\ContextLoader;
use Brocooly\Loaders\DebuggerLoader;
use Brocooly\Loaders\DefinitionLoader;
use Brocooly\Loaders\RegisterProvider;

class Bootstrap
{

	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
	private App $app;

	/**
	 * Array of Application loaders
	 * ! Order matter
	 *
	 * @var array
	 */
	private array $loaders = [
		DefinitionLoader::class,
		DebuggerLoader::class,
		ContextLoader::class,
		ConfigLoader::class,
		RegisterProvider::class,
		AssetsLoader::class,
		BootProvider::class,
	];

	public function __construct( App $app ) {
		$this->app = $app;
	}

	/**
	 * Run Application
	 *
	 * @return void
	 */
	public function run() {
		foreach ( $this->loaders as $loader ) {
			$this->app->make( $loader )->call();
		}
	}
}
