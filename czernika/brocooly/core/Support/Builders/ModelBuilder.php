<?php
/**
 * Resolve post type object
 *
 * @package Brocooly
 * @since 0.8.7
 */

declare(strict_types=1);

namespace Brocooly\Support\Builders;

use Brocooly\Support\Factories\PostTypeFactory;

class ModelBuilder
{
	public function resolve() {
		return PostTypeFactory::model();
	}
}
