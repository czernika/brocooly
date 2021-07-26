<?php

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
