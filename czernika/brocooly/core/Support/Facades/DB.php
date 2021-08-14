<?php
/**
 * Database query facade.
 * Allows you to cooperate with WordPress database via wpdb class
 *
 * @package Brocooly
 * @since 0.11.0
 */

declare(strict_types=1);

namespace Brocooly\Support\Facades;

class DB extends AbstractFacade
{
	public static function accessor() {
		return 'database';
	}
}
