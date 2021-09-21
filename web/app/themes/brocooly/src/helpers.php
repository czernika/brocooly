<?php
/**
 * All your custom filters and functions may be placed here.
 *
 * @package Brocooly
 * @since 0.1.0
 */

use Timber\Site;
use Carbon\Carbon;

if ( ! function_exists( 'copyrights' ) ) {

	/**
	 * Convert copyrights into human-readable format.
	 *
	 * @param string $text | unformatted copyrights text.
	 * @return string
	 */
	function copyrights( string $text ) {

		$site = app( Site::class );

		$search_and_replace = [
			'[year]'             => Carbon::today()->year,
			'[site_name]'        => $site->name,
			'[site_description]' => $site->description,
		];

		$copyrights = str_replace(
			array_keys( $search_and_replace ),
			array_values( $search_and_replace ),
			$text,
		);

		return $copyrights;
	}
}
