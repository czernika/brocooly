<?php

declare(strict_types=1);

namespace Theme\Containers\BlogSection\Tasks;

use Brocooly\Support\Facades\Option;

class GetBlogTitleTask
{
	public function run() {
		$blogPageId = Option::get( 'page_for_posts' );
		$title      = $blogPageId ? get_the_title( $blogPageId ) : esc_html__( 'Blog', 'brocooly' );
		return $title;
	}
}
