<?php
/**
 * Make sure post type has name and options
 *
 * @package Brocooly
 * @since 0.10.1
 */

declare(strict_types=1);

namespace Brocooly\Contracts;

interface ModelContract
{

	/**
	 * Get post type name
	 *
	 * @return string
	 */
	public function getName();

	/**
	 * Get post type options
	 *
	 * @return array
	 */
	public function getOptions();
}
