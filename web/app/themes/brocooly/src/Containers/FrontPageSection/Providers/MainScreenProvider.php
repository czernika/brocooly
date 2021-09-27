<?php

declare(strict_types=1);

namespace Theme\Containers\FrontPageSection\Providers;

use Brocooly\Providers\AbstractService;

class MainScreenProvider extends AbstractService
{
	public function register() {
		$this->app->wire(
			'Theme\Containers\FrontPageSection\Contracts\Actions\*ActionContract',
			'Theme\Containers\FrontPageSection\Actions\*Action',
		);
	}
}
