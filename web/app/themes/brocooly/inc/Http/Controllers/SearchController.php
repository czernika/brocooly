<?php
/**
 * Controller to handle requests on search page
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

use Theme\Http\Controllers\Controller;

class SearchController extends Controller
{
	public function __invoke() {
		$s = get_search_query();
		view( 'content/search.twig', compact( 's' ) );
	}
}
