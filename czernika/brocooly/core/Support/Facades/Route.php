<?php

declare(strict_types=1);

namespace Brocooly\Support\Facades;

class Route extends AbstractFacade
{
	protected static function accessor() {
		return 'router';
	}
}
