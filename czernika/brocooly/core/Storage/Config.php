<?php

declare(strict_types=1);

namespace Brocooly\Storage;

class Config
{
    public static $data = [];

	public static function set( $key, $value ) {
		static::$data[ $key ] = $value;
	}

	public static function get( $key = null ) {
		if ( isset( $key ) ) {
			[ $file, $data ] = explode( '.', $key );
			return static::$data[ $file ][ $data ];
		}

		return static::$data;
	}

	public static function delete( $key ) {
		unset( static::$data[ $key ] );
	}
}
