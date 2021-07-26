<?php
/**
 * Post Service
 *
 * @package Brocooly
 * @since 0.2.1
 */

declare(strict_types=1);

namespace Theme\Services;

use Theme\Contracts\PostServiceContract;

class PostService implements PostServiceContract
{

	/**
	 * Get blog title
	 *
	 * @return string
	 */
	public function getBlogTitle() {
		return get_the_title( get_option( 'page_for_posts' ) );
	}

	/**
	 * Get blog crumbs
	 *
	 * @return array
	 */
	public function getBlogCrumbs() {
		$crumbs = [
			[
				'title' => $this->getBlogTitle(),
				'link'  => get_post_type_archive_link( 'post' ),
			],
		];
		return $crumbs;
	}
}
