<?php
/**
 * Page Repository interface
 *
 * Get page object and queries.
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Contracts;

interface PageRepositoryContract
{

	/**
	 * Get current post
	 *
	 * @return object
	 */
	public function current();
}
