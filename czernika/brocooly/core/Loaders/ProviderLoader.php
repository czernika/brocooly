<?php
/**
 * Load all Service Providers.
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Loaders;

use Brocooly\App;
use Brocooly\Providers\UserServiceProvider;
use Brocooly\Providers\MenuServiceProvider;
use Brocooly\Providers\KirkiServiceProvider;
use Brocooly\Providers\BlockServiceProvider;
use Brocooly\Providers\WidgetServiceProvider;
use Brocooly\Providers\TimberServiceProvider;
use Brocooly\Providers\TemplateServiceProvider;
use Brocooly\Providers\PostTypeServiceProvider;
use Brocooly\Providers\ShortcodeServiceProvider;
use Brocooly\Providers\CarbonFieldsServiceProvider;

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
		UserServiceProvider::class,
		TimberServiceProvider::class,
		PostTypeServiceProvider::class,
		TemplateServiceProvider::class,
		CarbonFieldsServiceProvider::class,
		MenuServiceProvider::class,
		KirkiServiceProvider::class,
		WidgetServiceProvider::class,
		ShortcodeServiceProvider::class,
		BlockServiceProvider::class,
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
		$themeProviders  = config( 'app.providers', [] );
		$this->providers = array_merge( $this->appProviders, $themeProviders );
	}

	/**
	 * Run Service Provider method
	 *
	 * @param string $method | method to run.
	 */
	public function run( string $method ) {
		if ( ! empty( $this->providers ) ) {
			foreach ( $this->providers as $provider ) {
				if ( method_exists( $provider, $method ) ) {
					$provider = $this->app->make( $provider );
					$provider->$method();
				}
			}
		}
	}

}
