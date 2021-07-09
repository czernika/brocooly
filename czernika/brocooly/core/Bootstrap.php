<?php
/**
 * Load main app features
 *
 * @package Czernika
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly;

use Brocooly\Loaders\BootProvider;
use Brocooly\Loaders\RegisterProvider;

class Bootstrap
{

	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
	public App $app;

	/**
	 * Array of Application loaders
	 * ! Order matter
	 *
	 * @var array
	 */
	private array $loaders = [
		RegisterProvider::class,
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
