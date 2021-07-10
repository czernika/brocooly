<?php
/**
 * Boot Service Provider
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Loaders;

class BootProvider extends ProviderLoader
{

	/**
	 * Call boot method
	 */
    public function call() {
		$this->run( 'boot' );
	}
}
