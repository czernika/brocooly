<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Providers;

use Brocooly\Providers\AbstractService;

class PostServiceProvider extends AbstractService
{
	public function register() {
		$this->app->wire(
			'Theme\Containers\BlogSection\Contracts\Repositories\*RepositoryContract',
			'Theme\Containers\BlogSection\Repositories\*Repository',
		);
	}
}
