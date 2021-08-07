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
	 * Get request object or its key
	 *
	 * @param string|null $key | query argument.
	 * @return mixed
	 */
	public function getQuery( $key = null ) {
		global $wp_query;

		if ( isset( $key ) ) {
			return get_query_var( $key );
		}

		return $wp_query;
	}

	/**
	 * Get queried object
	 *
	 * @return object
	 */
	public function queried() {
		return get_queried_object();
	}

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
