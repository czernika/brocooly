<?php

declare(strict_types=1);

namespace Theme\Containers\PageSection\Providers;

use Brocooly\Providers\AbstractService;

class PageServiceProvider extends AbstractService
{
	public function register() {
		$this->app->wire(
			'Theme\Containers\PageSection\Contracts\Repositories\*RepositoryContract',
			'Theme\Containers\PageSection\Repositories\*Repository',
		);
	}
}
