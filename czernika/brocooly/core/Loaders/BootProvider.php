<?php

declare(strict_types=1);

namespace Brocooly\Loaders;

class BootProvider extends ProviderLoader
{

	/**
	 * Boot Service Provider
	 *
	 * @return void
	 */
    public function call() {
		$this->run( 'boot' );
	}
}
