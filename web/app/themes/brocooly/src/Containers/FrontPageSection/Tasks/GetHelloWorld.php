<?php

declare(strict_types=1);

namespace Theme\Containers\FrontPageSection\Tasks;

class GetHelloWorld
{
	public function run() {
		$hello = sprintf(
			/* translators: 1 - theme version */
			esc_html__( 'Welcome to Brocooly Framework v%s', 'brocooly' ),
			wp_get_theme()->get( 'Version' ),
		);
		return $hello;
	}
}
