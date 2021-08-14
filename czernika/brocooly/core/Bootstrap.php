<?php
/**
 * Load main app features
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly;

use Brocooly\Loaders\HookLoader;
use Brocooly\Loaders\AssetsLoader;
use Brocooly\Loaders\BootProvider;
use Brocooly\Loaders\ConfigLoader;
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
		ConfigLoader::class,
		RegisterProvider::class,
		HookLoader::class,
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
		$this->app->bootLoaders( $this->loaders );
	}
}
