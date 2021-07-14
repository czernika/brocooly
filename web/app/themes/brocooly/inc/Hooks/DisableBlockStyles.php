<?php
/**
 * Disable wp-block-library styles
 *
 * @package Brocooly
 * @since 0.3.0
 */

namespace Theme\Hooks;

class DisableBlockStyles
{
	public function action() {
		return 'wp_enqueue_scripts';
	}

	public function hook() {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
	}
}
