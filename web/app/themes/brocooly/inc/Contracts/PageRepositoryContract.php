<?php
/**
 * Page Repository interface
 *
 * Get page object and queries for it.
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Contracts;

interface PageRepositoryContract
{

	/**
	 * Get current page object
	 *
	 * @return \Timber\Post
	 */
	public function current();
}
