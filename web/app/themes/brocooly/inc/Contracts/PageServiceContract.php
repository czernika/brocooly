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

namespace Theme\Contracts;

interface PageServiceContract
{

	/**
	 * Get Hello World phrase
	 *
	 * @return string
	 */
	public function getHelloPhrase();
}
