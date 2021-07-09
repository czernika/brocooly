<?php

declare(strict_types=1);

namespace Brocooly\Loaders;

use Brocooly\App;
use Webmozart\Assert\Assert;
use Brocooly\Providers\TimberServiceProvider;

class ProviderLoader
{

	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
    protected App $app;

	/**
	 * Array of App Service Providers
	 *
	 * @var array
	 */
	private array $appProviders = [
		TimberServiceProvider::class,
	];

	/**
	 * Array of App Service Providers
	 * Custom theme providers included here
	 *
	 * @var array
	 */
	protected array $providers;

	public function __construct( App $app ) {
		$this->app       = $app;
		$this->providers = $this->appProviders;
	}

	public function run( $method ) {
		if ( ! empty( $this->providers ) ) {
			foreach ( $this->providers as $provider ) {
				if ( method_exists( $provider, $method ) ) {
					$provider = $this->app->get( $provider );
					$provider->$method();
				}
			}
		}
	}

}
