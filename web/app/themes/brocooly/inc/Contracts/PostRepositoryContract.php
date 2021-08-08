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
	 * @return array
	 */
	public function all();

	/**
	 * Get current post
	 *
	 * @return object
	 */
	public function current();
}
