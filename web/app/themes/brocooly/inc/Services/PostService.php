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
		$title = get_option( 'page_for_posts' ) ? get_the_title( get_option( 'page_for_posts' ) ) : esc_html__( 'Blog', 'brocooly' );
		return $title;
	}

	/**
	 * Get blog breadcrumbs
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
