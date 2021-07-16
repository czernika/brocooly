<?php
/**
 * BaseController instance
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Brocooly\Controllers;

use Brocooly\App;

abstract class BaseController
{

	/**
	 * Application instance
	 *
	 * @var instanceof Brocooly\App
	 */
	protected $app;

	public function __construct( App $app ) {
		$this->app = $app;
	}

}
