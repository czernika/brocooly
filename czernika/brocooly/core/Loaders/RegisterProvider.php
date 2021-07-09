<?php

declare(strict_types=1);

namespace Brocooly\Loaders;

class RegisterProvider extends ProviderLoader
{

	/**
	 * Register Service Provider
	 *
	 * @return void
	 */
    public function call() {
		$this->run( 'register' );
	}
}
