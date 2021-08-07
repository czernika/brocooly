<?php

declare(strict_types=1);

namespace Brocooly\Router;

use Webmozart\Assert\Assert;
use Brocooly\Support\Facades\File;

class Router
{

	public static array $routes = [];

	public static function __callStatic( $name, $arguments ) {
		$basePath = get_template_directory() . '/routes/';

		Assert::fileExists(
			$basePath . static::$routes[ $name ]['basename'],
			sprintf(
				'File %s does not exists',
				static::$routes[ $name ]['basename'],
			),
		);

		File::requireOnce( $basePath . static::$routes[ $name ]['basename'] );
	}

	public static function api() {
		$basePath = get_template_directory() . '/routes/';

		foreach ( static::$routes as $route => $options ) {
			if ( 'web' === $route ) {
				continue;
			}
			File::requireOnce( $basePath . $options['basename'] );
		}
	}
}
