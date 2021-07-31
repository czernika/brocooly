<?php
/**
 * Register thumbnail metabox
 *
 * @package Brocooly
 * @since 0.8.0
 */

declare(strict_types=1);

namespace Brocooly\Support\Traits;

use Brocooly\Support\Facades\Meta;

trait Thumbnail
{
	public function thumbnail() {
		$this->createFields(
			'thumbnail',
			esc_html__( 'Thumbnail', 'brocooly' ),
			[
				Meta::image( 'thumbnail_url', esc_html__( 'Image', 'brocooly' ) )
					->set_value_type( 'url' ),
				Meta::text( 'thumbnail_alt', esc_html__( 'Alt text', 'brocooly' ) ),
			],
			'side',
		);
	}
}
