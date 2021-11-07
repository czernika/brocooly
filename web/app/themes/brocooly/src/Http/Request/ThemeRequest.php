<?php

/**
 * ThemeRequest - custom theme request
 *
 * @package Brocooly
 * @since 0.18.0
 */

declare(strict_types=1);

namespace Theme\Http\Request;

use Brocooly\Http\Request\Request;

abstract class ThemeRequest extends Request
{
	/**
	 * Get validated data from request or false
	 *
	 * @param array $data | request data to validate
	 * @return array|false
	 */
	public function getDataOrFail( array $data ) : array|false
	{
		$validatedData = $this->validate( $data );

		if ( $validatedData->fails() ) {
			$this->firstError = $validatedData->errors()->first();
			return false;
		}

		$data = $validatedData->validated();
		return $data;
	}
}
