<?php
/**
 * Abstract factory
 *
 * @package Brocooly
 * @since 0.2.0
 */

declare(strict_types=1);

namespace Brocooly\Support\Factories;

class AbstractFactory
{
    /**
	 * Call function
	 *
	 * @param string $name | method name.
	 * @param array  $arguments | method arguments.
	 * @return object
	 */
	public static function create( string $name, array $arguments ) {
		return call_user_func_array( $name , $arguments );
	}
}
