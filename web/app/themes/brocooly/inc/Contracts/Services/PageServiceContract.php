<?php
/**
 * Page Service interface
 *
 * Get additional data about pages.
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Contracts\Services;

interface PageServiceContract
{

	/**
	 * Get welcome phrase
	 * Just for example
	 *
	 * @return string
	 */
	public function getHelloPhrase();
}
