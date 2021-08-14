<?php
/**
 * Create customizer options
 *
 * @package Brocooly
 * @since 0.3.0
 */

declare(strict_types=1);

namespace Brocooly\Support\Factories;

use Illuminate\Support\Str;

class CustomizerFactory extends AbstractFactory
{
	/**
	 * Create options for customizer
	 *
	 * @param string $type | customizer option type.
	 * @param array  $arguments | customizer option parameters.
	 * @return array
	 */
	public static function create( string $type, array $arguments, $factory = null ) {
		[ $options ]     = $arguments;
		$options['type'] = Str::kebab( $type );
		return $options;
	}
}
