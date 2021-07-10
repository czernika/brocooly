<?php

declare(strict_types=1);

namespace Brocooly\Controllers;

use Brocooly\App;

abstract class AbstractController
{

	protected $app;

	public function __construct( App $app ) {
		$this->app = $app;
	}

}
