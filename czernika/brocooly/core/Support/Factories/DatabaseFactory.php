<?php
/**
 * Create database query
 *
 * @package Brocooly
 * @since 0.11.0
 */

declare(strict_types=1);

namespace Brocooly\Support\Factories;

use Brocooly\Support\Builders\DBQueryBuilder;

class DatabaseFactory extends AbstractFactory
{
	public static function create( string $name, array $arguments ) {
		return app( DBQueryBuilder::class )->$name( ...$arguments );
	}
}
