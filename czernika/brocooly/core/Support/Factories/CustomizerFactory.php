<?php
/**
 * Create customizer options
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Brocooly\Support\Factories;

class CustomizerFactory extends AbstractFactory
{
	/**
	 * Create options for customizer
	 *
	 * @param string $type | customizer option type.
	 * @param array  $arguments | customizer option parameters.
	 * @return object
	 */
	public static function create( string $type, array $arguments ) {
		[ $options ] = $arguments;
 		$options['type'] = $type;
		return $options;
	}
}
