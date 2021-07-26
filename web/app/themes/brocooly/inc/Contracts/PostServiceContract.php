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
	 * Get blog title
	 *
	 * @return string
	 */
	public function getBlogTitle();

	/**
	 * Get blog crumbs
	 *
	 * @return array
	 */
	public function getBlogCrumbs();
}
