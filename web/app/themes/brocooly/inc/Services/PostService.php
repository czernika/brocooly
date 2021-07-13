<?php
/**
 * Post Service
 *
 * @package Brocooly
 * @since 0.2.1
 */

declare(strict_types=1);

namespace Theme\Services;

use Theme\Models\WP\Post;
use Theme\Contracts\PostServiceContract;

class PostService implements PostServiceContract
{
	/**
	 * Get all posts with pagination
	 */
    public function all() {
		$posts = Post::paginate( 10 );
		return $posts;
	}

	/**
	 * Get current post
	 */
	public function current() {
		$post = Post::current();
		return $post;
	}
}
