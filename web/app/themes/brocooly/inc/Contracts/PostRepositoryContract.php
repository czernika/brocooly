<?php
/**
 * Post Repository interface
 *
 * Get post object and queries.
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Contracts;

interface PostRepositoryContract
{

	/**
	 * Get all posts
	 *
	 * @return \Timber\PostQuery
	 */
	public function all();

	/**
	 * Get all posts with pagination
	 *
	 * @param integer $postsPerPage | posts per page, default to 10.
	 * @return \Timber\PostQuery
	 */
	public function paginate( int $postsPerPage = 10 );

	/**
	 * Get current post object
	 *
	 * @return \Timber\Post
	 */
	public function current();
}
