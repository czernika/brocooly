<?php
/**
 * Controller to handle requests on front page
 *
 * @package Brocooly
 * @since 0.1.0
 */

declare(strict_types=1);

namespace Theme\Controllers;

use Brocooly\Controllers\AbstractController;

class FrontPageController extends AbstractController
{
	public function __invoke() {
		$hello = esc_html__( 'Welcome to Brocooly Framework', 'brocooly' );
		view( 'content/front-page.twig', compact( 'hello' ) );
	}
}
