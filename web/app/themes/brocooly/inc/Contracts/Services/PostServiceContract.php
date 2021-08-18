<?php
/**
 * Post Service interface
 *
 * Get additional data about posts.
 *
 * @package Brocooly
 * @since 0.2.1
 */

declare(strict_types=1);

namespace Theme\Contracts\Services;

interface PostServiceContract
{

	/**
	 * Get title for blog page
	 *
	 * @return string
	 */
	public function getBlogTitle();

	/**
	 * Get breadcrumbs on blog page
	 * This crumbs will be set as a parent to a current post type if exists
	 *
	 * @return array
	 */
	public function getBlogCrumbs();
}
