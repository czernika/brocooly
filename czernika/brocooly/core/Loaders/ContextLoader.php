<?php
/**
 * Boot Context instance
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Loaders;

use Brocooly\App;
use Brocooly\Storage\Context;

class ContextLoader
{
    /**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
    protected App $app;

	public function __construct( App $app ) {
		$this->app       = $app;
	}

	/**
	 * Instantiate context
	 */
	public function call() {
		Context::instantiate();
	}
}
