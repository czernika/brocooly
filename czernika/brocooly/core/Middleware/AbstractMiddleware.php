<?php

declare(strict_types=1);

namespace Brocooly\Middleware;

abstract class AbstractMiddleware
{
	abstract public function handle();
}
