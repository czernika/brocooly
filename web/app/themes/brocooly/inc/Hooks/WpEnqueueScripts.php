<?php
/**
 * Extra hook to handle scripts and styles enqueuing.
 *
 * @package Brocooly
 * @since 0.3.0
 */

namespace Theme\Hooks;

class WpEnqueueScripts
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
	 * Dequeue wp-block styles as we don't use them on non-singular pages
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
