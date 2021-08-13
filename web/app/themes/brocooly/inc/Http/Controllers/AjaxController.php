<?php
/**
 * Base AJAX controller.
 *
 * @package Brocooly
 * @since 0.10.2
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

use Brocooly\Http\Controllers\BaseController;

abstract class AjaxController extends BaseController
{

	public function __construct() {
		$this->middleware( 'ajax' );
	}

	protected function die() {
		wp_die();
	}
}
