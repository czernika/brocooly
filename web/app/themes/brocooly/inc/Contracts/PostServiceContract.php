<?php
/**
 * Post Service interface
 *
 * @package Brocooly
 * @since 0.2.1
 */

declare(strict_types=1);

namespace Theme\Contracts;

interface PostServiceContract
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
