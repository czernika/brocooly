<?php

declare(strict_types=1);

namespace Theme;


class Context
{
    public static function get() {

		$context = [
			'queried'             => get_queried_object(),
			'display_header_text' => display_header_text(),
			'is_front'            => is_front_page(),
			'is_singular'         => is_singular(),
			'nonce'               => wp_create_nonce( 'brocooly_nonce_action' ),
		];

		return $context;
	}
}
