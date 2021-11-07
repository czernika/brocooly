<?php
/**
 * Base AJAX request Controller
 *
 * @package Brocooly
 * @since 0.18.0
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

abstract class AjaxController extends Controller
{

	public function index() {
		$this->handle();
		$this->die();
	}

	protected function handle() {
		wp_send_json_error( [ 'message' => esc_html__( 'Wrong controller configuration', 'brocooly' ) ], 400 );
	}

	private function die() {
		wp_die();
	}
}
