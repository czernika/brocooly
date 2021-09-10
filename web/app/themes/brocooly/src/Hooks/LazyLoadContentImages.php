<?php
/**
 * Lazy load content images from WordPress editor
 *
 * @package Brocooly
 * @since 0.14.1
 */

declare(strict_types=1);

namespace Theme\Hooks;

class LazyLoadContentImages
{
	public function filter() {
		return 'the_content';
	}

	public function hook( $content ) {
		return str_replace( 'src="', 'class="blur" data-src="', $content );
	}
}
