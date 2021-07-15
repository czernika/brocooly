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

class SearchForm
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
	 * @param $form | form markup.
	 * @return void
	 */
	public function hook( $form ) {
		$form = View::compile( '@components/forms/search.twig', [ 's' => get_search_query() ] );
		return $form;
	}
}
