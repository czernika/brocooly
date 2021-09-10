<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Tasks;

class GetBlogTitleTask
{
	public function run() {
		$title = get_option( 'page_for_posts' ) ?
				get_the_title( get_option( 'page_for_posts' ) ) :
				esc_html__( 'Blog', 'brocooly' );
		return $title;
	}
}
