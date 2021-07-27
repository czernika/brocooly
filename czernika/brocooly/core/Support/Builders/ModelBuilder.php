<?php
/**
 * Resolve post type object
 *
 * @package Brocooly
 * @since 0.8.7
 */

declare(strict_types=1);

namespace Brocooly\Support\Builders;

use Brocooly\Contracts\ModelContract;

class ModelBuilder implements ModelContract
{
	public function resolve() {
		$model = app()->get( get_post_type() );
		return $model;
	}
}
