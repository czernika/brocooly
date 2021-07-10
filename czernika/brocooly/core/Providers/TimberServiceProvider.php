<?php

declare(strict_types=1);

namespace Brocooly\Providers;

class TimberServiceProvider extends AbstractService
{
	public function register() {
		$this->app->set( 'views', 'resources/views' );
	}

	public function boot() {
		$this->app->timber::$dirname = $this->app->get( 'views' );
	}
}
