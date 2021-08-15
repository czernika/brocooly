<?php
/**
 * Global app context
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Storage;

use Timber\Timber;
use Theme\Http\Brocooly as ThemeContext;

class Context
{

	/**
	 * All context data
	 *
	 * @var array
	 */
	private array $registry = [];

	/**
	 * Set context value
	 *
	 * @param string $key | key name.
	 * @param mixed  $value | key value.
	 * @return void
	 */
	public function set( string $key, $value ) {
		$this->registry[ $key ] = $value;
	}

	/**
	 * Set context value
	 *
	 * @param array $ctx | custom context array.
	 * @return void
	 */
	public function merge( array $ctx ) {
		$this->registry = array_merge( $this->registry, $ctx );
	}

	/**
	 * Get key from Context data
	 *
	 * @param string|null $key | key name.
	 * @return array|mixed
	 */
	public function get( $key = null ) {
		$timberContext = Timber::context();
		$themeContext  = app( ThemeContext::class )->context();

		$this->registry = array_merge( $this->registry, $timberContext, $themeContext );

		if ( isset( $key ) ) {
			if ( key_exists( $key, $this->registry ) ) {
				return $this->registry[ $key ];
			}

			return null;
		}

		return $this->registry;
	}

	/**
	 * Remove key from context
	 *
	 * @param string $key | key to delete.
	 * @return void
	 */
	public function delete( string $key ) {
		unset( $this->registry[ $key ] );
	}
}
