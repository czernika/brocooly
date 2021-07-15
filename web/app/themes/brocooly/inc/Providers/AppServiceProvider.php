<?php
/**
 * Main Application Service Provider
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Theme\Providers;

use Theme\Services\PageService;
use Theme\Services\PostService;
use Brocooly\Providers\AbstractService;
use Theme\Contracts\PageServiceContract;
use Theme\Contracts\PostServiceContract;

class AppServiceProvider extends AbstractService
{

	/**
	 * Register keys
	 */
	public function register() {
		$this->app->bind( PostServiceContract::class, PostService::class );
		$this->app->bind( PageServiceContract::class, PageService::class );
	}

	/**
	 * Boot methods
	 */
	public function boot() {
		//
	}
}
