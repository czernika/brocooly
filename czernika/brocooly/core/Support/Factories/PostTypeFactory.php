<?php
/**
 * Resolve custom post type
 *
 * @package Brocooly
 * @since 0.10.2
 */

declare(strict_types=1);

namespace Brocooly\Support\Factories;

class PostTypeFactory extends AbstractFactory
{

	/**
	 * Get post type model
	 *
	 * @param string|null $model | model accessor.
	 * @return object
	 */
	public static function model( $model = null ) {
		$modelType   = isset( $model ) ? $model : get_post_type();
		$modelObject = app( $modelType );
		return $modelObject;
	}
}
