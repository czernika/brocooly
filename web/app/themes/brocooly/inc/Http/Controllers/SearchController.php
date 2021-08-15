<?php
/**
 * Controller to handle requests on search page
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

use Brocooly\Http\Request\WPRequest;
use Theme\Http\Controllers\Controller;

class SearchController extends Controller
{

	/**
	 * Render search page with search query
	 */
	public function __invoke() {
		$s = WPRequest::searchQuery();
		view( 'content/search.twig', compact( 's' ) );
	}
}
