<?php
/**
 * Filesystem facade
 *
 * @package Brocooly
 * @since 0.9.1
 */

declare(strict_types=1);

namespace Brocooly\Support\Facades;

class File extends AbstractFacade
{
	protected static function accessor() {
		return 'file';
	}
}
