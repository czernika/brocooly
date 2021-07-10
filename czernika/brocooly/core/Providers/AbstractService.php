<?php
/**
 * Abstract Service Provider instance
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Providers;

use Brocooly\App;

abstract class AbstractService
{
	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
	protected App $app;

	public function __construct( App $app ) {
		$this->app = $app;
	}
}
