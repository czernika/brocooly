<?php
/**
 * Get search form
 *
 * @package Brocooly
 * @since 0.4.1
 */

declare(strict_types=1);

namespace Theme\Hooks;

use Brocooly\Router\View;

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
	 * Get form markup
	 *
	 * @param string $form | form markup.
	 * @return string
	 */
	public function hook( string $form ) {
		$form = View::compile( '@forms/search.twig', [ 's' => get_search_query() ] );
		return $form;
	}
}
