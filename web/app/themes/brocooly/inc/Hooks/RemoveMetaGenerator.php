<?php
/**
 * Remove meta generator
 * Do NOT display the generator XML or Comment for RSS, ATOM, etc.
 *
 * @see https://developer.wordpress.org/reference/functions/the_generator/
 * @package Brocooly
 * @since 0.3.0
 */

namespace Theme\Hooks;

class RemoveMetaGenerator
{

	/**
	 * Run hook
	 *
	 * @return void
	 */
	public function load() {
		add_filter( 'the_generator', '__return_empty_string' );
	}
}
