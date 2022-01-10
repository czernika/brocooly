<?php

/**
 * RouteServiceProvider - define routes features
 *
 * @package Brocooly
 */

declare(strict_types=1);

namespace Theme\Providers;

use Brocooly\Providers\AbstractService;

class RouteServiceProvider extends AbstractService
{
	public function register()
	{
		//...
	}

	public function boot()
	{
		/**
		 * --------------------------------------------------------------------------
		 * Handle AJAX and POST requests
		 * --------------------------------------------------------------------------
		 *
		 * @since 0.25.0
		 */
		$this->app->ajax();
	}
}
