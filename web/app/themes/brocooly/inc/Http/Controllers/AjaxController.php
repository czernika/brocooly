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

	/**
	 * Protect it with `ajax` middleware.
	 */
	public function __construct() {
		$this->middleware( 'ajax' );
	}

	/**
	 * Exit handler
	 *
	 * @return void
	 */
	protected function die() {
		wp_die();
	}
}
