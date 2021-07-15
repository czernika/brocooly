<?php
/**
 * Post Service interface
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Contracts;

interface PageServiceContract
{
	/**
	 * Get current post
	 *
	 * @return object
	 */
	public function current();
}
