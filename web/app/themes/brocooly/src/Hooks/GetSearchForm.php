<?php
/**
 * Get search form
 * This filter is used mostly to rebuild default `searchform.php` file
 * with non-PHP template aka `search.twig`
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Hooks;

use Brocooly\Router\View;
use Brocooly\Http\Request\WPRequest;

class GetSearchForm
{

	/**
	 * Filter name
	 *
	 * @return string
	 */
	public function filter() {
		return 'get_search_form';
	}

	/**
	 * Get form markup.
	 * Make sure to use compile method otherwise it will be rendered
	 *
	 * @param string $form | form markup.
	 * @return string
	 */
	public function hook( string $form ) {
		$form = View::compile( '@forms/search.twig', [ 's' => WPRequest::getSearchQuery() ] );
		return $form;
	}
}
