<?php
/**
 * Base request controller
 *
 * @package Brocooly
 * @since 0.10.2
 */

declare(strict_types=1);

namespace Theme\Http\Controllers;

use Brocooly\Http\Controllers\BaseController;

abstract class Controller extends BaseController
{
	/**
	 * Templates
	 *
	 * @var array
	 */
	private array $templates = [
		'pages' => [
			'front' => 'content/front-page.twig',
		],
	];

	/**
	 * Render appropriate template
	 *
	 * @param string $template | template path.
	 * @return string|array
	 */
	protected function render( string $template ) : string|array
	{
		return data_get( $this->templates, $template );
	}
}
