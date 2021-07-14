<?php
/**
 * Remove meta generator
 *
 * @package Brocooly
 * @since 0.3.0
 */
namespace Theme\Hooks;

class RemoveMetaGenerator
{
    public function load() {
		add_filter( 'the_generator', '__return_empty_string' );
	}
}
