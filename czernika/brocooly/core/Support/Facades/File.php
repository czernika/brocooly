<?php
/**
 * Filesystem facade
 *
 * @package Brocooly
 * @since 0.9.1
 */

declare(strict_types=1);

namespace Brocooly\Support\Facades;

use Illuminate\Filesystem\Filesystem;

class File extends AbstractFacade
{
	protected static $factory = Filesystem::class;
}
