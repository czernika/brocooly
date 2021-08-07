<?php
/**
 * Validator facade
 *
 * @package Brocooly
 * @since 0.9.1
 */

declare(strict_types=1);

namespace Brocooly\Support\Facades;

class Validator extends AbstractFacade
{
	/**
	 * Validator Facade
	 *
	 * @return string
	 */
	protected static function accessor() {
		return 'validator';
	}
}
