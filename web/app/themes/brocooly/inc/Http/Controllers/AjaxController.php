<?php

declare(strict_types=1);

namespace Theme\Http;

use Brocooly\App;
use Brocooly\Http\Controllers\BaseController;

abstract class AjaxController extends BaseController
{

	protected App $app;

	public function __construct( App $app ) {
		$this->app = $app;
	}

	protected function die() {
		wp_die();
	}
}
