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

	/**
	 * Action name
	 *
	 * @return string
	 */
	public function action() {
		return 'wp_enqueue_scripts';
	}

	/**
	 * Action callback
	 *
	 * @return void
	 */
	public function hook() {
		if ( ! is_singular() || is_front_page() ) {
			wp_dequeue_style( 'wp-block-library' );
			wp_dequeue_style( 'wp-block-library-theme' );
		}
	}
}
