<?php

declare(strict_types=1);

namespace Brocooly\Support\Factories;

use Illuminate\Filesystem\Filesystem;

class FileFactory extends AbstractFactory
{

	/**
	 * Call filesystem methods
	 *
	 * @param string $method | method name.
	 * @param array  $args | method arguments.
	 * @return void
	 */
	public static function create( string $method, array $args ) {
		$filesystem = new Filesystem();
		return $filesystem->$method( ...$args );
	}
}
