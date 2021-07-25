<?php
/**
 * Abstract middleware
 *
 * @package Brocooly
 * @since 0.8.5
 */

declare(strict_types=1);

namespace Brocooly\Http\Middleware;

abstract class AbstractMiddleware
{

	/**
	 * Logic behind middleware.
	 * This function will fire on Controller init
	 *
	 * @return void
	 */
	abstract public function handle();
}
