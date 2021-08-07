<?php
/**
 * Handle Requests
 *
 * @package Brocooly
 * @since 0.9.1
 */

declare(strict_types=1);

namespace Brocooly\Http\Request;

use Brocooly\Support\Facades\Validator;

class Request
{

	/**
	 * Return validation rules array
	 *
	 * @return array
	 * @throws Exception
	 */
	protected function rules() {
		throw new \Exception( 'You need to specify validation rules' );
	}

	/**
	 * Validate request
	 *
	 * @param array $data | data to validate.
	 * @param array|null $rules | validation rules.
	 * @return object
	 */
	public function validate( array $data, $rules = null ) {
		if ( ! isset( $rules ) ) {
			$rules = $this->rules();
		}
		return Validator::make( $data, $rules );
	}
}
